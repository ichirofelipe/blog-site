<div class="alert__notify alert--fixed <?= ($_SESSION['alert']['status'] != 201 ? 'alert--error':'alert--success') ?> <?= $class??'' ?>">
    <span><?= ucfirst($_SESSION['alert']['msg']) ?></span>
</div>