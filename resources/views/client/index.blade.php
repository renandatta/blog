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
                <a href="javascript:void(0)" class="btn btn-light" onclick="toggleClientSearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('client.info', 'new') }}" class="btn btn-primary">New Client</a>
            </div>
        </div>

        <div class="card mt-3" id="cardClientSearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formClientSearch')
                <form action="{{ route('client.search') }}" method="post" id="{{ $prefix }}">
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
                    <button type="submit" class="btn btn-primary" id="buttonClientSearch">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive mt-3" id="tableClient">
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let formClientSearch = $('#formClientSearch');
        function toggleClientSearch() {
            $('#cardClientSearch').slideToggle();
        }
        function searchClient(url = null) {
            url = url === null ? '{{ route('client.search') }}' : url;
            let data = formClientSearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonClientSearch');
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
                    $('#tableClient').html(result);
                },
                error: function (xhr) {
                    $('#tableClient').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formClientSearch.submit(function (e) {
            e.preventDefault();
            searchClient();
        });
        searchClient();
    </script>
@endpush
