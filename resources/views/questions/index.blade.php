@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="flex-container">
                        <h2>All Questions</h2>
                        <div>
                            <a href="{{ route('questions.create') }}" class="btn btn-default">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters col-md-1">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{ str_plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers }}</strong> {{ str_plural('answer', $question->answers) }}
                                </div>
                                <div class="view">
                                    {{ $question->views . " " . str_plural('view', $question->views) }}
                                </div>
                            </div>

                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <p class="lead">
                                    Asked by 
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ str_limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="text-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
