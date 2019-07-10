<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'excerpt', 'body', 'cover', 'text_cover'];

    public function content($slug)
    {
        return $this->where('slug', $slug)->first()->body;
    }

    public function cover($slug)
    {
        return $this->where('slug', $slug)->first()->cover;
    }

    public function text($slug)
    {
        return $this->where('slug', $slug)->first()->text_cover;
    }
}
