<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\College;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();
        $colleges = College::all();

        /*dd($projects);*/
        return view('admin.projects.index', compact('projects','colleges'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        foreach ($request->input('project_media', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('project_media');
        }

        foreach ($request->input('project_dataset', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('project_dataset');
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if (count($project->project_media) > 0) {
            foreach ($project->project_media as $media) {
                if (!in_array($media->file_name, $request->input('project_media', []))) {
                    $media->delete();
                }
            }
        }

        $media = $project->project_media->pluck('file_name')->toArray();

        foreach ($request->input('project_media', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('project_media');
            }
        }

        if (count($project->project_dataset) > 0) {
            foreach ($project->project_dataset as $media) {
                if (!in_array($media->file_name, $request->input('project_dataset', []))) {
                    $media->delete();
                }
            }
        }

        $media = $project->project_dataset->pluck('file_name')->toArray();

        foreach ($request->input('project_dataset', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('project_dataset');
            }
        }

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function collegelist()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all();
        dd($projects);
        return view('admin.projects.index', compact('projects'));
    }
}
