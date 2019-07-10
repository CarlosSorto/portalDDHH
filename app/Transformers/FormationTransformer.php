<?php

namespace App\Transformers;

use App\Formation;
use League\Fractal\TransformerAbstract;

class FormationTransformer extends TransformerAbstract
{
    public function transform(Formation $formation)
    {
        return [
          'id'          => $formation->id,
          'title'       => $formation->title,
          'description' => $formation->description,
          'modality'    => $formation->modality,
      ];
    }
}
