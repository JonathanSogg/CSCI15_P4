<div class="modal hide" id="upload">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Upload a new picture</h3>
    </div>
    <div class="modal-body">
        <form method="POST" action="{{ URL::to('upload') }}" id="uploadForm" enctype="multipart/form-data">
            <label for="picture">Picture</label>
            <input type="file" placeholder="Choose a picture to upload" name="picture" id="picture" />
            <label for="description">Description</label>
            <textarea placeholder="Describe your picture in a few sentences" name="description" id="description" class="span5"></textarea>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
        <button type="button" onclick="$('#uploadForm').submit();" class="btn btn-primary">Upload</a>
    </div>
</div>
