<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Repositories\ContentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    private $contentRepository;
    private $breadcrumbs;
    public function __construct(ContentRepository $contentRepository)
    {
        $this->middleware('auth');
        $this->contentRepository = $contentRepository;
        $this->breadcrumbs = [
            ['url' => 'content', 'params' => null, 'caption' => 'Content']
        ];
        view()->share('title', 'Content');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'content');
        return view('content.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->contentRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('content._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'content.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'content.info', 'params' => $id, 'caption' => 'Edit']);

        $content = $this->contentRepository->find($id);
        return view('content.info', compact('id', 'breadcrumbs', 'content'));
    }

    public function save(ContentRequest $request, $id)
    {
        if ($id == 'new')
            $this->contentRepository->store($request);
        else
            $this->contentRepository->update($request, $id);
        return redirect()->route('content')
            ->with('success', 'Content Saved');
    }

    public function delete($id)
    {
        $this->contentRepository->delete($id);
    }
}
