<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\UserLevelRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userRepository;
    private $userLevelRepository;

    private $breadcrumbs;

    public function __construct(UserRepository $userRepository, UserLevelRepository $userLevelRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->userLevelRepository = $userLevelRepository;
        $this->breadcrumbs = [
            ['url' => null, 'params' => null, 'caption' => 'User & Credential'],
            ['url' => 'user', 'params' => null, 'caption' => 'User']
        ];
        view()->share('title', 'User');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'user');
        return view('user.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->userRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('user._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $userLevels = $this->userLevelRepository->search(null, false);

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'user.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'user.info', 'params' => $id, 'caption' => 'Edit']);

        $user = $this->userRepository->find($id);
        return view('user.info', compact('id', 'breadcrumbs', 'user', 'userLevels'));
    }

    public function save(UserRequest $request, $id)
    {
        if ($id == 'new')
            $this->userRepository->store($request);
        else
            $this->userRepository->update($request, $id);
        return redirect()->route('user')
            ->with('success', 'User Saved');
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
    }
}
