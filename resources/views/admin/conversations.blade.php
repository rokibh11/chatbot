@extends('layouts.app')
@section('content')
<div class="mt-8">
    <h3 class="text-xl font-bold mb-4">Conversation Logs</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow">
            <thead class="bg-indigo-100">
                <tr>
                    <th class="px-3 py-2">User ID</th>
                    <th class="px-3 py-2">Message</th>
                    <th class="px-3 py-2">Reply</th>
                    <th class="px-3 py-2">Lang</th>
                    <th class="px-3 py-2">Time</th>
                </tr>
            </thead>
            <tbody>
            @foreach($conversations as $c)
                <tr class="border-b">
                    <td class="px-3 py-2">{{ $c->user_id }}</td>
                    <td class="px-3 py-2">{{ $c->message }}</td>
                    <td class="px-3 py-2">{{ $c->reply }}</td>
                    <td class="px-3 py-2">{{ strtoupper($c->lang) }}</td>
                    <td class="px-3 py-2">{{ $c->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $conversations->links() }}</div>
    </div>
</div>
@endsection
