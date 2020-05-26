<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Action</th>
        <th class="text-right" style="width: 15rem;">Type</th>
        <th class="text-right" style="width: 10rem;"></th>
        <th class="text-right" style="width: 10rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td style="padding-left: {{ count(explode(".", $value->code)) }}rem"><i class="{{ $value->icon }}"></i> {{ $value->name }}</td>
            <td>{{ $value->action }}</td>
            <td class="text-right">{{ $value->type }}</td>
            <td class="text-center p-2">
                <a href="{{ route('module.info', $value->id) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
                &nbsp;
                <a href="{{ route('module.info', ['new', 'parent_code=' . $value->code]) }}"><i class="typcn typcn-plus" style="font-size: 0.8125rem;"></i> Add Sub</a>
            </td>
            <td class="text-center p-2">
                @if($value->type == 'Menu')
                    @if($key != 0)
                        <a href="javascript:void(0)" onclick="moveCode('{{ $value->code }}', 'up')"><i class="typcn typcn-arrow-up" style="font-size: 0.8125rem;"></i> Up</a>
                    @endif
                    &nbsp;
                    @if($key != count($data)-1)
                    <a href="javascript:void(0)" onclick="moveCode('{{ $value->code }}', 'down')">Down <i class="typcn typcn-arrow-down" style="font-size: 0.8125rem;"></i></a>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchModule'])
