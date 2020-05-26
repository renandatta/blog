@php
    $title = 'Client Review';
@endphp

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
            <div class="col-md-6">
                <a href="{{ route('client') }}" class="btn btn-light">Cancel</a>
            </div>
            <div class="col-md-6 text-right">
                @if($review != [])
                    <button type="button" onclick="deleteClient('{{ $id }}')" class="btn btn-danger"><i class="la la-times text-white"></i> Delete Review</button>
                @endif
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                @php($prefix = 'formClientReview')
                <form action="{{ route('client.review.save', $id) }}" method="post" id="{{ $prefix }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h4># Review Information</h4>
                            @include('_tools.form', [
                                'prefix' => $prefix,
                                'type' => 'textarea',
                                'name' => 'review',
                                'caption' => 'Review',
                                'value' => $review != [] ? $review->review : old('review'),
                                'rowSize' => '6'
                            ])
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4"># Client Information</h4>
                            <h4 class="mb-0">{{ $client->name }}</h4>
                            <p class="mb-0">{{ $client->description }}</p>
                            <p class="mb-0">{{ $client->address != '' ? $client->address . ', ' : '' }}<br>{{ $client->city }}</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonSave">Save Review</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteClient(id) {
            Swal.fire({
                text: "Delete data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.post('{{ url('client/review/' . $id . '/delete') }}' , {_token: '{{ csrf_token() }}', _method: 'delete'}, function () {
                        window.location.href = "{{ route('client') }}";
                    });
                }
            });
        }
    </script>
@endpush

@include('_tools.media')
