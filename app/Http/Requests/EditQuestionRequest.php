<?php namespace App\Http\Requests;

use Input;
use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Question;

class EditQuestionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Guard $guard)
	{
        $questionId = Request::segment(2);
        $question = Question::find($questionId);
        if ( ! $question || $question->user->id != $guard->id()) {
            return false;
        }

        return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:3',
            'question' => 'required'
		];
	}

}
