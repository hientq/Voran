@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Questions
                </div>
                <div class="panel-body">
                    @if (Auth::check())
                    <div class="row">
                        <div class="col-md-12">
                            <div style="float:right;">
                                <a href="{{action('QuestionsController@create')}}">
                                    <button class="btn btn-success">Post Question</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach($questions as $question)
                    <div class="row">
                        <div class="col-md-12">
                            <hr/>
                            <a href="{{action('QuestionsController@show', [$question->id])}}">
                                <h2>
                                    @if($question->answers->where('is_solution', 1)->count() > 0)
                                    [SOLVED]
                                    @endif
                                    {{ $question->title }}
                                </h2>
                            </a>
                            <small>By: {{ $question->user->username }} - {{ $question->created_at->diffForHumans() }}</small>
                            <p>{{ $question->question }}</p>
                            <small>Views: {{ $question->views }} | Answers: {{ $question->answers()->count() }}</small>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
