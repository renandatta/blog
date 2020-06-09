<?php

namespace App\Repositories;

use App\Module;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository {

    protected $user;
    protected $module;

    public function __construct(User $user, Module $module)
    {
        $this->user = $user;
        $this->module = $module;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->user->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
            $data = (!empty($parameters['user_level_id']) && $parameters['user_level_id']) != '' ?
                $data->where('user_level_id', '=', $parameters['user_level_id']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->user->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        $request = $request->input('password') != '' ? $request->merge(['password' => Hash::make($request->input('password'))]) : $request;
        return $this->user->create($request->all());
    }

    public function update($request, $id)
    {
        $user = $this->user->find($id);
        $request = $request->input('password') != '' ? $request->merge(['password' => Hash::make($request->input('password'))]) : $request;
        $user = ($request->input('password') == '') ? $user->update($request->except('password')) : $user->update($request->all());

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return $user;
    }
}
