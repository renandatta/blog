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
                <a href="javascript:void(0)" class="btn btn-light" onclick="toggleMediaSearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalMedia" class="btn btn-primary">New Media</a>
            </div>
        </div>

        <div class="card mt-3" id="cardMediaSearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formMediaSearch')
                <form action="{{ route('media.search') }}" method="post" id="{{ $prefix }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'text',
                                'name' => 'name',
                                'caption' => 'Name',
                            ])
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonMediaSearch">Search</button>
                </form>
            </div>
        </div>
        <div class="mt-3" id="tableMedia">
        </div>
    </div>
@endsection

@push('modals')
    <div id="modalMedia" class="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Upload Media</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('media.save', 'new') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" id="file" class="dropify" data-height="300">
                        <button type="submit" class="btn btn-block btn-primary btn-sm mb-3">Upload Image</button>
                    </form>
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
        let formMediaSearch = $('#formMediaSearch');
        function toggleMediaSearch() {
            $('#cardMediaSearch').slideToggle();
        }
        function searchMedia(url = null) {
            url = url === null ? '{{ route('media.search') }}' : url;
            let data = formMediaSearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonMediaSearch');
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
                    $('#tableMedia').html(result);
                },
                error: function (xhr) {
                    $('#tableMedia').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formMediaSearch.submit(function (e) {
            e.preventDefault();
            searchMedia();
        });
        searchMedia();
    </script>
@endpush
