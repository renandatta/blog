<?php

namespace App\Repositories;

use App\Content;

class ContentRepository {

    protected $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->content->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
            $data = (!empty($parameters['title']) && $parameters['title']) != '' ?
                $data->where('title', 'like', '%' . $parameters['title'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->content->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->content->create($request->all());
    }

    public function update($request, $id)
    {
        $content = $this->content->find($id);
        $content->update($request->all());
        return $content;
    }

    public function delete($id)
    {
        $content = $this->content->find($id);
        $content->delete();
        return $content;
    }
}
