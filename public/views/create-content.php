<?php require 'components/flash-message.php'; ?>

<section class="container h65vh items-flex align-center just-center w100">
    <form method="POST" action="<?= PATH_BASE ?>/create-content" enctype="multipart/form-data" class="form-box w90">
        <h4 class="mr-bottom-small">Add new content to your channel!</h4>
        <input type="text" name="title" class="mr-bottom-small w100" placeholder="Title" />
        <input type="text" name="description" class="mr-bottom-small w100" placeholder="Description" />
        <!--<select name="channel" class="mr-bottom-small w100">
            <?php /*foreach ($params['userChannel'] as $key => $userChannel) {*/  ?>
                <option value="<?php /*$userChannel['id']*/ ?>"><?php /*$userChannel['title']*/ ?></option>
            <?php /*}*/ ?>
        </select>-->
        <label for="thumbnail">Thumbnail:</label>
        <input type="file" name="thumbnail" class="mr-bottom-small w100" />
        <label for="video">Video:</label>
        <input type="file" name="video" class="mr-bottom-small w100" />
        <button type="submit" name="create-content" class="button-default center w20 w60-dv-small">Add Content</button>
    </form>
</section>