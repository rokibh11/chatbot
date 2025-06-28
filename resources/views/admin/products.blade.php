@extends('layouts.app')
@section('content')
<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold">Product List</h3>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add New Product</a>
    </div>
    @if(session('success')) <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div> @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-3 py-2">Name (BN)</th>
                    <th class="px-3 py-2">Name (EN)</th>
                    <th class="px-3 py-2">Price</th>
                    <th class="px-3 py-2">Image</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $product->name_bn }}</td>
                    <td class="px-3 py-2">{{ $product->name_en }}</td>
                    <td class="px-3 py-2">{{ $product->price }}৳</td>
                    <td class="px-3 py-2">
                        @if($product->image)
                            <img src="{{ asset('images/'.$product->image) }}" class="h-12 rounded" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $products->links() }}</div>
    </div>
</div>
@endsection
