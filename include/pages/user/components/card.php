<article class="card">
    <div class="card__body">
        <h4 class="card__title title--sm text-bold m-0"><a class="text-default" href="<?= ($local_link?"/post/".$post[$table.'_id']:$post[$table.'_url']) ?>"><?= $post[$table.'_title'] ?></a></h4>
        <a class="color-default text-wrap" href="<?= ($local_link?"post/".$post[$table.'_id']:$post[$table.'_url']) ?>"><?= $post[$table.'_url'] ?></a>
        <p class="description mb-0 <?= ($local_link?"line-clamp line-clamp--3":"") ?>"><?= $post[$table.'_description'] ?></p>
    </div>
    <div class="card__footer">
        <p class="description m-0">Submitted on 2022-05-17 09:47:00</p>
    </div>
</article>