@extends('admin.layouts.app')
@section('title', 'Sellers-Admin')
@section('content')
    <div class="container py-4">
        <div>
            <a href="{{ route('admin.addVendors.bulk') }}" class="btn btn-primary mb-3">Add Vendors Bulk</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Vendor Name</th>
                        <th scope="col">Vendor Bussiness Name</th>
                        <th scope="col">Vendor Mobile</th>
                        <th scope="col">Vendor Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td>{{ ($vendors->currentPage() - 1) * $vendors->perPage() + $loop->iteration }}</td>
                            <td>{{ $vendor->name ?? 'N/A'}}</td>
                            <td>{{ $vendor->business_name ?? 'N/A' }}</td>
                            <td>{{ $vendor->mobile ?? 'N/A' }}</td>
                            <td>{{ $vendor->email ?? 'N/A' }}</td>
                            <td>
                                @if ($vendor->status == 0)
                                    <span class="badge bg-warning text-dark">Registered</span>
                                @elseif ($vendor->status == 1)
                                    <span class="badge bg-success">Verified</span>
                                @elseif ($vendor->status == 2)
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                            <td>
                                @if ($vendor->status == 0)
                                    <a href="{{route('admin.verifyVendor', $vendor->id)}}" class="btn btn-sm btn-primary">Verify</a>
                                @elseif($vendor->status == 1)
                                    <a href="{{route('admin.verifyVendor', $vendor->id)}}" class="btn btn-sm btn-secondary">Verified</a>
                                @else
                                    <a href="{{route('admin.verifyVendor', $vendor->id)}}" class="btn btn-sm btn-primary">Verify</a>
                                @endif
                                <a href="{{route('admin.rejectVendor', $vendor->id)}}" class="btn btn-sm btn-danger">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $vendors->links() }}
        </div>
    </div>
@endsection