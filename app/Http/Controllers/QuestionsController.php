<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\EditQuestionRequest;
use Illuminate\Contracts\Auth\Guard;
use Request;

class QuestionsController extends Controller {

    private $pg_data = array();

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //this will eventually change to be the latest
        //questions that have been answered
        $this->pg_data["questions"] = Question::latest()->get();
        return view('questions.index',$this->pg_data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('questions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateQuestionRequest $request, Guard $guard)
	{
		$question = new Question($request->all());
        $question->startValues();

        $question['user_id'] = $guard->id();
        $question->save();

        return redirect('/questions/' . $question->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Guard $guard)
	{
        $question = Question::find($id);

        if($guard->id() != $question->user->id) {
            $question['views'] = $question['views'] + 1;
            $question->update();
        }

        $this->pg_data['question'] = $question;

        return view('questions.show', $this->pg_data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->pg_data['question'] = Question::findOrFail($id);
        return view('questions.edit',$this->pg_data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditQuestionRequest $request)
	{
        echo "hey";
		$question = Question::findOrFail($id);
        $question['title'] = $request['title'];
        $question['question'] = $request['question'];
        $question->update();

        return redirect('/questions/' . $question->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
