@push('modals')
    <div id="modalMedia" class="modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Select Media</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('media.save', 'new') }}" method="post" enctype="multipart/form-data" id="formMedia">
                        @csrf
                        <input type="hidden" name="ajax" value="ajax">
                        <input type="file" name="file" id="file" class="dropify" data-height="300">
                        <button type="submit" class="btn btn-block btn-primary btn-sm mb-3">Upload & Select Image</button>
                    </form>
                    <input type="text" class="form-control" name="search" id="searchMedia" onchange="searchMedia()" placeholder="Search ...">
                    <div id="dataMedia">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-light">Close</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        let targetId = '';
        let targetImage = '';
        function selectMedia(target, image) {
            targetId = target;
            targetImage = image;
            $('#modalMedia').modal('show');
            searchMedia();
        }
        function searchMedia(page = 1) {
            let search = $('#searchMedia').val();
            let dataMedia = $('#dataMedia');
            dataMedia.html('<div class="text-center"><h2><i class="fa fa-spinner fa-spin"></i></h2></div>');
            $.post("{{ route('media.search') }}", {_token:'{{ csrf_token() }}', name: search, page: page, modal: 'modal'}, function (result) {
                dataMedia.html(result);
                $('#colLoading').hide();
            }).fail(function (xhr) {
                console.log(xhr.responseText);
            });
        }
        function selectTargetMedia(id, fileLocation) {
            $(targetId).val(id);
            $(targetImage).attr('src', fileLocation);
            $('#modalMedia').modal('toggle');
        }
        $('#formMedia').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            $.ajax({
                type: 'post',
                url: "{{ route('media.save', 'new') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (result) {
                    $(targetId).val(result.id);
                    $(targetImage).attr('src', "{{ asset('storage') }}/" + result.location);
                },
                error: function (xhr) {
                    let result = JSON.parse(xhr.responseText);
                    console.log(result);
                },
                complete: function () {
                    $('#modalMedia').modal('toggle');
                }
            });
        });
    </script>
@endpush
