<?php
$do = ($_GET['do']) ?? 'main';
include('./api/base.php');

if(empty($_SESSION['frist'])){
    $_SESSION['frist'] = 1;
    $total = $Total->find(1);
    $total['text'] = $total['text']+1;
    $Total->save($total);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <iframe style="display:none;" name="back" id="back"></iframe>
    <div id="main">

        <?php
        include('./layout/header.php');
        ?>

        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor cent">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?php
                    foreach ($Menu->all(['sh' => 1, 'parent' => 0]) as $key => $menu) {
                    ?>
                        <div class="menu_out">
                            <a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $menu['href'] ?>">
                                <div class="mainmu">
                                    <?= $menu['text'] ?>
                                </div>
                            </a>

                            <div class="mw">
                            <?php
                            foreach ($Menu->all(['sh' => 1, 'parent' => $menu['id']]) as $key => $child) {
                            ?>
                                <a style="color:#000; font-size:13px; text-decoration:none;" href="<?= $child['href'] ?>">
                                    <div class="mainmu2">
                                        <?= $child['text'] ?>
                                    </div>
                                </a>

                            <?php
                            }
                            ?>
                            </div>
                        </div>


                    <?php
                    }
                    ?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                        <?= $Total->find(1)['text'] ?>
                    </span>
                </div>
            </div>


            <?php
            if (file_exists('./front/' . $do . '.php')) {
                include('./front/' . $do . '.php');
            } else {

                to('./index.php');
            }

            ?>

            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('?do=admin')">管理登入</button>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <script>
                        var nowpage = 0,
                            num = 0;

                        function pp(x) {
                            var s, t;
                            if (x == 1 && nowpage - 1 >= 0) {
                                nowpage--;
                            }
                            if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
                                nowpage++;
                            }
                            $(".im").hide()
                            for (s = 0; s <= 2; s++) {
                                t = s * 1 + nowpage * 1;
                                $("#ssaa" + t).show()
                            }
                        }
                        pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>

        <?php
        include('./layout/footer.php');
        ?>
    </div>

</body>

<Script>
    $(document).ready(function() {
        $(".mainmu").mouseover(
            function() {
                $(this).parent().next().show()


                $('.mw').mouseover(function(){
                    $(this).show()
                })
            }

        )
        $(".mainmu").mouseout(
            function() {
                $(this).parent().next().hide()
            }
        )

        $('.mw').mouseout(function(){
                    $(this).hide()
                })
    });
</Script>

</html>