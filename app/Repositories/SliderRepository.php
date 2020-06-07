<?php

namespace App\Repositories;

use App\Slider;

class SliderRepository {

    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->slider->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->slider->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->slider->create($request->all());
    }

    public function update($request, $id)
    {
        $slider = $this->slider->find($id);
        $slider->update($request->all());
        return $slider;
    }

    public function delete($id)
    {
        $slider = $this->slider->find($id);
        $slider->delete();
        return $slider;
    }
}
