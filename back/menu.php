<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header ?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%" class="cent">
            <tbody>
                <tr class="yel">
                    <td width="34%"><?= $STR->text ?></td>
                    <td width="34%"><?= $STR->href ?></td>
                    <td width="6%"><?= $STR->child ?></td>
                    <td width="6%">顯示</td>
                    <td width="6%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $DB = new DB($do);
                $rows = $DB->all(['parent' => 0]);
                foreach ($rows as $key => $row) {
                ?>
                    <tr>
                        <td>
                            <input type="text" name="text[]" value="<?= $row['text'] ?>" class="w-90">
                        </td>
                        <td>
                            <input type="text" name="href[]" value="<?= $row['href'] ?>" class="w-90">
                        </td>
                        <td>
                            <?= count($DB->all(['parent' => $row['id']])) ?>
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/addChild.php?do=<?= $do ?>&id=<?= $row['id'] ?>')" value="<?= $STR->updateBtn ?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do ?>">
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do ?>.php?do=<?= $do ?>')" value="<?= $STR->addBtn ?>">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>