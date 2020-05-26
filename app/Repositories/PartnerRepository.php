<?php

namespace App\Repositories;

use App\Partner;

class PartnerRepository {

    protected $partner;

    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->partner->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
            $data = (!empty($parameters['id']) && $parameters['id']) != '' ?
                $data->where('id', '=', $parameters['id']) : $data;
            $data = (!empty($parameters['city']) && $parameters['city']) != '' ?
                $data->where('city', '=', $parameters['city']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->partner->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->partner->create($request->all());
    }

    public function update($request, $id)
    {
        $partner = $this->partner->find($id);
        $partner->update($request->all());
        return $partner;
    }

    public function delete($id)
    {
        $partner = $this->partner->find($id);
        $partner->delete();
        return $partner;
    }
}
