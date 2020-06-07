<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    private $sliderRepository;
    private $breadcrumbs;
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->middleware('auth');
        $this->sliderRepository = $sliderRepository;
        $this->breadcrumbs = [
            ['url' => 'slider', 'params' => null, 'caption' => 'Slider']
        ];
        view()->share('title', 'Slider');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'slider');
        return view('slider.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->sliderRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('slider._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'slider.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'slider.info', 'params' => $id, 'caption' => 'Edit']);

        $slider = $this->sliderRepository->find($id);
        return view('slider.info', compact('id', 'breadcrumbs', 'slider'));
    }

    public function save(SliderRequest $request, $id)
    {
        if ($id == 'new')
            $this->sliderRepository->store($request);
        else
            $this->sliderRepository->update($request, $id);
        return redirect()->route('slider')
            ->with('success', 'Slider Saved');
    }

    public function delete($id)
    {
        $this->sliderRepository->delete($id);
    }
}
