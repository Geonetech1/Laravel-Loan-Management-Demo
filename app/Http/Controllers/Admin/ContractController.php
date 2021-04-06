<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContractRequest;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Comment;
use App\Models\Contract;
use App\Models\Nda;
use App\Models\Status;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ContractController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('contract_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contracts = Contract::with(['owner', 'status', 'analyst', 'legal', 'nda', 'comment', 'media'])->get();

        return view('admin.contracts.index', compact('contracts'));
    }

    public function create()
    {
        abort_if(Gate::denies('contract_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contracts.create', compact('owners', 'statuses'));
    }

    public function store(StoreContractRequest $request)
    {
        $contract = Contract::create($request->all());

        if ($request->input('contract', false)) {
            $contract->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contract->id]);
        }

        return redirect()->route('admin.contracts.index');
    }

    public function edit(Contract $contract)
    {
        abort_if(Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $owners = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ndas = Nda::all()->pluck('is_signed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comments = Comment::all()->pluck('comment', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contract->load('owner', 'status', 'analyst', 'legal', 'nda', 'comment');

        return view('admin.contracts.edit', compact('owners', 'statuses', 'ndas', 'comments', 'contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        if ($request->input('contract', false)) {
            if (!$contract->contract || $request->input('contract') !== $contract->contract->file_name) {
                if ($contract->contract) {
                    $contract->contract->delete();
                }

                $contract->addMedia(storage_path('tmp/uploads/' . basename($request->input('contract'))))->toMediaCollection('contract');
            }
        } elseif ($contract->contract) {
            $contract->contract->delete();
        }

        return redirect()->route('admin.contracts.index');
    }

    public function show(Contract $contract)
    {
        abort_if(Gate::denies('contract_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->load('owner', 'status', 'analyst', 'legal', 'nda', 'comment');

        return view('admin.contracts.show', compact('contract'));
    }

    public function destroy(Contract $contract)
    {
        abort_if(Gate::denies('contract_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractRequest $request)
    {
        Contract::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('contract_create') && Gate::denies('contract_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Contract();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
