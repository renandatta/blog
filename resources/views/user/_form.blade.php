@php($user = $user ?? [])

@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'text',
    'name' => 'name',
    'caption' => 'Name',
    'value' => !empty($user) ? $user->name : old('name')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'email',
    'name' => 'email',
    'caption' => 'Email',
    'value' => !empty($user) ? $user->email : old('email')
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'password',
    'name' => 'password',
    'caption' => !empty($user) ? 'Password (kosongi apabila tidak diubah)' : 'Password',
    'attributes' => !empty($user) ? '' : 'required',
])
@include('_tools.form', [
    'prefix' => $prefix,
    'type' => 'select',
    'name' => 'user_level_id',
    'caption' => 'User Level',
    'class' => 'select2',
    'options' => $userLevels,
    'optionKey' => 'id',
    'optionValue' => 'name'
])
