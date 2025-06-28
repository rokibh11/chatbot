@extends('layouts.app')
@section('content')
<div class="mt-8 max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
    <h3 class="text-xl font-bold mb-4">Add New Product</h3>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name (বাংলা)</label>
            <input type="text" name="name_bn" class="form-input w-full border-gray-300 rounded px-3 py-2" required>
            @error('name_bn') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name (English)</label>
            <input type="text" name="name_en" class="form-input w-full border-gray-300 rounded px-3 py-2" required>
            @error('name_en') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Description (বাংলা)</label>
            <textarea name="description_bn" class="form-textarea w-full border-gray-300 rounded px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Description (English)</label>
            <textarea name="description_en" class="form-textarea w-full border-gray-300 rounded px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Price (৳)</label>
            <input type="number" name="price" class="form-input w-full border-gray-300 rounded px-3 py-2" required>
            @error('price') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Image (optional)</label>
            <input type="file" name="image" class="form-input w-full border-gray-300 rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add Product</button>
    </form>
</div>
@endsection
