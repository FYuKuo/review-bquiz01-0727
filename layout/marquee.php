<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
foreach ($Ad->all(['sh'=>1]) as $key => $value) {
    echo $value['text']."&nbsp;&nbsp;/&nbsp;&nbsp;";
}
?>
</marquee>