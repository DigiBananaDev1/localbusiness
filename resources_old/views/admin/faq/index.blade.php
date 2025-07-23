@extends('admin.layouts.app')
@section('title', 'Faques ')
@section('content')
<div class="container py-4">
    <div class="text-end">
        <a href="{{ route('admin.faq.add') }}" class="btn btn-primary mb-2">Add faq
            <i class="fa fa-plus-circle"></i>
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                @foreach ($faqs as $faq)
                <tr>
                    <td>{{ ($faqs->currentPage() - 1) * $faqs->perPage() + $loop->iteration }}</td>
                    <td>{{ $faq->question ?? 'N/A'}}</td>
                    <td>{!! $faq->answer ?? 'N/A' !!}</td>


                    <td>
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="
                            btn btn-sm btn-primary m-2">Edit</a>
                        <form action="{{route('admin.faq.delete', $faq->id)}}" method="POST" class="d-inline m-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $faqs->links() }}
    </div>
</div>
@endsection