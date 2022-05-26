<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Url</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $d){ ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= $d['title'] ?></td>
                <td><?= $d['url'] ?></td>
                <td><?= $d['description'] ?></td>
                <td>
                    <form method="POST" action="/controller/<?= $action ?>">
                        <!-- <input type="hidden" name="redirect" value="<?= str_replace('bookmark/','',$_SERVER['REQUEST_URI']) ?>"> -->
                        <input type="hidden" name="redirect" value="<?= $url ?>">
                        <button name="delete" value="<?= $d['id'] ?>" class="text-plain title--sm text-default text-clickable"><i class="icon-trash-empty"></i></button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>