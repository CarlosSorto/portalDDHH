<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    protected $organization;

    public function __construct(Organization $organization)
    {
        $this->organization = $organization;
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
    public function store(OrganizationRequest $request)
    {
        $this->organization->fill($request->all());
        if ($request->file('image')) {
            $name                      = uniqid().'.'.$request->image->extension();
            $path                      = $request->image->storeAs('organizations', $name, 'public');
            $this->organization->image = $path;
        }

        if ($this->organization->save()) {
            $this->organization->work_areas()->sync($request->get('workareas'));

            return redirect(route('create.organization'))->with('success', 'success send');
        }

        return redirect()->back();
    }

}
