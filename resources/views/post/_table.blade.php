<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="100px">Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Date Published</th>
        <th>User</th>
        <th class="text-right" style="width: 5rem;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $value)
        <tr>
            <td class="p-0 text-center">
                @if (!empty($value->media))
                    <img src="{{ asset('storage/' . $value->media->location) }}" alt="" class="img-fluid" style="height: 40px">
                @endif
            </td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->post_category->name }}</td>
            <td>{{ $value->tags }}</td>
            <td class="text-nowrap">{{ format_date($value->date_published) }}</td>
            <td>{{ $value->user->name }}</td>
            <td class="text-center p-2">
                @if($action == null)
                    <a href="{{ route('post.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
                @else
                    <a href="javascript:void(0)" onclick="{{ $action }}({{ $value->id }})">{{ $action_caption }}</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchPost'])
