<?php
$do = $_GET['do'];
include('../api/base.php')
?>

<h3 class="cent"><?=$STR->addHeader?></h3>
<hr>
<form action="../api/add.php" method="post">
    <table class="m-auto cent">

        <tr>
            <td>
            <?=$STR->addAcc?>
            </td>
            <td>
                <input type="text" name="acc" class="w-100">
            </td>
        </tr>
        <tr>
            <td>
            <?=$STR->addPw?>
            </td>
            <td>
                <input type="password" name="pw" class="w-100">
            </td>
        </tr>
        <tr>
            <td>
            <?=$STR->addPwch?>
            </td>
            <td>
                <input type="password" name="pwch" class="w-100">
            </td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="<?=$do?>">
            <td colspan="2">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>

</form>