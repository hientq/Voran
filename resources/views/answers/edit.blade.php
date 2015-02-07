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
                <div class="panel-heading">Answer
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">

                            @include('errors.uierrors')

                            {!! Form::model($answer, ['method' => 'PATCH', 'action' => ['AnswersController@update', $question->id, $answer->id]]) !!}

                            <div class="form-group">
                                {!! Form::label('answer', '') !!}
                                {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Create Answer', ['class' => 'btn btn-primary form-control']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
