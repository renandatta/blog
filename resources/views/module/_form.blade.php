@php($module = $module ?? [])

<input type="hidden" name="parent_code" value="{{ empty($module) ? $request->get('parent_code') : $module->parent_code }}">
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'text',
    'name' => 'name',
    'caption' => 'Name',
    'value' => !empty($module) ? $module->name : old('name')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'select',
    'name' => 'type',
    'caption' => 'Type',
    'options' => $moduleTypes,
    'optionKey' => 'id',
    'optionValue' => 'id',
    'class' => 'select2',
    'value' => !empty($module) ? $module->type : old('type')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'text',
    'name' => 'action',
    'caption' => 'Action',
    'value' => !empty($module) ? $module->action : old('action')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'text',
    'name' => 'icon',
    'caption' => 'Icon',
    'value' => !empty($module) ? $module->icon : old('icon')
])
