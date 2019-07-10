<?php

namespace App\Traits\Models;

use \App\SearchContent;
/**
 *
 */
trait SearchContentFormation
{
  static function  bootSearchContentFormation()
  {
    static::saved(function ($model) {
        $search_content = $model->searchContent;
        if (empty($search_content)) {
          $search_content = new SearchContent();
        }
        $search_content->active = $model->active;
        $search_content->title = $model->title;
        $search_content->place = $model->place;
        $search_content->website = $model->website;
        $search_content->description = $model->description;
        $search_content->email = $model->email;
        $search_content->sourceable()->associate($model);
        $search_content->save();
    });
  }
}
