@extends('layouts.main')

@section('title')
    {{ $title }} -
@endsection

@section('content')
    <div class="az-content-header d-block d-md-flex">
        <div>
            <h2 class="az-content-title mg-b-5 mg-b-lg-8">{{ $title }}</h2>
            <div class="az-content-breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    <span><a href="{{ $breadcrumb['url'] != null ? route($breadcrumb['url'], $breadcrumb['params']) : 'javascript:void(0)' }}">{{ $breadcrumb['caption'] }}</a></span>
                @endforeach
            </div>
        </div>

    </div>
    <div class="az-content-body border-top">
        <div class="row mt-3">
            <div class="col-6">
                <a href="javascript:void(0)" class="btn btn-light" onclick="togglePostSearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('post.info', 'new') }}" class="btn btn-primary">New Post</a>
            </div>
        </div>

        <div class="card mt-3" id="cardPostSearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formPostSearch')
                <form action="{{ route('post.search') }}" method="post" id="{{ $prefix }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'text',
                                'name' => 'title',
                                'caption' => 'Title',
                            ])
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'text',
                                'name' => 'tags',
                                'caption' => 'Tag',
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'text',
                                'name' => 'date_published',
                                'caption' => 'Date Published',
                                'class' => 'datepicker'
                            ])
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'select',
                                'name' => 'post_category_id',
                                'caption' => 'Category',
                                'class' => 'select2',
                                'options' => $postCategories,
                                'optionKey' => 'id',
                                'optionValue' => 'name',
                                'defaultOption' => '-'
                            ])
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonPostSearch">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive mt-3" id="tablePost">
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let formPostSearch = $('#formPostSearch');
        function togglePostSearch() {
            $('#cardPostSearch').slideToggle();
        }
        function searchPost(url = null) {
            url = url === null ? '{{ route('post.search') }}' : url;
            let data = formPostSearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonPostSearch');
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                beforeSend: function () {
                    captionButton = buttonSearch.html();
                    buttonSearch.html('<i>Loading ...</i>');
                    buttonSearch.attr('disabled', 'disabled');
                },
                success: function (result) {
                    $('#tablePost').html(result);
                },
                error: function (xhr) {
                    $('#tablePost').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formPostSearch.submit(function (e) {
            e.preventDefault();
            searchPost();
        });
        searchPost();
    </script>
@endpush
