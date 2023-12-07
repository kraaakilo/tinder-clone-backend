<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Http\Resources\PhotoResource;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Photo::class);

        return PhotoResource::collection(Photo::all());
    }

    public function store(PhotoRequest $request)
    {
        $this->authorize('create', Photo::class);

        return new PhotoResource(Photo::create($request->validated()));
    }

    public function show(Photo $photo)
    {
        $this->authorize('view', $photo);

        return new PhotoResource($photo);
    }

    public function update(PhotoRequest $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $photo->update($request->validated());

        return new PhotoResource($photo);
    }

    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        $photo->delete();

        return response()->json();
    }
}
