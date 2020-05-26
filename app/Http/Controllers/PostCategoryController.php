<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategoryRequest;
use App\Repositories\MediaRepository;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
    private $postCategoryRepository;

    private $breadcrumbs;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->middleware('auth');
        $this->postCategoryRepository = $postCategoryRepository;
        $this->breadcrumbs = [
            ['url' => 'post_category', 'params' => null, 'caption' => 'Post Category']
        ];
        view()->share('title', 'Post Category');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'post_category');
        return view('post_category.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->postCategoryRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('post_category._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'post_category.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'post_category.info', 'params' => $id, 'caption' => 'Edit']);

        $postCategory = $this->postCategoryRepository->find($id);
        return view('post_category.info', compact('id', 'breadcrumbs', 'postCategory'));
    }

    public function save(PostCategoryRequest $request, $id)
    {
        if ($id == 'new')
            $this->postCategoryRepository->store($request);
        else
            $this->postCategoryRepository->update($request, $id);
        return redirect()->route('post_category')
            ->with('success', 'Post Category Saved');
    }

    public function delete($id)
    {
        $this->postCategoryRepository->delete($id);
    }
}
