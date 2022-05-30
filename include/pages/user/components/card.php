<article class="card">
    <div class="card__body">
        <h4 class="card__title title--sm text-bold m-0"><a class="text-default" href="<?= ($local_link?"/post/".$post['id']:$post['url']) ?>"><?= $post['title'] ?></a></h4>
        <a class="color-default text-wrap" href="<?= ($local_link?"post/".$post['id']:$post['url']) ?>"><?= $post['url'] ?></a>
        <p class="description mb-0 line-clamp line-clamp--3"><?= $post['description'] ?></p>
    </div>
    <div class="card__footer">
        <p class="description m-0">Submitted on 2022-05-17 09:47:00</p>
    </div>
</article>