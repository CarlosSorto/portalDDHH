<?php

namespace App\Traits\Models;

use \App\SearchContent;
/**
 *
 */
trait SearchContentDocument
{
  static function  bootSearchContentDocument()
  {
    static::saved(function ($model) {
        $search_content = $model->searchContent;
        if (empty($search_content)) {
          $search_content = new SearchContent();
        }
        $search_content->active = $model->active;
        $search_content->title = $model->title;
        $search_content->author = $model->author;
        $search_content->description = $model->description;
        $search_content->long_description = $model->long_description;
        $search_content->sourceable()->associate($model);
        $search_content->save();
    });
  }
}
