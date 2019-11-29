<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\College;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use App\Http\Resources\Admin\CollegeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CollegeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('college_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollegeResource(College::all());
    }

    public function store(StoreCollegeRequest $request)
    {
        $college = College::create($request->all());

        return (new CollegeResource($college))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(College $college)
    {
        abort_if(Gate::denies('college_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CollegeResource($college);
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        $college->update($request->all());

        return (new CollegeResource($college))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(College $college)
    {
        abort_if(Gate::denies('college_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $college->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
