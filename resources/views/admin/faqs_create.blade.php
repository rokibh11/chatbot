@extends('layouts.app')
@section('content')
<div class="mt-8 max-w-xl mx-auto bg-white p-8 rounded-xl shadow">
    <h3 class="text-xl font-bold mb-4">Add New FAQ</h3>
    <form method="POST" action="{{ route('admin.faqs.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Question (বাংলা)</label>
            <input type="text" name="question_bn" class="form-input w-full border-gray-300 rounded px-3 py-2" value="{{ old('question_bn') }}" required>
            @error('question_bn') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Answer (বাংলা)</label>
            <textarea name="answer_bn" class="form-textarea w-full border-gray-300 rounded px-3 py-2" required>{{ old('answer_bn') }}</textarea>
            @error('answer_bn') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Question (English)</label>
            <input type="text" name="question_en" class="form-input w-full border-gray-300 rounded px-3 py-2" value="{{ old('question_en') }}" required>
            @error('question_en') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Answer (English)</label>
            <textarea name="answer_en" class="form-textarea w-full border-gray-300 rounded px-3 py-2" required>{{ old('answer_en') }}</textarea>
            @error('answer_en') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add FAQ</button>
    </form>
</div>
@endsection
