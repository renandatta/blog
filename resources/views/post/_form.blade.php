@php($post = $post ?? [])

<div class="row">
    <div class="col-md-9">
        <h4># Post Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'title',
            'caption' => 'Title',
            'value' => !empty($post) ? $post->title : old('title')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'textarea',
            'name' => 'content',
            'caption' => 'Keterangan',
            'class' => 'summernote',
            'value' => !empty($post) ? $post->content : old('content')
        ])
    </div>
    <div class="col-md-3">
        <h4>&nbsp;</h4>
        @php($default = (!empty($post) && !empty($post->media)) ? asset('storage/' . $post->media->location) : asset('img/default.png'))
        <div class="card">
            <div class="card-body p-1">
                <img src="{{ $default }}" alt="" id="{{ $prefix }}mediaPreview" class="img-fluid" style="width: 100%;">
            </div>
        </div>
        <input type="hidden" name="media_id" id="{{ $prefix }}media_id" value="{{ !empty($post) ? $post->media_id : '' }}">
        <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}media_id', '#{{ $prefix }}mediaPreview')">Select Image</a>

        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'date_published',
            'caption' => 'Date Published',
            'value' => !empty($post) ? $post->date_published : old('date_published', date('d-m-Y'))
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'select',
            'name' => 'post_category_id',
            'caption' => 'Category',
            'value' => !empty($post) ? $post->post_category_id : old('post_category_id'),
            'class' => 'select2',
            'options' => $postCategories,
            'optionKey' => 'id',
            'optionValue' => 'name'
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'tags',
            'caption' => 'Tags',
            'value' => !empty($post) ? $post->tags : old('tags')
        ])

        <h4># SEO Optimation</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'meta_tags',
            'caption' => 'Meta Tags',
            'value' => !empty($post) ? $post->meta_tags : old('meta_tags')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'textarea',
            'name' => 'meta_description',
            'caption' => 'Meta Description',
            'attributes' => ' maxlength="255" ',
            'value' => !empty($post) ? $post->meta_description : old('meta_description')
        ])
    </div>
</div>
