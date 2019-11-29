<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCoachRequest;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('coach_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coaches = Coach::all();

        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        abort_if(Gate::denies('coach_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coaches.create');
    }

    public function store(StoreCoachRequest $request)
    {
        $coach = Coach::create($request->all());

        if ($request->input('coach_profile_image', false)) {
            $coach->addMedia(storage_path('tmp/uploads/' . $request->input('coach_profile_image')))->toMediaCollection('coach_profile_image');
        }

        return redirect()->route('admin.coaches.index');
    }

    public function edit(Coach $coach)
    {
        abort_if(Gate::denies('coach_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coaches.edit', compact('coach'));
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

        return redirect()->route('admin.coaches.index');
    }

    public function show(Coach $coach)
    {
        abort_if(Gate::denies('coach_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coaches.show', compact('coach'));
    }

    public function destroy(Coach $coach)
    {
        abort_if(Gate::denies('coach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coach->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoachRequest $request)
    {
        Coach::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
