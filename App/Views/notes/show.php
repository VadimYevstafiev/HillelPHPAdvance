<?php view('blocks/header'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center justify-content-between">

                    <li class="nav-item d-flex flex-row">
                        <a href="<?= urlBack()  ?>"
                            class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Back</a>
                    </li>
                    <li class="nav-item">
                        <h3><?= $note->title ?></h3>
                    </li>
                    <li class="nav-item d-flex flex-row">
                        <a href="<?= url("notes/create")  ?>"
                            class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                        <a href="<?= url("notes/" . $note->id . "/edit")  ?>"
                            class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2"
                            style="color: #abab5b">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="<?= url("notes/" . $note->id . "/destroy")  ?>" method="POST">
                            <button type="submit"
                                class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2"
                                style="color: #c94c4c">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>

                    </li>
                </ul>

            </div>

            <div class="col-12 d-flex flex-column" style="padding: 0 1rem">
                <ul class="nav align-items-center d-flex w-100 justify-content-end mb-3" style="padding: 0 1rem">
                    <li class="nav-item d-flex flex-row"> &nbsp; Created: "<?= $note->created_at ?>"
                    </li>
                </ul>
                <div style="background: #fff; border-radius: 5px; padding: 3rem">
                    <?= $note->content ?>


                    <div class="d-flex align-items-center justify-content-end">
                        <a class="btn btn-outline-success"
                            href="<?= url('notes/' . $note->id . '/edit') ?>"
                            style="margin-right: 1rem"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="<?= url('notes/' . $note->id . '/destroy') ?>" method="POST">
                            <button type="submit" name="folder_id" value="<?= $activeFolder ?>"
                                class="btn btn-outline-danger"
                                ><i class="fa fa-trash remove-note"></i></button>
                        </form>
                    </div>



                </div>
                




            </div>
        </div>
    </div>


<?php
view('blocks/footer');
