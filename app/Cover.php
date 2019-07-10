<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    protected $fillable = ['image', 'title', 'description'];

    public function get($section)
    {
        return $this->where('section', $section)->first();
    }
}
