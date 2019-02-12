<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
