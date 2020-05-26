@php
    $title = $title ?? '';
    $title = 'Credential ' . $title;
    $moduleId = [];
    foreach ($userLevel->modules as $module) {
        array_push($moduleId, $module->module_id);
    }
@endphp

@extends('layouts.main')

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
                <a href="{{ route('user_level') }}" class="btn btn-light">Cancel</a>
            </div>
            <div class="col-md-6 text-right">

            </div>
        </div>
        @php($prefix = 'formUserLevel')
        <form action="{{ route('user_level.credential.save', $id) }}" method="post" id="{{ $prefix }}">
            @csrf
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-right" style="width: 15rem;">Type</th>
                        <th class="text-right" style="width: 10rem;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($modules as $key => $value)
                        <tr>
                            <td style="padding-left: {{ count(explode(".", $value->code)) }}rem"><i class="{{ $value->icon }}"></i> {{ $value->name }}</td>
                            <td class="text-right">{{ $value->type }}</td>
                            <td class="pl-5">
                                <label class="ckbox">
                                    <input type="checkbox" name="{{ $value->id }}" {{ in_array($value->id, $moduleId) ? 'checked' : '' }}><span>Allowed</span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary" id="buttonSave">Save Credential</button>
        </form>
    </div>
@endsection
