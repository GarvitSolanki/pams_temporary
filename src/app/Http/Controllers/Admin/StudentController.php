<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());

        if ($request->input('student_profile_image', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('student_profile_image')))->toMediaCollection('student_profile_image');
        }
        $student_email =  $request->input('student_email');
        $student_password =  Hash::make($request->input('student_password'));
        $student_name = $request->input('student_first_name');
        $role=4;
        DB::table('users')->insert(array(
            'email' => $student_email,
            'password' => $student_password,
            'name' => $student_name,
            'role_id' => $role,
            'created_at' => now(),
            'updated_at' => now()
        ));

        return redirect()->route('admin.students.index');


    }

    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.students.edit', compact('student'));
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


        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
