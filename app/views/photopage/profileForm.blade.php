<div class="modal hide" id="profile">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3>Edit your profile</h3>
    </div>
    <div class="modal-body">
        
        <form method="POST" action="{{ URL::to('profile') }}" id="profileForm" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" placeholder="Enter your name" name="name" id="name" />
            <label for="bio">Bio</label>
            <textarea placeholder="Place a short bio here" name="bio" id="bio" class="span5"></textarea>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
        <button type="button" onclick="$('#profileForm').submit();" class="btn btn-primary">Edit</a>
    </div>
</div>
