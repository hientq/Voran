<?php namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AnswersController extends Controller {

	private $pg_data = array();

    public function create(Question $question) {
        $this->pg_data['question'] = $question;
        return view('answers.create', $this->pg_data);
    }

    public function store(Question $question, Requests\AnswerRequest $request, Guard $guard) {
        $answer = new Answer();
        $answer['answer'] = $request['answer'];
        $answer['question_id'] = $question->id;
        $answer['user_id'] = $guard->id();
        $answer['is_solution'] = 0;
        $answer['votes'] = 0;
        $answer->save();

        return redirect('/questions/' . $question->id);
    }

    public function edit(Question $question, Answer $answer) {
        $this->pg_data['question'] = $question;
        $this->pg_data['answer'] = $answer;
        return view('answers.edit', $this->pg_data);
    }

    public function update(Question $question, Answer $answer, Requests\AnswerRequest $request) {
        $answer['answer'] = $request['answer'];
        $answer->update();

        return redirect('/questions/' . $question->id);
    }

}
