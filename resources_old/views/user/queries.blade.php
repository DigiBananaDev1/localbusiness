@extends('user.layouts.app')
@section('title', 'Queries')
@section('content')
    <div class="container py-4">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Query</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    @foreach ($queries as $query)
                        <tr>
                            <td>{{ ($queries->currentPage() - 1) * $queries->perPage() + $loop->iteration }}</td>
                            <td>{{ $query->vendor->name ?? 'N/A' }}</td>
                            <td>{{ $query->query }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $queries->links() }}
        </div>
    </div>


@endsection