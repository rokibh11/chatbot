@extends('layouts.app')
@section('content')
<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold">FAQ List</h3>
        <a href="{{ route('admin.faqs.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add New FAQ</a>
    </div>
    @if(session('success')) <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div> @endif
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-3 py-2">Question (BN)</th>
                    <th class="px-3 py-2">Answer (BN)</th>
                    <th class="px-3 py-2">Question (EN)</th>
                    <th class="px-3 py-2">Answer (EN)</th>
                </tr>
            </thead>
            <tbody>
            @foreach($faqs as $faq)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $faq->question_bn }}</td>
                    <td class="px-3 py-2">{{ $faq->answer_bn }}</td>
                    <td class="px-3 py-2">{{ $faq->question_en }}</td>
                    <td class="px-3 py-2">{{ $faq->answer_en }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $faqs->links() }}</div>
    </div>
</div>
@endsection
