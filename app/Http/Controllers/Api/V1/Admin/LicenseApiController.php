<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Http\Resources\Admin\LicenseResource;
use App\Models\License;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LicenseApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('license_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LicenseResource(License::with(['vendor', 'analyst', 'legal'])->get());
    }

    public function store(StoreLicenseRequest $request)
    {
        $license = License::create($request->all());

        if ($request->input('license', false)) {
            $license->addMedia(storage_path('tmp/uploads/' . basename($request->input('license'))))->toMediaCollection('license');
        }

        return (new LicenseResource($license))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(License $license)
    {
        abort_if(Gate::denies('license_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LicenseResource($license->load(['vendor', 'analyst', 'legal']));
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

        return (new LicenseResource($license))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(License $license)
    {
        abort_if(Gate::denies('license_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $license->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
