@php($postCategory = $postCategory ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># Post Category Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'name',
            'caption' => 'Name',
            'value' => !empty($postCategory) ? $postCategory->name : old('name')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'textarea',
            'name' => 'description',
            'caption' => 'Keterangan',
            'value' => !empty($postCategory) ? $postCategory->description : old('description')
        ])
    </div>
    <div class="col-md-6">
        <div class="row mt-4">
            <div class="col-md-3">
                <h4>&nbsp;</h4>
                @php($default = (!empty($postCategory) && !empty($postCategory->media)) ? asset('storage/' . $postCategory->media->location) : asset('img/default.png'))
                <div class="card">
                    <div class="card-body p-1">
                        <img src="{{ $default }}" alt="" id="{{ $prefix }}mediaPreview" class="img-fluid" style="width: 100%;">
                    </div>
                </div>
                <input type="hidden" name="media_id" id="{{ $prefix }}media_id">
                <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}media_id', '#{{ $prefix }}mediaPreview')">Select Image</a>
            </div>
        </div>
    </div>
</div>
