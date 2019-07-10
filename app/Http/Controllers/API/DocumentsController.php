<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentRepository;
use Iw\Api\Traits\Http\Controllers\ResourcesController;

class DocumentsController extends Controller
{
    use ResourcesController;

    protected $repository;

    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }
}
