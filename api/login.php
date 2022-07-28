<?php
include('./base.php');
$acc = $_POST['acc'];
$pw = $_POST['pw'];

$chk = $Admin->find(['acc'=>$acc,'pw'=>$pw]);

if(empty($chk)){

    alert('帳號或密碼錯誤');
    header("refresh:0,url='../index.php?do=login'");

}else{

    $_SESSION['user'] = 1;
    to('../back.php');

}

?>