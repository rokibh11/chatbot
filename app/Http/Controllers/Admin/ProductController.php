<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.products_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_bn' => 'required',
            'name_en' => 'required',
            'description_bn' => 'nullable',
            'description_en' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Image Upload (if provided)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Product added!');
    }
}
