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
                <a href="javascript:void(0)" class="btn btn-light" onclick="togglePostCategorySearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('post_category.info', 'new') }}" class="btn btn-primary">New Post Category</a>
            </div>
        </div>

        <div class="card mt-3" id="cardPostCategorySearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formPostCategorySearch')
                <form action="{{ route('post_category.search') }}" method="post" id="{{ $prefix }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'text',
                                'name' => 'name',
                                'caption' => 'Name',
                                'placeholder' => 'Cari ...',
                            ])
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonPostCategorySearch">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive mt-3" id="tablePostCategory">
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let formPostCategorySearch = $('#formPostCategorySearch');
        function togglePostCategorySearch() {
            $('#cardPostCategorySearch').slideToggle();
        }
        function searchPostCategory(url = null) {
            url = url === null ? '{{ route('post_category.search') }}' : url;
            let data = formPostCategorySearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonPostCategorySearch');
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
                    $('#tablePostCategory').html(result);
                },
                error: function (xhr) {
                    $('#tablePostCategory').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formPostCategorySearch.submit(function (e) {
            e.preventDefault();
            searchPostCategory();
        });
        searchPostCategory();
    </script>
@endpush
