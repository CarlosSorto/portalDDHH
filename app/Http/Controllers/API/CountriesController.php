<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\CountryRepository;
use Iw\Api\Traits\Http\Controllers\ResourcesController;

class CountriesController extends Controller
{
    use ResourcesController;

    protected $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }
}
