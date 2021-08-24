<div class="modal fade" id="editLyricsModal" tabindex="-1" role="dialog" aria-labelledby="editLyricsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Lyrics</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control invisible" id="updateId" name="id">  
        <form>
          <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="updateTitle" name="title">
          </div>
          <div class="form-group">
            <label for="artist" class="col-form-label">Artist</label>
            <input type="text" class="form-control" id="updateArtist" name="artist">
          </div>
          <div class="form-group">
            <label for="lyrics" class="col-form-label">Lyrics</label>
            <textarea class="form-control" id="updateLyrics" name="updateLyrics" rows="15" cols="30"></textarea>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button id="update" type="button" class="btn btn-primary">Update</button>
      </div>

    </div>
  </div>
</div>

<script>
  $('#update').click(function() {
    let id = $('#updateId').val();
    let title = $('#updateTitle').val();
    let artist = $('#updateArtist').val();
    let lyrics = $('#updateLyrics').val();

    $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/song/' + id,
            type: 'PUT',
            data: {
                title: title,
                artist: artist,
                lyrics: lyrics
            },
            success: function(result) {
                toastr.success('Updated!');
                location.reload();
            }
        })    
  });
</script>