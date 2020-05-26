<?php

namespace App\Repositories;

use App\PostCategory;

class PostCategoryRepository {

    protected $postCategory;

    public function __construct(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->postCategory->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->postCategory->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->postCategory->create($request->all());
    }

    public function update($request, $id)
    {
        $postCategory = $this->postCategory->find($id);
        $postCategory->update($request->all());
        return $postCategory;
    }

    public function delete($id)
    {
        $postCategory = $this->postCategory->find($id);
        $postCategory->delete();
        return $postCategory;
    }
}
