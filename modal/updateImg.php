<?php
$do = $_GET['do'];
include('../api/base.php')
?>

<h3 class="cent"><?=$STR->updateHeader?></h3>
<hr>
<form action="../api/updateImg.php" method="post" enctype="multipart/form-data">
    <table class="m-auto cent">
        <tr>
            <td>
            <?=$STR->updateImg?>
            </td>
            <td>
                <input type="file" name="img" class="w-100">
            </td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="<?=$do?>">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <td colspan="2">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>

</form>