<div class="row">
    @foreach($data as $key => $value)
        @if ($key <= 3)
            <div class="col-md-3">
                <div class="card mt-2" style="height: calc(100% - 8px);" onclick="selectTargetMedia('{{ $value->id }}', '{{ asset('storage/' . $value->location) }}')">
                    <div class="card-body p-1 text-center">
                        <img src="{{ asset('storage/' . $value->location) }}" alt="" class="img-fluid">
                        <h6 class="mb-0">{{ $value->name }}</h6>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
