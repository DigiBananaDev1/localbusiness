@extends('admin.layouts.app')
@section('title', 'Faques')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4> Faques</h4>
        </div>
        <form action="{{ route('admin.faq.submit') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" id="question" class="form-control" name="question" value="{{ old('question') }}">
                </div>
                <div class="form-group">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea name="answer" id="answer" placeholder="Type here answer" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')


<script>
    $(document).ready(function() {
        $('#answer').summernote({
            height: 200,
            tabsize: 2,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    });
</script>
@endsection