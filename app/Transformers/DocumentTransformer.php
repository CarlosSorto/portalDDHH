<?php

namespace App\Transformers;

use App\Document;
use League\Fractal\TransformerAbstract;

class DocumentTransformer extends TransformerAbstract
{
    public function transform(Document $document)
    {
        return [
          'id'             => empty($document->id) ? null : (int) $document->id,
          'active'         => $document->active,
          'title'          => $document->title,
          'author'         => $document->author,
          'published_date' => $document->published_date,
      ];
    }
}
