<ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
    <?php foreach($folders as $folder):  ?>
        <li class="nav-item">
        <a href="<?= url("folders/{$folder->id}")  ?>"
            class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 <?= $activeFolder && $activeFolder === $folder->id ? 'active' : '' ?>"
            id="all-category">
            <i class="icon-layers mr-1"></i><span class="d-none d-md-block"><?= $folder->title ?></span>
        </a>
    </li>
    <?php endforeach; ?>
    <li class="nav-item">
    <li class="nav-item">
        <a href="<?= url("folders/create")  ?>"
            class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2">
            <i class="fa fa-plus-circle" aria-hidden="true"></i></span>
        </a>       
    </li>
</ul>
