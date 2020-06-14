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
        <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
    </div>
    <div class="az-content-body border-top">
        <div class="card mt-3" id="cardSettingSearch">
            <div class="card-body">
                @php($prefix = 'formSetting')
                <form action="{{ route('setting.save', !empty($setting) ? $setting->id : 'new') }}" method="post" id="{{ $prefix }}" enctype="multipart/form-data">
                    @csrf
                    @include('setting._form', compact('setting'))
                    <button type="submit" class="btn btn-primary" id="buttonSave">Save Setting</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('_tools.media')


@push('scripts')
    <script>

    </script>
@endpush
