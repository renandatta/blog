<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Detail</th>
        <th class="text-right" style="width: 10rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>
                @foreach($value->details as $detail)
                    <a href="javascript:void(0)" onclick="deletePost('{{ $detail->featured_post_id }}', '{{ $detail->post_id }}')"><i class="typcn typcn-trash" style="font-size: 0.8125rem;"></i></a>
                    {{ $detail->post->title }} <br>
                @endforeach
            </td>
            <td class="text-center p-2">
                <a href="{{ route('featured_post.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
                <a href="javascript:void(0)" onclick="addPost('{{ $value->id }}')"><i class="typcn typcn-plus" style="font-size: 0.8125rem;"></i> Add Post</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchFeaturedPost'])
