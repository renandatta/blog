<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepository;
use App\Repositories\ClientReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    private $clientRepository;
    private $clientReviewRepository;

    private $breadcrumbs;

    public function __construct(ClientRepository $clientRepository, ClientReviewRepository $clientReviewRepository)
    {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
        $this->clientReviewRepository = $clientReviewRepository;
        $this->breadcrumbs = [
            ['url' => 'client', 'params' => null, 'caption' => 'Client']
        ];
        view()->share('title', 'Client');
    }

    public function index(Request $request)
    {
        Session::put('menu_active', 'client');
        return view('client.index')
            ->with('request', $request)
            ->with('breadcrumbs', $this->breadcrumbs);
    }

    public function search(Request $request)
    {
        $pagination = $request->has('pagination') ? false : true;
        $data = $this->clientRepository->search([
            'name' => $request->input('name'),
        ], $pagination);
        return $request->has('ajax') ? $data : view('client._table', compact('data'))->render();
    }

    public function info($id)
    {
        $breadcrumbs = $this->breadcrumbs;

        if ($id == 'new')
            array_push($breadcrumbs, ['url' => 'client.info', 'params' => 'new', 'caption' => 'Add New']);
        else
            array_push($breadcrumbs, ['url' => 'client.info', 'params' => $id, 'caption' => 'Edit']);

        $client = $this->clientRepository->find($id);
        return view('client.info', compact('id', 'breadcrumbs', 'client'));
    }

    public function save(ClientRequest $request, $id)
    {
        if ($id == 'new')
            $this->clientRepository->store($request);
        else
            $this->clientRepository->update($request, $id);
        return redirect()->route('client')
            ->with('success', 'Client Saved');
    }

    public function delete($id)
    {
        $this->clientRepository->delete($id);
    }

    public function review($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        array_push($breadcrumbs, ['url' => 'client.review', 'params' => $id, 'caption' => 'Review']);

        $reviews = $this->clientReviewRepository->search(['client_id' => $id], false);
        $review = count($reviews) > 0 ? $reviews[0] : [];

        $client = $this->clientRepository->find($id);
        return view('client.review', compact('id', 'breadcrumbs', 'client', 'review'));
    }

    public function review_save(Request $request, $id)
    {
        $client = $this->clientRepository->find($id);
        if (!empty($client)) {
            $request->merge(['client_id' => $id]);
            $this->clientReviewRepository->store($request);

            return redirect()->route('client')
                ->with('success', 'Client Review Saved !');
        }

        return redirect()->route('client')
            ->with('error', 'Client Not Found !');
    }

    public function review_delete(Request $request, $id)
    {
        $client = $this->clientRepository->find($id);
        if (!empty($client)) {
            $reviews = $this->clientReviewRepository->search(['client_id' => $id], false);
            if (count($reviews) > 0) {
                $review = $reviews[0];
                $this->clientReviewRepository->delete($review->id);
            }

            return redirect()->route('client')
                ->with('success', 'Client Review Deleted !');
        }

        return redirect()->route('client')
            ->with('error', 'Client Not Found !');
    }
}
