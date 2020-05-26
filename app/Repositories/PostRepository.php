<?php

namespace App\Repositories;

use App\Post;

class PostRepository {

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->post->orderBy('date_published', 'desc');
        if ($parameters != null) {
            $data = (!empty($parameters['title']) && $parameters['title']) != '' ?
                $data->where('title', 'like', '%' . $parameters['title'] . '%') : $data;
            $data = (!empty($parameters['tags']) && $parameters['tags']) != '' ?
                $data->where('tags', 'like', '%' . $parameters['tags'] . '%') : $data;
            $data = (!empty($parameters['post_category_id']) && $parameters['post_category_id']) != '' ?
                $data->where('post_category_id', '=', $parameters['post_category_id']) : $data;
            $data = (!empty($parameters['user_id']) && $parameters['user_id']) != '' ?
                $data->where('user_id', '=', $parameters['user_id']) : $data;
            $data = (!empty($parameters['date_published']) && $parameters['date_published']) != '' ?
                $data->where('date_published', '=', unformat_date($parameters['date_published'])) : $data;
            $data = (!empty($parameters['date_published_start']) && $parameters['date_published_start']) != '' ?
                $data->where('date_published', '>=', unformat_date($parameters['date_published_start'])) : $data;
            $data = (!empty($parameters['date_published_end']) && $parameters['date_published_end']) != '' ?
                $data->where('date_published', '<=', unformat_date($parameters['date_published_end'])) : $data;
            $data = (!empty($parameters['slug']) && $parameters['slug']) != '' ?
                $data->where('slug', '=', $parameters['slug']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->post->where('id', '=', $id)->first();
    }

    public function filterRequest($request)
    {
        if ($request->has('date_published'))
            $request->merge(['date_published' => unformat_date($request->input('date_published'))]);
        return $request;
    }

    public function store($request)
    {
        $request = $this->filterRequest($request);
        return $this->post->create($request->all());
    }

    public function update($request, $id)
    {
        $request = $this->filterRequest($request);
        $post = $this->post->find($id);
        $post->update($request->all());
        return $post;
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        $post->delete();
        return $post;
    }
}
