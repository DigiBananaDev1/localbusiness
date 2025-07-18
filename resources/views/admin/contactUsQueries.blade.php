@extends('admin.layouts.app')
@section('title', 'Contact Us - Admin')
@section('content')
<div class="container py-4">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Mobile</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User City</th>
                    <th scope="col">User Query</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                @foreach ($contactUsQueries as $query)
                <tr>
                    <td>{{ ($contactUsQueries->currentPage() - 1) * $contactUsQueries->perPage() + $loop->iteration }}</td>
                    <td>{{ $query->name ?? 'N/A'}}</td>
                    <td>{{ $query->mobile ?? 'N/A' }}</td>
                    <td>{{ $query->email ?? 'N/A' }}</td>
                    <td>{{ $query->city ?? 'N/A' }}</td>
                    <td>{{ $query->message ?? 'N/A' }}</td>
                    <td>
                        @if ($query->answered == 0)
                        <a href="{{route('admin.contactQuery.answer', $query->slug)}}" class="btn btn-sm btn-primary m-2">Unanswered</a>
                        @else
                        <button class="btn btn-sm btn-secondary m-2" disabled>Answered</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contactUsQueries->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection