<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\OrganizationRepository;
use Iw\Api\Traits\Http\Controllers\ResourcesController;

class OrganizationsController extends Controller
{
    use ResourcesController;

    protected $repository;

    public function __construct(OrganizationRepository $repository)
    {
        $this->repository = $repository;
    }
}
