@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Question
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                {{ $question->title }}
                            </h2>
                            <small>By: {{ $question->user->username }} - {{ $question->created_at->diffForHumans() }} | Views: {{ $question->views }}</small>
                            @if(Auth::id() == $question->user->id)
                                <a href="{{ action('QuestionsController@edit',[$question->id]) }}">
                                    <small>Edit</small>
                                </a>
                            @endif
                            <p>{{ $question->question }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Answers
                </div>
                <div class="panel-body">
                    @if (Auth::check())
                    <div class="row">
                        <div class="col-md-12">
                            <div style="float:right;">
                                <a href="">
                                    <button class="btn btn-success">Post Answer</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <!-- answers go here -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
