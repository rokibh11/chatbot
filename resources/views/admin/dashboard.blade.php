@extends('layouts.app')
@section('content')
<div class="mt-8">
    <h2 class="text-2xl font-bold mb-4">Admin Dashboard</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <a href="{{ route('admin.conversations') }}" class="bg-white shadow rounded-xl p-6 hover:bg-indigo-50 block text-center">
            <span class="block text-lg font-semibold text-indigo-700 mb-2">Conversation Logs</span>
        </a>
        <a href="{{ route('admin.training') }}" class="bg-white shadow rounded-xl p-6 hover:bg-indigo-50 block text-center">
            <span class="block text-lg font-semibold text-indigo-700 mb-2">AI Training Data</span>
        </a>
        <a href="{{ route('admin.faqs') }}" class="bg-white shadow rounded-xl p-6 hover:bg-indigo-50 block text-center">
            <span class="block text-lg font-semibold text-indigo-700 mb-2">FAQ Management</span>
        </a>
        <a href="{{ route('admin.products') }}" class="bg-white shadow rounded-xl p-6 hover:bg-indigo-50 block text-center">
            <span class="block text-lg font-semibold text-indigo-700 mb-2">Product Management</span>
        </a>
    </div>
</div>
@endsection
