<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'question', 'views', 'is_active', 'is_solved'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function startValues() {
        $this->views = 0;
        $this->is_active = 1;
        $this->is_solved = 0;
    }
}
