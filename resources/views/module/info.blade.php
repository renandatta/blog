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
                <a href="{{ route('module') }}" class="btn btn-light">Cancel</a>
            </div>
            <div class="col-md-6 text-right">
                @if ($id != 'new')
                    <button type="button" onclick="deleteModule('{{ $id }}')" class="btn btn-danger"><i class="la la-times text-white"></i> Delete</button>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                @php($prefix = 'formModule')
                <form action="{{ route('module.save', $id) }}" method="post" id="{{ $prefix }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h4># Module Information</h4>
                            @include('module._form', compact('moduleTypes', 'module'))
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="buttonSave">Save Module</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteModule(id) {
            Swal.fire({
                text: "Delete data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.post('{{ url('module/delete') }}/' + id, {_token: '{{ csrf_token() }}', _method: 'delete'}, function () {
                        window.location.href = "{{ route('module') }}";
                    });
                }
            });
        }
    </script>
@endpush
