<table class="table">
    <thead>
        <tr>
            <?php foreach($columns as $col){ ?>
                <th><?= $col ?></th>
            <?php } ?>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $d){ ?>
            <tr>
                <?php foreach($d as $value){ ?>
                    <td><?= $value ?></td>
                <?php } ?>
                <td class="d-flex">
                    <form data-confirm="Are you sure you want to delete this <?= $action ?>?" method="POST" action="/controller/<?= $action ?>">
                        <input type="hidden" name="redirect" value="<?= $url ?>">
                        <button type="submit" name="delete" value="<?= $d['id'] ?>" class="text-plain title--sm text-default text-clickable"><i class="icon-trash-empty"></i></button>
                    </form>
                    <?php if(isset($approve)){ ?>
                        <form data-confirm="Are you sure you want to <?= $d[$approve]?'disapprove':'approve' ?> this <?= $action ?>?" method="POST" action="/controller/<?= $action ?>">
                            <input type="hidden" name="redirect" value="<?= $url ?>">
                            <input type="hidden" name="column" value="<?= $approve ?>">
                            <input type="hidden" name="value" value="<?= $d[$approve] ?>">
                            <button type="submit" name="approve" value="<?= $d['id'] ?>" class="text-plain title--sm text-default text-clickable">
                                <i class="<?= $d[$approve]?'icon-thumbs-down':'icon-thumbs-up' ?>"></i>
                            </button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>