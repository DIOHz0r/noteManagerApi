<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function notes()
    {
        $this->hasMany('App\Modules\Note');
    }
}
