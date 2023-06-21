<?php
view('blocks/header');
$errors = $errors ?? [];
?>

<div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-25 mt-5 m-auto">
        <form method="post" action= "<?= url('folders/' . ($folder->id ?? $fields['id']) . '/update') ?>">
            <h1 class="h3 mb-3 fw-normal">Update Folder</h1>

            <div class="form-floating">
                <input type="title" class="form-control" id="floatingInput" name="title"
                placeholder="Some note title..." value=<?= $folder->title ?? $fields['title'] ?>>
                <label for="floatingInput">Title</label>
                <?= showInputError('title', $errors) ?>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Update</button>
        </form>
        </main>
    </div>

<?php
view('blocks/footer');