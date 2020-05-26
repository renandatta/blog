<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repositories\MediaRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    private $postRepository;
    private $postCategoryRepository;

    private $breadcrumbs;

    public function __construct(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->breadcrumbs = [
            ['url' => 'post', 'params' => null, 'caption' => 'Post']
        ];
        view()->share('title', 'Post');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'post');
        $breadcrumbs = $this->breadcrumbs;
        $postCategories = $this->postCategoryRepository->search(null, false);

        return view('post.index', compact('request', 'breadcrumbs', 'postCategories'));
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->postRepository->search([
            'title' => $request->input('title'),
            'post_category_id' => $request->input('post_category_id'),
            'user_id' => $request->input('user_id'),
            'tags' => $request->input('tags'),
            'slug' => $request->input('slug'),
            'date_published' => $request->input('date_published'),
            'date_published_start' => $request->input('date_published_start'),
            'date_published_end' => $request->input('date_published_end'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('post._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $postCategories = $this->postCategoryRepository->search(null, false);

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'post.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'post.info', 'params' => $id, 'caption' => 'Edit']);

        $post = $this->postRepository->find($id);
        return view('post.info', compact('id', 'breadcrumbs', 'post', 'postCategories'));
    }

    public function save(PostRequest $request, $id)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        if ($id == 'new')
            $this->postRepository->store($request);
        else
            $this->postRepository->update($request, $id);
        return redirect()->route('post')
            ->with('success', 'Post Saved');
    }

    public function delete($id)
    {
        $this->postRepository->delete($id);
    }
}
