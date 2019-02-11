<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'done'];

    public function category()
    {
        $this->belongsTo('App\Model\Category');
    }
}
