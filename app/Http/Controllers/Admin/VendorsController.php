<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVendorRequest;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Client;
use App\Models\ProjectStatus;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::with(['client', 'status'])->get();

        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ProjectStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vendors.create', compact('clients', 'statuses'));
    }

    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->all());

        return redirect()->route('admin.vendors.index');
    }

    public function edit(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ProjectStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor->load('client', 'status');

        return view('admin.vendors.edit', compact('clients', 'statuses', 'vendor'));
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());

        return redirect()->route('admin.vendors.index');
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->load('client', 'status');

        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVendorRequest $request)
    {
        Vendor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
