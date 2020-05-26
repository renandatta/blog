<?php

namespace App\Repositories;

use App\Module;
use App\UserLevel;
use App\UserLevelCredential;

class UserLevelRepository {

    protected $userLevel;
    protected $module;
    protected $userLevelCredential;

    public function __construct(UserLevel $userLevel, Module $module, UserLevelCredential $userLevelCredential)
    {
        $this->userLevel = $userLevel;
        $this->module = $module;
        $this->userLevelCredential = $userLevelCredential;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->userLevel->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->userLevel->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->userLevel->create($request->all());
    }

    public function update($request, $id)
    {
        $userLevel = $this->userLevel->find($id);
        $userLevel->update($request->all());
        return $userLevel;
    }

    public function delete($id)
    {
        $userLevel = $this->userLevel->find($id);
        $userLevel->delete();
        return $userLevel;
    }

    public function save_credential($request, $id)
    {
        $userLevel = $this->userLevel->find($id);
        $modules = $this->module->orderBy('code', 'asc')->get();
        foreach ($modules as $module) {
            $credential = $this->userLevelCredential->firstOrCreate([
                'user_level_id' => $userLevel->id,
                'module_id' => $module->id
            ]);
            $credential->is_allowed = $request->has($module->id) ? 1 : 0;
            $credential->save();
        }
    }
}
