<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['answer', 'is_solution'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function question() {
        return $this->belongsTo('App\Question');
    }
}
