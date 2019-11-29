<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Coach;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Http\Resources\Admin\CoachResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('coach_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoachResource(Coach::all());
    }

    public function store(StoreCoachRequest $request)
    {
        $coach = Coach::create($request->all());

        if ($request->input('coach_profile_image', false)) {
            $coach->addMedia(storage_path('tmp/uploads/' . $request->input('coach_profile_image')))->toMediaCollection('coach_profile_image');
        }

        return (new CoachResource($coach))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Coach $coach)
    {
        abort_if(Gate::denies('coach_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CoachResource($coach);
    }

    public function update(UpdateCoachRequest $request, Coach $coach)
    {
        $coach->update($request->all());

        if ($request->input('coach_profile_image', false)) {
            if (!$coach->coach_profile_image || $request->input('coach_profile_image') !== $coach->coach_profile_image->file_name) {
                $coach->addMedia(storage_path('tmp/uploads/' . $request->input('coach_profile_image')))->toMediaCollection('coach_profile_image');
            }
        } elseif ($coach->coach_profile_image) {
            $coach->coach_profile_image->delete();
        }

        return (new CoachResource($coach))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Coach $coach)
    {
        abort_if(Gate::denies('coach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coach->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
