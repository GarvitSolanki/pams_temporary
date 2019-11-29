<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\Admin\StudentResource;
use App\Student;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StudentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResource(Student::all());
    }

    public function store(StoreStudentRequest $request)
    {   $student1 = $student->compact(email , password);
        DB::table('users')->insert($student1);
        $student = Student::create($request->all());

        if ($request->input('student_profile_image', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('student_profile_image')))->toMediaCollection('student_profile_image');
        }

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        if ($request->input('student_profile_image', false)) {
            if (!$student->student_profile_image || $request->input('student_profile_image') !== $student->student_profile_image->file_name) {
                $student->addMedia(storage_path('tmp/uploads/' . $request->input('student_profile_image')))->toMediaCollection('student_profile_image');
            }
        } elseif ($student->student_profile_image) {
            $student->student_profile_image->delete();
        }

        return (new StudentResource($student))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
