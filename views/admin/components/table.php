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
                <td>
                    <form data-confirm="Are you sure you want to delete this data?" method="POST" action="/controller/<?= $action ?>">
                        <!-- <input type="hidden" name="redirect" value="<?= str_replace('bookmark/','',$_SERVER['REQUEST_URI']) ?>"> -->
                        <input type="hidden" name="redirect" value="<?= $url ?>">
                        <button type="submit" name="delete" value="<?= $d['id'] ?>" class="text-plain title--sm text-default text-clickable"><i class="icon-trash-empty"></i></button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>