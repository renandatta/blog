<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Content</th>
        <th class="text-right" style="width: 5rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td class="text-nowrap">{{ $value->name }}</td>
            <td class="text-nowrap">{{ $value->title }}</td>
            <td class="text-nowrap">{{ $value->content }}</td>
            <td class="text-center p-2">
                <a href="{{ route('content.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchContent'])
