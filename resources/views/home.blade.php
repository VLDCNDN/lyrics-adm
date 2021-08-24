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
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Release Date</th>
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
        });
    });
</script>
@endsection