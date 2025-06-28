@extends('layouts.app')
@section('content')
<div class="mt-8">
    <h3 class="text-xl font-bold mb-4">AI Training Data</h3>
    <form method="POST" action="{{ route('admin.training.store') }}" enctype="multipart/form-data" class="mb-6">
        @csrf
        <div class="flex flex-col md:flex-row gap-2 mb-2">
            <input type="text" name="question" class="form-input flex-1 border-gray-300 rounded px-3 py-2" placeholder="Question" required>
            <input type="text" name="answer" class="form-input flex-1 border-gray-300 rounded px-3 py-2" placeholder="Answer" required>
            <select name="lang" class="form-select border-gray-300 rounded px-3 py-2" required>
                <option value="bn">Bangla</option>
                <option value="en">English</option>
            </select>
            <input type="file" name="image" class="form-input border-gray-300 rounded px-3 py-2">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add</button>
        </div>
    </form>
    @if(session('success')) <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div> @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-3 py-2">Question</th>
                    <th class="px-3 py-2">Answer</th>
                    <th class="px-3 py-2">Lang</th>
                    <th class="px-3 py-2">Image</th>
                </tr>
            </thead>
            <tbody>
            @foreach($trainings as $t)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $t->question }}</td>
                    <td class="px-3 py-2">{{ $t->answer }}</td>
                    <td class="px-3 py-2">{{ strtoupper($t->lang) }}</td>
                    <td class="px-3 py-2">
                        @if($t->image)
                            <img src="{{ asset('images/training/'.$t->image) }}" class="h-12 rounded" />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $trainings->links() }}</div>
    </div>
</div>
@endsection
