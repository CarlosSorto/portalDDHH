<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\DocumentRequest;

class DocumentsController extends Controller
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $this->document->fill($request->all());
        if ($request->file('file')) {
            $name                 = uniqid().'.'.$request->file->extension();
            $path                 = $request->file->storeAs('documents', $name, 'public');
            $this->document->file = $path;
        }

        if ($this->document->save()) {
            $this->document->topics()->sync($request->get('topics'));

            return redirect(route('create.document'))->with('success', 'success send');
        }

        return back();
    }
}
