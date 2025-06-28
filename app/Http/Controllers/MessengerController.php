<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\TrainingData;

class MessengerController extends Controller
{
    /**
     * Facebook Messenger Webhook entry point
     */
    public function webhook(Request $request)
    {
        // 1. Facebook Messenger verification (optional)
        if ($request->isMethod('get')) {
            $verify_token = env('FB_VERIFY_TOKEN', 'testtoken');
            $mode = $request->get('hub_mode');
            $token = $request->get('hub_verify_token');
            $challenge = $request->get('hub_challenge');
            if ($mode && $token === $verify_token) {
                return response($challenge, 200);
            }
            return response('Forbidden', 403);
        }

        // 2. Receive incoming message
        $entry = $request->input('entry')[0] ?? null;
        $messaging = $entry['messaging'][0] ?? null;
        $senderId = $messaging['sender']['id'] ?? null;
        $userMessage = $messaging['message']['text'] ?? null;

        if (!$senderId || !$userMessage) {
            return response('Invalid payload', 400);
        }

        // 3. Detect language
        $lang = $this->detectLanguage($userMessage);

        // 4. Generate reply using Bot Logic Service
        $botReply = $this->generateBotReply($userMessage, $lang);

        // 5. Log conversation
        Conversation::create([
            'user_id' => $senderId,
            'user_name' => null,
            'message' => $userMessage,
            'reply' => $botReply,
            'lang' => $lang,
            'is_from_bot' => true,
        ]);

        // 6. Send reply to Messenger
        $this->sendMessengerReply($senderId, $botReply);

        return response('EVENT_RECEIVED', 200);
    }

    /**
     * Detect user language (very simple: if contains Bangla chars, else English)
     */
    private function detectLanguage($message)
    {
        return preg_match('/[অ-হা-য়]/u', $message) ? 'bn' : 'en';
    }

    /**
     * Main bot logic - query FAQ, Product, TrainingData; fallback to friendly default
     */
    private function generateBotReply($userMessage, $lang)
    {
        $userMsg = mb_strtolower($userMessage);

        // 1. Try FAQ match (partial match)
        $faq = FAQ::where("question_$lang", 'LIKE', "%$userMsg%")->first();
        if ($faq) return $faq["answer_$lang"];

        // 2. Try TrainingData match
        $train = TrainingData::where('lang', $lang)
            ->where('question', 'LIKE', "%$userMsg%")->first();
        if ($train) return $train->answer;

        // 3. Try Product name/description
        $product = Product::where("name_$lang", 'LIKE', "%$userMsg%")
            ->orWhere("description_$lang", 'LIKE', "%$userMsg%")
            ->first();
        if ($product) {
            $price = number_format($product->price, 0);
            return ($lang === 'bn')
                ? "{$product->name_bn} - {$product->description_bn}\nদাম: {$price} টাকা"
                : "{$product->name_en} - {$product->description_en}\nPrice: {$price} BDT";
        }

        // 4. Example: Order or price keywords (demo)
        if ($lang === 'bn') {
            if (str_contains($userMsg, 'অর্ডার')) {
                return 'অর্ডার করতে ইনবক্সে আপনার ঠিকানা পাঠান, বা আমাদের ওয়েবসাইটে যান!';
            }
            if (str_contains($userMsg, 'দাম')) {
                return 'দয়া করে পণ্যের নাম লিখুন, আমরা দামের তথ্য দেবো।';
            }
        } else {
            if (str_contains($userMsg, 'order')) {
                return 'To order, just type your address here, or visit our website!';
            }
            if (str_contains($userMsg, 'price')) {
                return 'Please mention the product name, I will let you know the price!';
            }
        }

        // 5. Fallback (friendly, human-like)
        return $lang === 'bn'
            ? 'দুঃখিত, আপনার প্রশ্নটা বুঝতে পারিনি। দয়া করে আরেকবার লিখুন বা নির্দিষ্ট পণ্যের নাম/প্রশ্ন দিন।'
            : "Sorry, I didn't understand your question. Please type again or mention the product name.";
    }

    /**
     * Send reply to Facebook Messenger (Graph API)
     */
    private function sendMessengerReply($recipientId, $messageText)
    {
        $accessToken = env('FB_PAGE_TOKEN', '');
        $url = "https://graph.facebook.com/v18.0/me/messages?access_token=$accessToken";

        $data = [
            'recipient' => [ 'id' => $recipientId ],
            'message'   => [ 'text' => $messageText ]
        ];

        try {
            // Laravel HTTP client (v7+)
            \Illuminate\Support\Facades\Http::post($url, $data);
        } catch (\Exception $e) {
            \Log::error("Messenger API send failed: " . $e->getMessage());
        }
    }
}
