@extends('admin.layouts.app')
@section('title', 'Image')
@section('content')
<div class="card m-3">
    <div class="card-header d-flex justify-content-between">
        <h3>Image Library</h3>
        <a href="{{ route('admin.image.create') }}" class="btn btn-primary">Add Images</a>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                        <tr>
                            <td>
                                <img src="{{ asset('public/storage/' . $image->image_path) }}" alt="Image"
                                    style="width: 100px; height: 100px;" class="">
                            </td>
                            <td>{{$image->image_path}}</td>
                            <td>
                                <form action="{{ route('admin.image.delete', ($image->id)) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $images->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>
@endsection