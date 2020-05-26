<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>User Level</th>
        <th class="text-right" style="width: 5rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->user_level->name }}</td>
            <td class="text-center p-2">
                <a href="{{ route('user.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchUser'])
