@extends('vendor.layouts.app')
@section('title')
Service/Product -Vendor
@endsection
@section('content')

<h1 class="mt-4">{{ $vendor->category->name }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $vendor->category->name }}</li>
</ol>

<div class="text-end mb-2">
    <a href="{{ route('vendor.addServices', ['vendor_id' => $vendor->id]) }}" class="btn btn-primary">Add Product</a>
    <a class="btn btn-primary"
        href="{{ route('vendor.bulkServices', ['vendor_id' => Auth::guard('vendor')->user()->id]) }}">
        Bulk add
    </a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-cube me-2"></i>
        Service/Product List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Search Tag</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($services as $service )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ asset('public/storage/'.$service->image) }}" target="_blank">
                                <img src="{{ asset('public/storage/'.$service->image) }}" alt="" width="50px" height="50px">
                            </a>
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td> &#8377;{{ number_format( $service->mrp, 2) }}</td>
                        <td>
                            @php
                            $tags = explode(',', $service->search_tags);
                            @endphp
                            @foreach($tags as $tag)
                            <span class="badge bg-primary text-light">{{ trim($tag) }}</span>
                            @endforeach
                        </td>

                        <td>
                            <a href="{{ route('vendor.editServices', ['service_id'=>$service->id, 'vendor_id'=>$vendor->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="javascript:void(0)"
                                onclick="event.preventDefault(); confirmDelete('{{ route('vendor.deleteServices',  $service->id) }}');"
                                class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById("searchTerms").addEventListener("change", function(event) {
        let inputField = this;
        let errorMessage = document.getElementById("error-message");

        // Get the text, split by comma, trim spaces, remove empty values
        let tags = inputField.value.split(",")
            .map(tag => tag.trim()) // Trim spaces
            .filter(tag => tag !== ""); // Remove empty values

        // Enforce max 10 tags
        if (tags.length > 10) {
            errorMessage.textContent = "You can only enter up to 10 tags.";
            inputField.value = tags.slice(0, 10).join(", "); // Keep only first 10
            console.log(tags);
        } else {
            errorMessage.textContent = "";
        }
    });
</script>
<script>
    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this service?")) {
            window.location.href = url;
        }
    }
</script>

@endsection