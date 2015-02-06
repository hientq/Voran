<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model {

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

    public function users() {
        return $this->belongsTo('App\Users');
    }
}
