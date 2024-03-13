@extends('layouts.app')
@section('title', __('Feedback'))
@section('header')
{{ __('Feedback') }}
@endsection
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<div class="row gy-3 mt-5 for_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$feedback->title}} - {{$feedback->category}}</div>
                    <div class="card-body">{{$feedback->description}}</div>
                    @if(Auth::user()->role == 'User')
                    <div class="card-footer d-flex justify-content-between">
                        <form action="{{ route('feedbacks.vote', $feedback->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn {{ Auth::user()->voteStatus($feedback->id)->exists() == true ? 'btn-primary' : 'btn-outline-primary' }}"><i class="fa-solid fa-thumbs-up"></i> {{$feedback->voteCount()->count()}}</button>

                        </form>
                    </div>
                    @endif
                </div>
                <hr>
                @forelse($feedback->comments as $comment)
                <div class="card">
                    <div class="card-header">{{$comment->user->name}} <small class="fst-italic">({{ $comment->created_at->format('Y-M-d h:i a') }})</small></div>
                    <div class="card-body">{!!$comment->content!!}</div>
                </div>
                @empty
                <div class="text-center">No Comments</div>
                @endforelse
                <hr>
                @if(Auth::user()->role == 'User' && $feedback->commenting == 'enabled')
                <div class="card">
                    <div class="card-header">Add Comment</div>
                    <form action="{{ route('feedbacks.comment', $feedback->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="content">Type Comment</label>
                                <textarea class="form-control" id="editor" name="content" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit Comment</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection