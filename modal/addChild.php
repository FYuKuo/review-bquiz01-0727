<?php
$do = $_GET['do'];
include('../api/base.php');
?>

<h3 class="cent"><?= $STR->updateHeader ?></h3>
<hr>
<form action="../api/addChild.php" method="post">
    <table class="m-auto cent" width="60%">

        <tr>
            <td>
                <?= $STR->updateText ?>
            </td>
            <td>
                <?= $STR->updateHref ?>
            </td>
            <td>
               刪除
            </td>
        </tr>
        <?php
        $DB = new DB($do);
        $rows = $DB->all(['parent' => $_GET['id']]);
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td width="43%">
                    <input type="text" name="text[]" class="w-90" value="<?= $row['text'] ?>">
                </td>
                <td width="43%">
                    <input type="text" name="href[]" class="w-90" value="<?= $row['href'] ?>">
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                </td>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            </tr>
        <?php
        }
        ?>
        <tr class="lastTr">
            <input type="hidden" name="parentId" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="table" value="<?= $do ?>">
            <td colspan="3">
                <input type="submit" value="修改確認">
                <input type="reset" value="重置">
                <input type="button" id="addBtn" value="更多次選單">
            </td>
        </tr>
    </table>

</form>

<script>
    $(document).ready(function() {
        $('#addBtn').click(function() {
            $('.lastTr').before(`<tr>
            <td width="43%">
                <input type="text" name="textAdd[]" class="w-90">
            </td>
            <td width="43%">
                <input type="text" name="hrefAdd[]" class="w-90">
            </td>
        </tr>`)
        })
    })
</script>