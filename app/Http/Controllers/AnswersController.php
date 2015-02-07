<?php namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AnswersController extends Controller {

	private $pg_data = array();

    public function create($questionId) {
        $this->pg_data['question'] = Question::find($questionId);
        //dd($this->pg_data['question']->user->username);
        return view('answers.create', $this->pg_data);
    }

    public function store($questionId, Requests\AnswerRequest $request, Guard $guard) {
        $answer = new Answer();
        $answer['answer'] = $request['answer'];
        $answer['question_id'] = $questionId;
        $answer['user_id'] = $guard->id();
        $answer['is_solution'] = 0;
        $answer['votes'] = 0;
        $answer->save();

        return redirect('/questions/' . $questionId);
    }

    public function edit($questionId, $answerId) {
        $this->pg_data['question'] = Question::find($questionId);
        $this->pg_data['answer'] = Answer::find($answerId);
        return view('answers.edit', $this->pg_data);
    }

    public function update($questionId, $answerId, Requests\AnswerRequest $request) {
        $answer = Answer::find($answerId);
        $answer['answer'] = $request['answer'];
        $answer->update();

        return redirect('/questions/' . $questionId);
    }

}
