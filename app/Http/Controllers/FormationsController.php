<?php

namespace App\Http\Controllers;

use App\Formation;
use App\Http\Requests\FormationRequest;

class FormationsController extends Controller
{
    protected $formation;

    public function __construct(Formation $formation)
    {
        $this->formation = $formation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(FormationRequest $request)
    {
        $this->formation->fill($request->all());

        if ($this->formation->save()) {
            return redirect(route('create.formation'))->with('success', 'success send');
        }

        return back();
    }
}
