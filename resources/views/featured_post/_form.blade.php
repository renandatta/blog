@php($featuredPost = $featuredPost ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># Featured Post Information</h4>
        @include('_tools.form', [
            'prefix' => $prefix,
            'type' => 'text',
            'name' => 'name',
            'caption' => 'Name',
            'value' => !empty($featuredPost) ? $featuredPost->name : old('name')
        ])
    </div>
</div>
