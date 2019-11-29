<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySpocRequest;
use App\Http\Requests\StoreSpocRequest;
use App\Http\Requests\UpdateSpocRequest;
use App\Spoc;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class SpocController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('spoc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $spocs = Spoc::all();

        return view('admin.spocs.index', compact('spocs'));
    }

    public function create()
    {
        abort_if(Gate::denies('spoc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spocs.create');
    }

    public function store(StoreSpocRequest $request)
    {
        $spoc = Spoc::create($request->all());

        if ($request->input('spoc_profile_image', false)) {
            $spoc->addMedia(storage_path('tmp/uploads/' . $request->input('spoc_profile_image')))->toMediaCollection('spoc_profile_image');
        }

        $spoc_email =  $request->input('spoc_email');
        $spoc_password =  Hash::make($request->input('spoc_password'));
        $spoc_name = $request->input('spoc_first_name');
        $role="spoc";
        $sqlquery = "SELECT * FROM `spocs` WHERE `spoc_email` = '$spoc_email'";
        $result = DB::select(DB::raw($sqlquery));
        $id = $result[0]->id;
        DB::table('users')->insert(array(
            'id' => $id,
            'email' => $spoc_email,
            'password' => $spoc_password,
            'name' => $spoc_name,
            'created_at' => now(),
            'updated_at' => now()
        ));
        DB::table('role_user')->insert(array(
            'user_id' => $id,
            'role_id' => 4
        ));

        return redirect()->route('admin.spocs.index');
    }

    public function edit(Spoc $spoc)
    {
        abort_if(Gate::denies('spoc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spocs.edit', compact('spoc'));
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

        return redirect()->route('admin.spocs.index');
    }

    public function show(Spoc $spoc)
    {
        abort_if(Gate::denies('spoc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spocs.show', compact('spoc'));
    }

    public function destroy(Spoc $spoc)
    {
        abort_if(Gate::denies('spoc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $spoc->delete();

        return back();
    }

    public function massDestroy(MassDestroySpocRequest $request)
    {
        Spoc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
