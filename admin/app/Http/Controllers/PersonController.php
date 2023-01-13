<?php

namespace Admin\Http\Controllers;

use Admin\Http\Indexes\PersonIndex;
use Admin\Http\Resources\PersonResource;
use App\Http\Requests\StorePersonRequest;
use App\Models\File;
use App\Models\Person;
use App\Services\CacheService;
use Illuminate\Http\Request;

class PersonController
{
    /**
     * Get Page items.
     *
     * @param  Page  $page
     * @return Page
     */
    public function index(Request $request, PersonIndex $index)
    {
        return $index->items(
            $request,
            Person::query()->orderBy('name', 'asc')->orderBy('created_at', 'desc'),
            PersonResource::class
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'sometimes',
            'email' => 'sometimes',
            'image' => 'sometimes',
            'phone' => 'sometimes',
        ]);

        $person = Person::create($request->except('image'));

        if ($request->image && array_key_exists('id', $request->image) && $request->image['id'] != 0) {
            $person->attachFile(File::findOrFail($request->image['id']), 'image');
        }

        app(CacheService::class)->forget(Person::class);

        return PersonResource::make($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'description' => 'string|nullable',
            'phone' => 'string|nullable',
            'email' => 'string|nullable',
            'image' => 'sometimes',
            'image.id' => 'sometimes|exists:files,id',
        ]);

        if ($request->image) {
            // if old image exists, detach it first
            $image = $person->files('image')->first();

            if ($image) {
                $person->detachFile($image);
            }

            if (array_key_exists('id', $request->image)) {
                $person->attachFile(File::findOrFail($request->image['id']), 'image');
            }
        }

        $person->update($validated);

        app(CacheService::class)->forget(Person::class);

        return PersonResource::make($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        app(CacheService::class)->forget(Person::class);

        return response()->noContent();
    }
}
