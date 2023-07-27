<section class="container-auth w100 h100vh items-flex align-center just-center">
    <form method="POST" action="<?= PATH_BASE ?>/sign-up" enctype="multipart/form-data" class="form-box items-flex flex-wrap align-center w50 w90-dv-small">
        <?php require 'components/flash-message.php'; ?>
        <input type="text" name="name" placeholder="Name" class="mr-bottom-small w100" autocomplete="off" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" />
        <input type="text" name="email" placeholder="Email" class="mr-bottom-small w100" autocomplete="off" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
        <input type="password" name="password" placeholder="Password" class="mr-bottom-small w100" autocomplete="off" />
        <input type="text" name="about" placeholder="About" class="mr-bottom-small w100" autocomplete="off" value="<?php echo isset($_POST['about']) ? $_POST['about'] : '' ?>" />
        <label for="image">Image:</label>
        <input type="file" name="image" class="mr-bottom-small w100" />
        <button type="submit" name="sign-up" class="button-default w20 center w50-dv-small">Sign Up</button>
        <div class="mr-top-tiny text-right w100">
            <p>Already have an account? <a href="<?= PATH_BASE ?>/sign-in">Sign In!</a></p>
        </div>
    </form>
</section>