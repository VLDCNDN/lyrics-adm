@extends('layouts.app')

@section('content')
<div class="container">
    @include('components.addlyricsmodal')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-music me-1"></i>
                    Song Lyrics
                </div>
               
                <div class="card-body">
                    <button type="button" class="btn btn-dark mb-2" data-toggle="modal" data-target="#addLyricsModal">Add Lyrics</button>
                    <table id="songsTable" class="">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#songsTable').DataTable({
            paging: true,
            pageLength: 10,
            searching: true,
            ordering: true,
            autoWidth: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                type: "GET",
                url: "/songs",
                datatypes: "json"
            },
            columns: [
                { data: "id" },
                { data: "title" },
                { data: "artist" },
                { data: "created_at" },
                { data: "action" }
            ],
            columnDefs: [
                { orderable: false, targets: [4] },
                { visible: false, targets: [0] }
            ],
        });
    });

    function deleteSong(id) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/song/' + id,
            type: 'DELETE',
            success: function(result) {
                toastr.error('Deleted!');
                location.reload();
            }
        })
    }
</script>
@endsection