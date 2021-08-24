<div class="modal fade" id="addLyricsModal" tabindex="-1" role="dialog" aria-labelledby="addLyricsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lyricsModalLabel">New Lyrics</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Lyrics</label>
            <textarea class="form-control" id="lyrics" name="lyrics" rows="20" cols="50"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>