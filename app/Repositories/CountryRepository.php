<?php

namespace App\Repositories;

use App\Country;
use App\Transformers\CountryTransformer;
use Iw\Api\Repositories\ResourcesRepository;

class CountryRepository
{
    use ResourcesRepository;

    public function modelClass()
    {
        return Country::class;
    }

    public function transformerClass()
    {
        return CountryTransformer::class;
    }
}
