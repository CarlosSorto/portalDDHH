<?php

namespace App\Repositories;

use App\Formation;
use App\Transformers\FormationTransformer;
use Iw\Api\Repositories\ResourcesRepository;

class FormationRepository
{
    use ResourcesRepository;

    public function modelClass()
    {
        return Formation::class;
    }

    public function transformerClass()
    {
        return FormationTransformer::class;
    }
}
