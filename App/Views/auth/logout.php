<?php
view('blocks/header');
?>
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-25 mt-5 m-auto">
        <form method="post" action= "<?= url('auth/signout') ?>">
            <h1 class="h3 mb-3 fw-normal">Log out?</h1>

            <button class="btn btn-primary w-100 py-2" name="yes" type="submit">Yes</button>
            <hr>
            <button class="btn btn-primary w-100 py-2" name="no" type="submit">No</button>
        </form>
        </main>
    </div>

<?php
view('blocks/footer');
