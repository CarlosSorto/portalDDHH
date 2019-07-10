<?php

namespace App\Repositories;

use App\Document;
use App\Transformers\DocumentTransformer;
use Iw\Api\Repositories\ResourcesRepository;

class DocumentRepository
{
    use ResourcesRepository;

    public function modelClass()
    {
        return Document::class;
    }

    public function transformerClass()
    {
        return DocumentTransformer::class;
    }
}
