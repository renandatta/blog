<?php

namespace App\Repositories;

use App\Setting;

class SettingRepository {

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->setting->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['id']) && $parameters['id']) != '' ?
                $data->where('id', '=', $parameters['id']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->setting->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->setting->create($request->all());
    }

    public function update($request, $id)
    {
        $setting = $this->setting->find($id);
        $setting->update($request->all());
        return $setting;
    }

    public function delete($id)
    {
        $setting = $this->setting->find($id);
        $setting->delete();
        return $setting;
    }
}
