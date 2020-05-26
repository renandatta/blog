<div class="row">
    @foreach ($data as $key => $value)
        <div class="col-md-2 mb-3">
            <div class="card" style="height: 100%;">
                <div class="card-header">
                    <h6 class="mb-0 mt-0">{{ $value->name }}</h6>
                </div>
                <div class="card-body text-center p-1">
                    <img src="{{ asset('storage/' . $value->location) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    @endforeach
</div>
@include('_tools.pagination', ['data' => $data, 'functionName' => 'searchMedia'])
