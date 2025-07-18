@extends('vendor.layouts.app')
@section('title', 'Dashboard - Vendor')
@section('content')
    @if ($vendor->status == 0)
        <div class="alert alert-warning">
            Your account is under verification. Once verified, you will be able to add services.
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Bussiness Details
            <a href="{{ route('vendor.profile') }}" class="btn btn-sm btn-primary float-end">Edit Details</a>
        </div>
        <div class="card-body">
            <div>
                <img src="{{ asset('public/images/vendor/' . $vendor->image) }}" alt="Institute Image"
                    class="img-fluid mb-3 w-25">
            </div>
            <table class="table table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Fields</th>
                        <th>Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{ $vendor->business_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $vendor->description ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            @forelse ($vendor->businessTypes as $type)
                                <span class="badge text-bg-secondary text-capitalize">
                                    {{ $type->name }} Based Bussiness
                                </span>
                                @empty
                                <span class="badge text-bg-secondary text-capitalize">N/A</span>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $vendor->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Whatsapp No.</td>
                        <td>{{ $vendor->whatsapp_no ?? 'NA' }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $vendor->block_building . ' ' . $vendor->street_colony . ' ' . $vendor->area ?? 'NA' }}</td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>{{ $vendor->state ?? 'NA' }}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{ $vendor->city ?? 'NA' }}</td>
                    </tr>
                    <tr>
                        <td>Pincode</td>
                        <td>{{ $vendor->pin_code ?? 'NA' }}</td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td>
                            @forelse ($terms = array_map('trim', explode(',', $vendor->search_terms)) as $tag)
                                <span class="badge bg-secondary">
                                    {{ $tag }}
                                </span>
                            @empty
                                <span class="badge bg-secondary">No tags</span>
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
