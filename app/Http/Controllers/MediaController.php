<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\PostRequest;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{
    private $mediaRepository;
    private $breadcrumbs;

    public function __construct(MediaRepository $mediaRepository)
    {
        $this->middleware('auth');
        $this->mediaRepository = $mediaRepository;
        $this->breadcrumbs = [
            ['url' => 'media', 'params' => null, 'caption' => 'Media']
        ];
        view()->share('title', 'Media');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'media');
        $breadcrumbs = $this->breadcrumbs;
        return view('media.index', compact('request', 'breadcrumbs'));
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->mediaRepository->search([
            'name' => $request->input('name'),
        ], $pagination);

        if ($request->has('modal')) return view('media._item_modal', compact('data'))->render();

        return $request->has('ajax') ? $data : view('media._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'media.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'media.info', 'params' => $id, 'caption' => 'Edit']);

        $media = $this->mediaRepository->find($id);
        return view('media.info', compact('id', 'breadcrumbs', 'media'));
    }

    public function save(MediaRequest $request, $id)
    {
        if ($id == 'new') $result = $this->mediaRepository->store($request);
        else $result = $this->mediaRepository->update($request, $id);

        if ($request->has('ajax')) return $result;

        return redirect()->route('media')
            ->with('success', 'Media Saved');
    }

    public function delete($id)
    {
        $this->mediaRepository->delete($id);
    }
}
