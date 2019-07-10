<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\FormationRepository;
use Iw\Api\Traits\Http\Controllers\ResourcesController;

class FormationsController extends Controller
{
    use ResourcesController;

    protected $repository;

    public function __construct(FormationRepository $repository)
    {
        $this->repository = $repository;
    }
}
