<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Pic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="vform" action="ajaxuploadpic.php" method="post" enctype="multipart/form-data">
	  <input id="uploadpic" type="file" accept="image/*" name="image" />
		<div id="preview"></div><br>
		<input class="btn btn-success" type="submit" value="Upload Pic">
	  </form>
	  <div class="loaderebox" style="display: none;">
            <span class="loader"></span>
			 uploading...
      </div>
      </div>
	  <div class="showMsg"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary savepic">Save picture</button> -->
      </div>
    </div>
  </div>
</div>