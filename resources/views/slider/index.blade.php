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
                <a href="javascript:void(0)" class="btn btn-light" onclick="toggleSliderSearch()">Search</a>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('slider.info', 'new') }}" class="btn btn-primary">New Slider</a>
            </div>
        </div>

        <div class="card mt-3" id="cardSliderSearch" style="display: none;">
            <div class="card-body">
                @php($prefix = 'formSliderSearch')
                <form action="{{ route('slider.search') }}" method="post" id="{{ $prefix }}">
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
                    <button type="submit" class="btn btn-primary" id="buttonSliderSearch">Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive mt-3" id="tableSlider">
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let formSliderSearch = $('#formSliderSearch');
        function toggleSliderSearch() {
            $('#cardSliderSearch').slideToggle();
        }
        function searchSlider(url = null) {
            url = url === null ? '{{ route('slider.search') }}' : url;
            let data = formSliderSearch.serialize();
            let captionButton = '';
            let buttonSearch = $('#buttonSliderSearch');
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
                    $('#tableSlider').html(result);
                },
                error: function (xhr) {
                    $('#tableSlider').html(xhr.responseText);
                },
                complete: function () {
                    buttonSearch.removeAttr('disabled');
                    buttonSearch.html(captionButton);
                }
            });
        }
        formSliderSearch.submit(function (e) {
            e.preventDefault();
            searchSlider();
        });
        searchSlider();
    </script>
@endpush
