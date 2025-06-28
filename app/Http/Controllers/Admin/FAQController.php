<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::latest()->paginate(20);
        return view('admin.faqs', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_bn' => 'required',
            'answer_bn'   => 'required',
            'question_en' => 'required',
            'answer_en'   => 'required',
        ]);

        FAQ::create($request->all());
        return redirect()->route('admin.faqs')->with('success', 'FAQ added!');
    }
}
