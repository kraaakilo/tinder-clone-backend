<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestRequest;
use App\Http\Resources\InterestResource;
use App\Models\Interest;

class InterestController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Interest::class);

        return InterestResource::collection(Interest::all());
    }

    public function store(InterestRequest $request)
    {
        $this->authorize('create', Interest::class);

        return new InterestResource(Interest::create($request->validated()));
    }

    public function show(Interest $interest)
    {
        $this->authorize('view', $interest);

        return new InterestResource($interest);
    }

    public function update(InterestRequest $request, Interest $interest)
    {
        $this->authorize('update', $interest);

        $interest->update($request->validated());

        return new InterestResource($interest);
    }

    public function destroy(Interest $interest)
    {
        $this->authorize('delete', $interest);

        $interest->delete();

        return response()->json();
    }
}
