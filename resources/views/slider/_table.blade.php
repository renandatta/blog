<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="100px">Image</th>
        <th>Name</th>
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
            <td class="text-center p-2">
                <a href="{{ route('slider.info', [$value->id]) }}"><i class="typcn typcn-pencil" style="font-size: 0.8125rem;"></i> Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchSlider'])
