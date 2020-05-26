<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLevelRequest;
use App\Repositories\ModuleRepository;
use App\Repositories\UserLevelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserLevelController extends Controller
{
    private $userLevelRepository;
    private $moduleRepository;

    private $breadcrumbs;

    public function __construct(UserLevelRepository $userLevelRepository, ModuleRepository $moduleRepository)
    {
        $this->middleware('auth');
        $this->userLevelRepository = $userLevelRepository;
        $this->moduleRepository = $moduleRepository;
        $this->breadcrumbs = [
            ['url' => null, 'params' => null, 'caption' => 'User & Credential'],
            ['url' => 'user_level', 'params' => null, 'caption' => 'User Level']
        ];
        view()->share('title', 'User Level');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'user_level');
        return view('user_level.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->userLevelRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('user_level._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'user_level.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'user_level.info', 'params' => $id, 'caption' => 'Edit']);

        $userLevel = $this->userLevelRepository->find($id);
        return view('user_level.info', compact('id', 'breadcrumbs', 'userLevel'));
    }

    public function save(UserLevelRequest $request, $id)
    {
        if ($id == 'new')
            $this->userLevelRepository->store($request);
        else
            $this->userLevelRepository->update($request, $id);
        return redirect()->route('user_level')
            ->with('success', 'User Level Saved');
    }

    public function delete($id)
    {
        $this->userLevelRepository->delete($id);
    }

    public function credential($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        array_push($breadcrumbs, ['url' => 'user_level.credential', 'params' => $id, 'caption' => 'Credential']);

        $modules = $this->moduleRepository->search(null, false);
        $userLevel = $this->userLevelRepository->find($id);
        return view('user_level.credential', compact('id', 'breadcrumbs', 'userLevel', 'modules'));
    }

    public function credential_save(Request $request, $id)
    {
        $this->userLevelRepository->save_credential($request, $id);
        return redirect()->route('user_level')
            ->with('success', 'Credential Saved');
    }
}
