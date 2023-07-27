<section class="container-auth w100 h100vh items-flex align-center just-center">
    <form method="POST" action="<?= PATH_BASE ?>/sign-in" class="form-box items-flex flex-wrap align-center w50 w90-dv-small">
        <?php require 'components/flash-message.php'; ?>
        <input type="text" name="email" placeholder="Email" class="mr-bottom-small w100" autocomplete="off" />
        <input type="password" name="password" placeholder="Password" class="mr-bottom-small w100" autocomplete="off" />
        <button type="submit" name="sign-in" class="button-default w20 center w50-dv-small">Sign In</button>
        <div class="mr-top-tiny text-right w100">
            <p>Don't have an account? <a href="<?= PATH_BASE ?>/sign-up">Create!</a></p>
        </div>
    </form>
</section>