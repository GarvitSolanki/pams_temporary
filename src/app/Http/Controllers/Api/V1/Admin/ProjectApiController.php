<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource(Project::all());
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($request->input('project_media', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . $request->input('project_media')))->toMediaCollection('project_media');
        }

        if ($request->input('project_dataset', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . $request->input('project_dataset')))->toMediaCollection('project_dataset');
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->input('project_media', false)) {
            if (!$project->project_media || $request->input('project_media') !== $project->project_media->file_name) {
                $project->addMedia(storage_path('tmp/uploads/' . $request->input('project_media')))->toMediaCollection('project_media');
            }
        } elseif ($project->project_media) {
            $project->project_media->delete();
        }

        if ($request->input('project_dataset', false)) {
            if (!$project->project_dataset || $request->input('project_dataset') !== $project->project_dataset->file_name) {
                $project->addMedia(storage_path('tmp/uploads/' . $request->input('project_dataset')))->toMediaCollection('project_dataset');
            }
        } elseif ($project->project_dataset) {
            $project->project_dataset->delete();
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
