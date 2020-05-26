<?php

namespace App\Repositories;

use App\Service;

class ServiceRepository {

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->service->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
            $data = (!empty($parameters['id']) && $parameters['id']) != '' ?
                $data->where('id', '=', $parameters['id']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->service->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->service->create($request->all());
    }

    public function update($request, $id)
    {
        $service = $this->service->find($id);
        $service->update($request->all());
        return $service;
    }

    public function delete($id)
    {
        $service = $this->service->find($id);
        $service->delete();
        return $service;
    }
}
