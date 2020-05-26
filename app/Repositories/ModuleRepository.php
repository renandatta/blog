<?php

namespace App\Repositories;

use App\Module;

class ModuleRepository {

    protected $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->module->orderBy('code', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
            $data = (!empty($parameters['code']) && $parameters['code']) != ''
                ? $data->where('code', 'like', $parameters['code'] . '%') : $data;
            $data = (!empty($parameters['parent_code']) && $parameters['parent_code']) != ''
                ? $data->where('parent_code', '=', $parameters['parent_code']) : $data;
            $data = (!empty($parameters['type']) && $parameters['type']) != ''
                ? $data->where('type', '=', $parameters['type']) : $data;
            $data = (!empty($parameters['action']) && $parameters['action']) != ''
                ? $data->where('action', '=', $parameters['action']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->module->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        $request->merge(['code' => $this->generateCode($request->input('parent_code'))]);
        return $this->module->create($request->all());
    }

    public function update($request, $id)
    {
        $module = $this->module->find($id);
        $module->update($request->all());
        return $module;
    }

    public function delete($id)
    {
        $module = $this->module->find($id);
        $module->delete();
        return $module;
    }

    public function generateCode($parentCode = '#')
    {
        $last = $this->module->where('parent_code', '=', $parentCode)
            ->orderBy('code', 'desc')
            ->first();
        $code = '01';
        if (!empty($last)) {
            $code = explode(".", $last->code);
            $code = $code[count($code)-1] + 1;
            $code = strlen($code) == 1 ? '0' . $code : $code;
        }

        return $parentCode == '#' ? $code : $parentCode . '.' . $code;
    }

    public function getBelow($code)
    {
        $code = explode(".", $code);
        $code = $code[count($code)-1];
        $code = $code + 1;
        $code = strlen($code) == 1 ? '0' . $code : $code;
        $module = $this->module->where('code', '=', $code)->first();
        return !empty($module) ? $module : $this->getBelow($code + 1);
    }

    public function getAbove($code)
    {
        $code = explode(".", $code);
        $code = $code[count($code)-1];
        $code = $code - 1;
        $code = strlen($code) == 1 ? '0' . $code : $code;
        $module = $this->module->where('code', '=', $code)->first();
        return !empty($module) ? $module : $this->getAbove($code - 1);
    }

    public function move($code, $direction)
    {
        $first = $this->module->orderBy('code', 'asc')->limit(1)->first();
        $last = $this->module->orderBy('code', 'desc')->limit(1)->first();
        if (($direction == 'up' && $code == $first->code) && ($direction == 'down' && $code == $last->code)) {
            return false;
        }
        $module = $this->module->where('code', '=', $code)->first();
        $temp = $direction == 'up' ? $this->getAbove($code) : $this->getBelow($code);
        $this->module->where('id', '=', $module->id)
            ->update(['code' => $temp->code]);
        $this->module->where('id', '=', $temp->id)
            ->update(['code' => $module->code]);
        return true;
    }
}
