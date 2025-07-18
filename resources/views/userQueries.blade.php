@extends('app')

@section('content')
<div class="container py-4">
    <div class="row g-4">

        @foreach ($queries as $query)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $query->vendor->name ?? 'N/A' }}</h5>
                    <p class="card-text"><strong>Query:</strong> {{ $query->query }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewQueryModal{{ $query->id }}">
                        View
                    </button>
                    <form action="{{ route('user.delete.query', $query->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="viewQueryModal{{ $query->id }}" tabindex="-1" aria-labelledby="viewQueryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewQueryModalLabel">Your Query</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $query->user_name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $query->user_email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Your Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $query->user_mobile }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" readonly>{{ $query->query }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $queries->links('pagination::bootstrap-5') }}
    </div>

    <!-- View Query Modal -->

</div>

@endsection