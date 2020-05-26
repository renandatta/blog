<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="100px">Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Address</th>
        <th>City</th>
        <th>Review</th>
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
            <td class="text-nowrap">{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->city }}</td>
            <td class="p-2">
                <a href="{{ route('client.review', [$value->id]) }}">
                    @if(count($value->reviews) > 0)
                        {{ $value->reviews[0]->review }}
                    @else
                        <i class="typcn typcn-message" style="font-size: 0.8125rem;"></i> Write Review
                    @endif
                </a>
            </td>
            <td class="text-center p-2">
                <a href="{{ route('client.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchClient'])
