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
                <a href="javascript:void(0)" class="btn btn-light" onclick="toggleFeaturedPostSearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('featured_post.info', 'new') }}" class="btn btn-primary">New Featured Post</a>
            </div>
        </div>

        <div class="card mt-3" id="cardFeaturedPostSearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formFeaturedPostSearch')
                <form action="{{ route('featured_post.search') }}" method="post" id="{{ $prefix }}">
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
                    <button type="submit" class="btn btn-primary" id="buttonFeaturedPostSearch">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive mt-3" id="tableFeaturedPost">
        </div>
    </div>

    @php($prefixPost = 'formPostSearch')
    <form action="{{ route('post.search') }}" method="post" id="{{ $prefixPost }}">
        @csrf
        <input type="hidden" name="action" value="selectPost">
        <input type="hidden" name="action_caption" value="Select">
    </form>
@endsection

@push('modals')
    <div id="postModal" class="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Select Media</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive mt-3" id="tablePost">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-light">Close</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        let formFeaturedPostSearch = $('#formFeaturedPostSearch');
        let currentUrl;
        function toggleFeaturedPostSearch() {
            $('#cardFeaturedPostSearch').slideToggle();
        }
        function searchFeaturedPost(url = null) {
            url = url === null ? '{{ route('featured_post.search') }}' : url;
            currentUrl = url;
            let data = formFeaturedPostSearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonFeaturedPostSearch');
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
                    $('#tableFeaturedPost').html(result);
                },
                error: function (xhr) {
                    $('#tableFeaturedPost').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formFeaturedPostSearch.submit(function (e) {
            e.preventDefault();
            searchFeaturedPost();
        });
        searchFeaturedPost();

        let currentFeaturedPostId = '';
        function addPost(id) {
            currentFeaturedPostId = id;
            $('#postModal').modal('show');
            searchPost();
        }

        let formPostSearch = $('#{{ $prefixPost }}');
        function searchPost(url = null) {
            url = url === null ? '{{ route('post.search') }}' : url;
            let data = formPostSearch.serialize();
            let tablePost = $('#tablePost');
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                beforeSend: function () {
                    tablePost.html('<tr><td colspan="99">Loading ...</td></tr>');
                },
                success: function (result) {
                    tablePost.html(result);
                },
                error: function (xhr) {
                    tablePost.html(xhr.responseText);
                },
            });
        }
        function selectPost(id) {
            $.post("{{ route('featured_post.detail.save') }}", {
                _token: '{{ csrf_token() }}',
                featured_post_id: currentFeaturedPostId,
                post_id: id
            }, function () {
                $('#postModal').modal('toggle');
                searchFeaturedPost();
            });
        }
        function deletePost(featured_post_id, id) {
            $.post("{{ route('featured_post.detail.delete') }}", {
                _token: '{{ csrf_token() }}',
                _method: 'delete',
                featured_post_id: featured_post_id,
                post_id: id
            }, function () {
                searchFeaturedPost();
            });
        }
    </script>
@endpush
