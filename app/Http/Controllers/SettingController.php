<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    private $settingRepository;
    private $breadcrumbs;
    public function __construct(SettingRepository $settingRepository)
    {
        $this->middleware('auth');
        $this->settingRepository = $settingRepository;
        $this->breadcrumbs = [
            ['url' => 'setting', 'params' => null, 'caption' => 'Setting']
        ];
        view()->share('title', 'Setting');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'setting');
        $breadcrumbs = $this->breadcrumbs;
        $setting = $this->settingRepository->find(1);
        return view('setting.index', compact('request', 'breadcrumbs', 'setting'));
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->settingRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('setting._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'setting.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'setting.info', 'params' => $id, 'caption' => 'Edit']);

        $setting = $this->settingRepository->find($id);
        return view('setting.info', compact('id', 'breadcrumbs', 'setting'));
    }

    public function save(SettingRequest $request, $id)
    {
        if ($id == 'new')
            $this->settingRepository->store($request);
        else
            $this->settingRepository->update($request, $id);
        return redirect()->route('setting')
            ->with('success', 'Setting Saved');
    }

    public function delete($id)
    {
        $this->settingRepository->delete($id);
    }
}
