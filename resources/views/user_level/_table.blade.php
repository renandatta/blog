<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th class="text-right" style="width: 7rem;"></th>
        <th class="text-right" style="width: 5rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td class="text-center p-2">
                <a href="{{ route('user_level.credential', $value->id) }}"><i class="typcn typcn-lock-closed" style="font-size: 0.8125rem;"></i> Credential</a>
            </td>
            <td class="text-center p-2">
                <a href="{{ route('user_level.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchUserLevel'])
