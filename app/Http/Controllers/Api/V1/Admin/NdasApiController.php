<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNdaRequest;
use App\Http\Requests\UpdateNdaRequest;
use App\Http\Resources\Admin\NdaResource;
use App\Models\Nda;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NdasApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('nda_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NdaResource(Nda::with(['vendor', 'analyst', 'legal', 'contract'])->get());
    }

    public function store(StoreNdaRequest $request)
    {
        $nda = Nda::create($request->all());

        if ($request->input('nda', false)) {
            $nda->addMedia(storage_path('tmp/uploads/' . basename($request->input('nda'))))->toMediaCollection('nda');
        }

        return (new NdaResource($nda))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Nda $nda)
    {
        abort_if(Gate::denies('nda_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NdaResource($nda->load(['vendor', 'analyst', 'legal', 'contract']));
    }

    public function update(UpdateNdaRequest $request, Nda $nda)
    {
        $nda->update($request->all());

        if ($request->input('nda', false)) {
            if (!$nda->nda || $request->input('nda') !== $nda->nda->file_name) {
                if ($nda->nda) {
                    $nda->nda->delete();
                }

                $nda->addMedia(storage_path('tmp/uploads/' . basename($request->input('nda'))))->toMediaCollection('nda');
            }
        } elseif ($nda->nda) {
            $nda->nda->delete();
        }

        return (new NdaResource($nda))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Nda $nda)
    {
        abort_if(Gate::denies('nda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nda->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
