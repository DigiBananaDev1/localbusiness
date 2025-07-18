@extends('admin.layouts.app')
@section('title', 'Queries')
@section('content')
    <div class="container py-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Query</th>
                        <th scope="col">User Mobile</th>
                        <th scope="col">User Email</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    @foreach ($queries as $query)
                        <tr>
                            <td>{{ ($queries->currentPage() - 1) * $queries->perPage() + $loop->iteration }}</td>
                            <td>{{ $query->user_name ?? 'N/A'}}</td>
                            <td>{{ $query->vendor->business_name ?? 'N/A' }}</td>
                            <td>{{ $query->query ?? 'N/A' }}</td>
                            <td>{{ $query->user_mobile ?? 'N/A' }}</td>
                            <td>{{ $query->user_email ?? 'N/A' }}</td>
                            <!-- <td>
                                @if ($query->status == 0)
                                    <span class="badge bg-warning text-dark">Unanswered</span>
                                @elseif ($query->status == 1)
                                    <span class="badge bg-success">Answered</span>
                                @endif
                            </td> -->
                            <td>
                                @if ($query->forwarded == 0)
                                    <a href="{{route('admin.forwardQuery', $query->id)}}" class="btn btn-sm btn-primary m-2">Forward</a>
                                @else
                                    <button class="btn btn-sm btn-secondary m-2" disabled>Forwarded</button>
                                @endif

                                <form action="{{route('admin.deleteQuery', $query->id)}}" method="POST" class="d-inline m-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $queries->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection