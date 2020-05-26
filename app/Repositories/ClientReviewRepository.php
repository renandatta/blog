<?php

namespace App\Repositories;

use App\ClientReview;

class ClientReviewRepository {

    protected $clientReview;

    public function __construct(ClientReview $clientReview)
    {
        $this->clientReview = $clientReview;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->clientReview->orderBy('id', 'asc');
        if ($parameters != null) {
            $data = (!empty($parameters['review']) && $parameters['review']) != '' ?
                $data->where('review', 'like', '%' . $parameters['review'] . '%') : $data;
            $data = (!empty($parameters['client_id']) && $parameters['client_id']) != '' ?
                $data->where('client_id', '=', $parameters['client_id']) : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->clientReview->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        return $this->clientReview->create($request->all());
    }

    public function update($request, $id)
    {
        $clientReview = $this->clientReview->find($id);
        $clientReview->update($request->all());
        return $clientReview;
    }

    public function delete($id)
    {
        $clientReview = $this->clientReview->find($id);
        $clientReview->delete();
        return $clientReview;
    }
}
