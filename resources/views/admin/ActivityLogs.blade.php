@extends('admin.layouts.app')
@section('title', 'Dashboard-Admin-Activity')
@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Logs</h1>

        <div class="bg-gray-100 p-4 rounded shadow overflow-auto" style="max-height: 500px;">
            @forelse ($logsPaginated as $log)
                <p class="text-sm text-gray-800">{{ $log }}</p>
            @empty
                <p class="text-red-500">No logs available.</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $logsPaginated->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
