<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingData;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = TrainingData::latest()->paginate(20);
        return view('admin.training', compact('trainings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer'   => 'required',
            'lang'     => 'required|in:bn,en',
            'image'    => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Image Upload (if any)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/training'), $fileName);
            $data['image'] = $fileName;
        }

        TrainingData::create($data);

        return redirect()->route('admin.training')->with('success', 'Training data added!');
    }
}
