<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ModuleController extends Controller
{
    private $moduleRepository;

    private $breadcrumbs;
    protected $moduleTypes = ['Menu', 'Sub Menu', 'Action'];

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->middleware('auth');
        $this->moduleRepository = $moduleRepository;
        $this->breadcrumbs = [
            ['url' => null, 'params' => null, 'caption' => 'User & Credential'],
            ['url' => 'module', 'params' => null, 'caption' => 'Module']
        ];
        view()->share('title', 'Module');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'module');
        return view('module.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $data = $this->moduleRepository->search([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'parent_code' => $request->input('parent_code'),
            'type' => $request->input('type'),
        ], false);
        return $request->has('ajax') ? $data : view('module._table', compact('data'))->render();
    }

    public function info(Request $request, $id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $moduleTypes = [];
        foreach ($this->moduleTypes as $moduleType) {
            array_push($moduleTypes, ['id' => $moduleType]);
        }

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'module.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'module.info', 'params' => $id, 'caption' => 'Edit']);

        $module = $this->moduleRepository->find($id);
        return view('module.info', compact('id', 'breadcrumbs', 'moduleTypes', 'module', 'request'));
    }

    public function save(ModuleRequest $request, $id)
    {
        if ($request->input('parent_code') == '') $request->merge(['parent_code' => '#']);
        if ($id == 'new')
            $this->moduleRepository->store($request);
        else
            $this->moduleRepository->update($request, $id);
        return redirect()->route('module')
            ->with('success', 'Module Saved');
    }

    public function delete($id)
    {
        $this->moduleRepository->delete($id);
    }

    public function move($code, $direction)
    {
        return $this->moduleRepository->move($code, $direction);
    }
}
