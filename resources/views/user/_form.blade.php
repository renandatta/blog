@php($user = $user ?? [])

<div class="row">
    <div class="col-md-6">
        <h4># User Information</h4>
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
            'optionValue' => 'name',
            'value' => !empty($user) ? $user->user_level_id : old('user_level_id')
        ])
    </div>
    <div class="col-md-6">
        <div class="row mt-4">
            <div class="col-md-6">
                <h4>&nbsp;</h4>
                @php($default = (!empty($user) && !empty($user->media)) ? asset('storage/' . $user->media->location) : asset('img/default.png'))
                <div class="card">
                    <div class="card-body p-1">
                        <img src="{{ $default }}" alt="" id="{{ $prefix }}mediaPreview" class="img-fluid" style="width: 100%;">
                    </div>
                </div>
                <input type="hidden" name="media_id" id="{{ $prefix }}media_id" value="{{ !empty($user) ? $user->media_id : '' }}">
                <a href="javascript:void(0)" class="btn btn-block btn-primary btn-sm mb-3" onclick="selectMedia('#{{ $prefix }}media_id', '#{{ $prefix }}mediaPreview')">Select Image</a>
            </div>
        </div>
    </div>
</div>
