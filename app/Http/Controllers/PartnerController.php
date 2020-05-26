<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    private $partnerRepository;

    private $breadcrumbs;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->middleware('auth');
        $this->partnerRepository = $partnerRepository;
        $this->breadcrumbs = [
            ['url' => 'partner', 'params' => null, 'caption' => 'Partner']
        ];
        view()->share('title', 'Partner');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'partner');
        return view('partner.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->partnerRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('partner._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'partner.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'partner.info', 'params' => $id, 'caption' => 'Edit']);

        $partner = $this->partnerRepository->find($id);
        return view('partner.info', compact('id', 'breadcrumbs', 'partner'));
    }

    public function save(PartnerRequest $request, $id)
    {
        if ($id == 'new')
            $this->partnerRepository->store($request);
        else
            $this->partnerRepository->update($request, $id);
        return redirect()->route('partner')
            ->with('success', 'Partner Saved');
    }

    public function delete($id)
    {
        $this->partnerRepository->delete($id);
    }
}
