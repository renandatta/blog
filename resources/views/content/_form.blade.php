@php($content = $content ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># Content Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'name',
            'caption' => 'Name',
            'value' => !empty($content) ? $content->name : old('name')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'title',
            'caption' => 'Title',
            'value' => !empty($content) ? $content->title : old('title')
        ])
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'textarea',
            'name' => 'content',
            'caption' => 'Content',
            'value' => !empty($content) ? $content->content : old('content')
        ])
    </div>
</div>
