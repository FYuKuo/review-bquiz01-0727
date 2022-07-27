<?php
$do = $_GET['do'];
include('../api/base.php')
?>

<h3 class="cent"><?= $STR->addHeader ?></h3>
<hr>
<form action="../api/add.php" method="post">
    <table class="m-auto cent">

        <tr>
            <td>
                <?= $STR->addText ?>
            </td>
            <td>
                <textarea name="text" cols="30" rows="10" style="height: 50px;" class="w-100"></textarea>
            </td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="<?= $do ?>">
            <td colspan="2">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>

</form>