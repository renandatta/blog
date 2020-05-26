@php($userLevel = $userLevel ?? [])

@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'text',
    'name' => 'name',
    'caption' => 'Name',
    'value' => !empty($userLevel) ? $userLevel->name : old('name')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'textarea',
    'name' => 'description',
    'caption' => 'Keterangan',
    'value' => !empty($userLevel) ? $userLevel->description : old('description')
])
