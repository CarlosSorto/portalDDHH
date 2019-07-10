<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['key', 'value'];

    public function get($key)
    {
        return $this->where('key', $key)->first()->value;
    }
}
