<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassionRequest;
use App\Http\Resources\PassionResource;
use App\Models\Passion;

class PassionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Passion::class);

        return PassionResource::collection(Passion::all());
    }

    public function store(PassionRequest $request)
    {
        $this->authorize('create', Passion::class);

        return new PassionResource(Passion::create($request->validated()));
    }

    public function show(Passion $passion)
    {
        $this->authorize('view', $passion);

        return new PassionResource($passion);
    }

    public function update(PassionRequest $request, Passion $passion)
    {
        $this->authorize('update', $passion);

        $passion->update($request->validated());

        return new PassionResource($passion);
    }

    public function destroy(Passion $passion)
    {
        $this->authorize('delete', $passion);

        $passion->delete();

        return response()->json();
    }
}
