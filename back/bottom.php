<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header ?></p>
    <form method="post" action="./api/update.php">
        <table width="50%" class="cent m-auto">
            <tbody>
                <?php
                $DB = new DB($do);
                $row = $DB->find(1);
                ?>
                <tr>
                    <td width="50%" class="yel">
                    <?= $STR->text ?>
                    </td>
                    <td>
                        <input type="text" name="text" value="<?= $row['text'] ?>" class="w-90">
                    </td>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:50%;" class="cent m-auto">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do ?>">
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>