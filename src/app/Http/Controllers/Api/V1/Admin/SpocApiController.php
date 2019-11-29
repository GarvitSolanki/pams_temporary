<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSpocRequest;
use App\Http\Requests\UpdateSpocRequest;
use App\Http\Resources\Admin\SpocResource;
use App\Spoc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpocApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('spoc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpocResource(Spoc::all());
    }

    public function store(StoreSpocRequest $request)
    {
        $spoc = Spoc::create($request->all());

        if ($request->input('spoc_profile_image', false)) {
            $spoc->addMedia(storage_path('tmp/uploads/' . $request->input('spoc_profile_image')))->toMediaCollection('spoc_profile_image');
        }

        return (new SpocResource($spoc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Spoc $spoc)
    {
        abort_if(Gate::denies('spoc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SpocResource($spoc);
    }

    public function update(UpdateSpocRequest $request, Spoc $spoc)
    {
        $spoc->update($request->all());

        if ($request->input('spoc_profile_image', false)) {
            if (!$spoc->spoc_profile_image || $request->input('spoc_profile_image') !== $spoc->spoc_profile_image->file_name) {
                $spoc->addMedia(storage_path('tmp/uploads/' . $request->input('spoc_profile_image')))->toMediaCollection('spoc_profile_image');
            }
        } elseif ($spoc->spoc_profile_image) {
            $spoc->spoc_profile_image->delete();
        }

        return (new SpocResource($spoc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Spoc $spoc)
    {
        abort_if(Gate::denies('spoc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $spoc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
