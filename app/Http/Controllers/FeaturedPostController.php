<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeaturedPostRequest;
use App\Repositories\FeaturedPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeaturedPostController extends Controller
{
    private $featuredPostRepository;
    private $breadcrumbs;
    public function __construct(FeaturedPostRepository $featuredPostRepository)
    {
        $this->middleware('auth');
        $this->featuredPostRepository = $featuredPostRepository;
        $this->breadcrumbs = [
            ['url' => 'featured_post', 'params' => null, 'caption' => 'Featured Post']
        ];
        view()->share('title', 'Featured Post');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'featured_post');
        return view('featured_post.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->featuredPostRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('featured_post._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'featured_post.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'featured_post.info', 'params' => $id, 'caption' => 'Edit']);

        $featuredPost = $this->featuredPostRepository->find($id);
        return view('featured_post.info', compact('id', 'breadcrumbs', 'featuredPost'));
    }

    public function save(FeaturedPostRequest $request, $id)
    {
        if ($id == 'new')
            $this->featuredPostRepository->store($request);
        else
            $this->featuredPostRepository->update($request, $id);
        return redirect()->route('featured_post')
            ->with('success', 'Featured Post Saved');
    }

    public function delete($id)
    {
        $this->featuredPostRepository->delete($id);
    }

    public function detail_save(Request $request)
    {
        $this->featuredPostRepository->save_detail($request->input('featured_post_id'), $request->input('post_id'));
    }

    public function detail_delete(Request $request)
    {
        $this->featuredPostRepository->delete_detail($request->input('featured_post_id'), $request->input('post_id'));
    }
}


