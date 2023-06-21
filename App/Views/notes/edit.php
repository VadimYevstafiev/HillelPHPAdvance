<?php view('blocks/header'); ?>
    <div class="container">
        <div class="row">
            <form action="<?= url('notes/' . $note->id . '/update') ?>" method="post">
                <div class="col-12">
                    <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center justify-content-between">
                        <li class="nav-item d-flex flex-row">
                            <a href="<?= urlBack()  ?>"
                                class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 d-flex flex-column" style="padding: 0 1rem">
                    <div class="mb-3">
                        <label for="title" class="form-label">Change title</label>
                        <textarea class="form-control" name="title" id="title" rows="5"><?= $note->title ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Change content</label>
                        <textarea class="form-control" name="content" id="content" rows="5"><?= $note->content ?></textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save changes</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
view('blocks/footer');
