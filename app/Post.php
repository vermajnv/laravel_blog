<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    // By default the table name is posts we can change that
    // protected $table = 'posts';
    protected $fillable = ['user_id', 'title', 'body', 'cover_image'];
    public function user() {
        // Single Post is belongs to a user
        return $this->belongsTo('App\User');

    }

    function post() {
      return $this->belongsTo('App\Post');
    }
}
