@php($slider = $slider ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># Slider Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'name',
            'caption' => 'Name',
            'value' => !empty($slider) ? $slider->name : old('name')
        ])
        <div class="row">
            <div class="col-md-6">
                @php($default = (!empty($slider) && !empty($slider->media)) ? asset('storage/' . $slider->media->location) : asset('img/default.png'))
                <div class="card">
                    <div class="card-body p-1">
                        <img src="{{ $default }}" alt="" id="{{ $prefix }}mediaPreview" class="img-fluid" style="width: 100%;">
                    </div>
                </div>
                <input type="hidden" name="media_id" id="{{ $prefix }}media_id" value="{{ !empty($slider) ? $slider->media_id : '' }}">
                <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}media_id', '#{{ $prefix }}mediaPreview')">Select Image</a>
            </div>
        </div>
    </div>
</div>
