<?php

namespace App\Repositories;

use App\Client;

class ClientRepository {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->client->orderBy('name', 'asc');
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
        return $this->client->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->client->create($request->all());
    }

    public function update($request, $id)
    {
        $client = $this->client->find($id);
        $client->update($request->all());
        return $client;
    }

    public function delete($id)
    {
        $client = $this->client->find($id);
        $client->delete();
        return $client;
    }
}
