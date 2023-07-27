<?php require 'components/flash-message.php'; ?>

<section class="container h65vh items-flex align-center just-center w100">
    <form method="POST" action="<?= PATH_BASE ?>/new-channel" enctype="multipart/form-data" class="form-box w90">
        <h4 class="mr-bottom-small">Create a new channel!</h4>
        <input type="text" name="title" class="mr-bottom-small w100" placeholder="Title" />
        <input type="text" name="description" class="mr-bottom-small w100" placeholder="Description" />
        <label for="image">Image:</label>
        <input type="file" name="image" class="mr-bottom-small w100" />
        <button type="submit" name="new-channel" class="button-default center w20 w60-dv-small">New Channel</button>
    </form>
</section>