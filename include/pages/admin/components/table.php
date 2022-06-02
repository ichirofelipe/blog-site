<table class="table">
    <thead>
        <tr>
            <?php foreach($columns as $col){ ?>
                <th><?= str_replace($table."_", "", $col) ?></th>
            <?php } ?>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $d){ ?>
            <tr>
                <?php foreach($d as $value){ ?>
                    <td><?php 
                        switch($value){
                            case 'n':
                                echo 'No';
                                break;
                            case 'y':
                                echo 'Yes';
                                break;
                            default:
                                echo $value;
                                break;
                        }
                    ?></td>
                <?php } ?>
                <td class="d-flex">
                    <form data-confirm="Are you sure you want to delete this <?= $action ?>?" method="POST" action="/<?= $action ?>-request">
                        <input type="hidden" name="redirect" value="<?= $url ?>">
                        <button type="submit" name="delete" value="<?= $d[$table.'_id'] ?>" class="text-plain title--sm text-default text-clickable"><i class="icon-trash-empty"></i></button>
                    </form>
                    <?php if(isset($approve)){ ?>
                        <form data-confirm="Are you sure you want to <?= $d[$approve] == 'y'?'disapprove':'approve' ?> this <?= $action ?>?" method="POST" action="/<?= $action ?>-request">
                            <input type="hidden" name="redirect" value="<?= $url ?>">
                            <input type="hidden" name="column" value="<?= $approve ?>">
                            <input type="hidden" name="value" value="<?= $d[$approve] == 'y'?'n':'y' ?>">
                            <button type="submit" name="approve" value="<?= $d[$table.'_id'] ?>" class="text-plain title--sm text-default text-clickable">
                                <i class="<?= $d[$approve] == 'y'?'icon-thumbs-down':'icon-thumbs-up' ?>"></i>
                            </button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>