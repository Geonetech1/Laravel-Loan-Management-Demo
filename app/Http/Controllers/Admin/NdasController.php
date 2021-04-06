<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNdaRequest;
use App\Http\Requests\StoreNdaRequest;
use App\Http\Requests\UpdateNdaRequest;
use App\Models\Contract;
use App\Models\Nda;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NdasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('nda_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ndas = Nda::with(['vendor', 'analyst', 'legal', 'contract', 'media'])->get();

        return view('admin.ndas.index', compact('ndas'));
    }

    public function create()
    {
        abort_if(Gate::denies('nda_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ndas.create');
    }

    public function store(StoreNdaRequest $request)
    {
        $nda = Nda::create($request->all());

        if ($request->input('nda', false)) {
            $nda->addMedia(storage_path('tmp/uploads/' . basename($request->input('nda'))))->toMediaCollection('nda');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $nda->id]);
        }

        return redirect()->route('admin.ndas.index');
    }

    public function edit(Nda $nda)
    {
        abort_if(Gate::denies('nda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $analysts = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $legals = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contracts = Contract::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nda->load('vendor', 'analyst', 'legal', 'contract');

        return view('admin.ndas.edit', compact('vendors', 'analysts', 'legals', 'contracts', 'nda'));
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

        return redirect()->route('admin.ndas.index');
    }

    public function show(Nda $nda)
    {
        abort_if(Gate::denies('nda_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nda->load('vendor', 'analyst', 'legal', 'contract');

        return view('admin.ndas.show', compact('nda'));
    }

    public function destroy(Nda $nda)
    {
        abort_if(Gate::denies('nda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nda->delete();

        return back();
    }

    public function massDestroy(MassDestroyNdaRequest $request)
    {
        Nda::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('nda_create') && Gate::denies('nda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Nda();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
