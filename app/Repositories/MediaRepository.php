<?php

namespace App\Repositories;

use App\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaRepository {

    protected $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function search($parameters = null, $paginate = true)
    {
        $data = $this->media->orderBy('id', 'desc');
        if ($parameters != null) {
            $data = (!empty($parameters['name']) && $parameters['name']) != '' ?
                $data->where('name', 'like', '%' . $parameters['name'] . '%') : $data;
        }
        return $paginate == true ? $data->paginate(10) : $data->get();
    }

    public function find($id)
    {
        return $this->media->where('id', '=', $id)->first();
    }

    public function store($request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $request->file('file')->getClientOriginalName();
            $extension = $request->file('file')->extension();

            $filename = Str::random(6).'_' . $name . '.'. $extension;
            $path = Storage::putFileAs('media', $file, $filename);

            return $this->media->create([
                'name' => $name,
                'location' => $path,
                'extension' => $extension
            ]);
        }
        return null;
    }

    public function update($request, $id)
    {
        $media = $this->media->find($id);
        $media->update($request->all());
        return $media;
    }

    public function delete($id)
    {
        $media = $this->media->find($id);
        $media->delete();
        return $media;
    }
}
