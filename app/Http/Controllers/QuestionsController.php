<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Http\Requests\CreateQuestionRequest;
use Illuminate\Contracts\Auth\Guard;
use Request;

class QuestionsController extends Controller {

    private $data;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //this will eventually change to be the latest
        //questions that have been answered
        $pg_data["questions"] = Question::latest()->get();
        return view('questions.index',$pg_data);
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
	public function show($id)
	{
		$pg_data['question'] = Question::find($id);
        return view('questions.show', $pg_data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
