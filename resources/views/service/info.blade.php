@php
    $title = $title ?? '';
    $title = $id == 'new' ? 'Add New' : 'Edit';
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
                <a href="{{ route('service') }}" class="btn btn-light">Cancel</a>
            </div>
            <div class="col-md-6 text-right">
                @if ($id != 'new')
                    <button type="button" onclick="deleteService('{{ $id }}')" class="btn btn-danger"><i class="la la-times text-white"></i> Delete</button>
                @endif
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                @php($prefix = 'formService')
                <form action="{{ route('service.save', $id) }}" method="post" id="{{ $prefix }}" enctype="multipart/form-data">
                    @csrf
                    @include('service._form', compact('service'))
                    <button type="submit" class="btn btn-primary" id="buttonSave">Save Service</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteService(id) {
            Swal.fire({
                text: "Delete data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.post('{{ url('service/delete') }}/' + id, {_token: '{{ csrf_token() }}', _method: 'delete'}, function () {
                        window.location.href = "{{ route('service') }}";
                    });
                }
            });
        }
    </script>
@endpush

@include('_tools.media')
