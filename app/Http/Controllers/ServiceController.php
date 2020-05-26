<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    private $serviceRepository;

    private $breadcrumbs;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->middleware('auth');
        $this->serviceRepository = $serviceRepository;
        $this->breadcrumbs = [
            ['url' => 'service', 'params' => null, 'caption' => 'Service']
        ];
        view()->share('title', 'Service');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'service');
        return view('service.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->serviceRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('service._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'service.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'service.info', 'params' => $id, 'caption' => 'Edit']);

        $service = $this->serviceRepository->find($id);
        return view('service.info', compact('id', 'breadcrumbs', 'service'));
    }

    public function save(ServiceRequest $request, $id)
    {
        if ($id == 'new')
            $this->serviceRepository->store($request);
        else
            $this->serviceRepository->update($request, $id);
        return redirect()->route('service')
            ->with('success', 'Service Saved');
    }

    public function delete($id)
    {
        $this->serviceRepository->delete($id);
    }
}
