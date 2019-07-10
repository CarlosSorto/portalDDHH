<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class SearchContent extends Model
{


  use SearchableTrait;

  protected $searchable = [
    'columns' => [
        'search_contents.title' => 10,
        'search_contents.name' => 10,
        'search_contents.description' => 8,
        'search_contents.long_description' => 7,
    ]
  ];

  public function sourceable()
  {
      return $this->morphTo();
  }

}
