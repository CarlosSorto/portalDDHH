<?php

namespace App\Repositories;

use App\Organization;
use App\Transformers\OrganizationTransformer;
use Iw\Api\Repositories\ResourcesRepository;

class OrganizationRepository
{
    use ResourcesRepository;

    public function modelClass()
    {
        return Organization::class;
    }

    public function transformerClass()
    {
        return OrganizationTransformer::class;
    }
}
