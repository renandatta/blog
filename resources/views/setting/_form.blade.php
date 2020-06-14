@php($setting = $setting ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># Setting Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'title',
            'caption' => 'Title Website',
            'value' => !empty($setting) ? $setting->title : old('title')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'meta_tags',
            'caption' => 'Meta Tags',
            'value' => !empty($setting) ? $setting->meta_tags : old('meta_tags')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'textarea',
            'name' => 'meta_description',
            'caption' => 'Meta Description',
            'value' => !empty($setting) ? $setting->meta_description : old('meta_description')
        ])
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @php($default = (!empty($setting) && !empty($setting->favicon_image)) ? asset('storage/' . $setting->favicon_image->location) : asset('img/default.png'))
        <label>Favicon</label>
        <div class="card">
            <div class="card-body p-1">
                <img src="{{ $default }}" alt="" id="{{ $prefix }}faviconPreview" class="img-fluid" style="width: 100%;">
            </div>
        </div>
        <input type="hidden" name="favicon" id="{{ $prefix }}favicon" value="{{ !empty($setting) ? $setting->favicon : '' }}">
        <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}favicon', '#{{ $prefix }}faviconPreview')">Select Image</a>
    </div>
    <div class="col-md-4">
        @php($default = (!empty($setting) && !empty($setting->logo_image)) ? asset('storage/' . $setting->logo_image->location) : asset('img/default.png'))
        <label>Favicon</label>
        <div class="card">
            <div class="card-body p-1">
                <img src="{{ $default }}" alt="" id="{{ $prefix }}logoPreview" class="img-fluid" style="width: 100%;">
            </div>
        </div>
        <input type="hidden" name="logo" id="{{ $prefix }}logo" value="{{ !empty($setting) ? $setting->logo : '' }}">
        <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}logo', '#{{ $prefix }}logoPreview')">Select Image</a>
    </div>
    <div class="col-md-4">
        @php($default = (!empty($setting) && !empty($setting->logo_2_image)) ? asset('storage/' . $setting->logo_2_image->location) : asset('img/default.png'))
        <label>Favicon</label>
        <div class="card">
            <div class="card-body p-1">
                <img src="{{ $default }}" alt="" id="{{ $prefix }}logo2Preview" class="img-fluid" style="width: 100%;">
            </div>
        </div>
        <input type="hidden" name="logo_2" id="{{ $prefix }}logo_2" value="{{ !empty($setting) ? $setting->logo_2 : '' }}">
        <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}logo_2', '#{{ $prefix }}logo2Preview')">Select Image</a>
    </div>
    <div class="col-md-8">
        @php($default = (!empty($setting) && !empty($setting->banner_image)) ? asset('storage/' . $setting->banner_image->location) : asset('img/default.png'))
        <label>Banner</label>
        <div class="card">
            <div class="card-body p-1">
                <img src="{{ $default }}" alt="" id="{{ $prefix }}bannerPreview" class="img-fluid" style="width: 100%;">
            </div>
        </div>
        <input type="hidden" name="banner" id="{{ $prefix }}banner" value="{{ !empty($setting) ? $setting->banner : '' }}">
        <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}banner', '#{{ $prefix }}bannerPreview')">Select Image</a>
    </div>
</div>
