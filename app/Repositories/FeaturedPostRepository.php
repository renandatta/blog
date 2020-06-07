<?php

namespace App\Repositories;

use App\FeaturedPost;
use App\FeaturedPostDetail;

class FeaturedPostRepository {

    protected $featuredPost;
    protected $featuredPostDetail;

    public function __construct(FeaturedPost $featuredPost, FeaturedPostDetail $featuredPostDetail)
    {
        $this->featuredPost = $featuredPost;
        $this->featuredPostDetail = $featuredPostDetail;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->featuredPost->orderBy('name', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->featuredPost->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->featuredPost->create($request->all());
    }

    public function update($request, $id)
    {
        $featuredPost = $this->featuredPost->find($id);
        $featuredPost->update($request->all());
        return $featuredPost;
    }

    public function delete($id)
    {
        $featuredPost = $this->featuredPost->find($id);
        $featuredPost->delete();
        return $featuredPost;
    }

    public function save_detail($featured_post_id, $post_id)
    {
        $this->featuredPostDetail->firstOrCreate([
            'featured_post_id' => $featured_post_id,
            'post_id' => $post_id
        ]);
    }

    public function delete_detail($featured_post_id, $post_id){
        $this->featuredPostDetail->where('featured_post_id', '=', $featured_post_id)
            ->where('post_id', '=', $post_id)
            ->delete();
    }
}
