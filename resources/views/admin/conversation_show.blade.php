@extends('layouts.app')
@section('content')
<div class="mt-8 max-w-lg mx-auto bg-white p-8 rounded-xl shadow">
    <h4 class="text-lg font-bold mb-4">Conversation Details</h4>
    <div>
        <div class="mb-2"><span class="font-semibold">User ID:</span> {{ $conv->user_id }}</div>
        <div class="mb-2"><span class="font-semibold">User Name:</span> {{ $conv->user_name }}</div>
        <div class="mb-2"><span class="font-semibold">Message:</span> {{ $conv->message }}</div>
        <div class="mb-2"><span class="font-semibold">Reply:</span> {{ $conv->reply }}</div>
        <div class="mb-2"><span class="font-semibold">Language:</span> {{ strtoupper($conv->lang) }}</div>
        <div class="mb-2"><span class="font-semibold">Time:</span> {{ $conv->created_at }}</div>
    </div>
    <a href="{{ route('admin.conversations') }}" class="mt-4 inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">Back to List</a>
</div>
@endsection
