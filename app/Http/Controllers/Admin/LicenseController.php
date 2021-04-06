<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLicenseRequest;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Models\License;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LicenseController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('license_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $licenses = License::with(['vendor', 'analyst', 'legal', 'media'])->get();

        return view('admin.licenses.index', compact('licenses'));
    }

    public function create()
    {
        abort_if(Gate::denies('license_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.licenses.create');
    }

    public function store(StoreLicenseRequest $request)
    {
        $license = License::create($request->all());

        if ($request->input('license', false)) {
            $license->addMedia(storage_path('tmp/uploads/' . basename($request->input('license'))))->toMediaCollection('license');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $license->id]);
        }

        return redirect()->route('admin.licenses.index');
    }

    public function edit(License $license)
    {
        abort_if(Gate::denies('license_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $analysts = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $legals = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $license->load('vendor', 'analyst', 'legal');

        return view('admin.licenses.edit', compact('vendors', 'analysts', 'legals', 'license'));
    }

    public function update(UpdateLicenseRequest $request, License $license)
    {
        $license->update($request->all());

        if ($request->input('license', false)) {
            if (!$license->license || $request->input('license') !== $license->license->file_name) {
                if ($license->license) {
                    $license->license->delete();
                }

                $license->addMedia(storage_path('tmp/uploads/' . basename($request->input('license'))))->toMediaCollection('license');
            }
        } elseif ($license->license) {
            $license->license->delete();
        }

        return redirect()->route('admin.licenses.index');
    }

    public function show(License $license)
    {
        abort_if(Gate::denies('license_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $license->load('vendor', 'analyst', 'legal');

        return view('admin.licenses.show', compact('license'));
    }

    public function destroy(License $license)
    {
        abort_if(Gate::denies('license_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $license->delete();

        return back();
    }

    public function massDestroy(MassDestroyLicenseRequest $request)
    {
        License::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('license_create') && Gate::denies('license_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new License();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
