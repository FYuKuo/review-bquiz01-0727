<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);

$data = [];

if(isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img'] = $_FILES['img']['name'];
}

if(isset($_POST['text'])){
    $data['text'] = $_POST['text'];
}

switch ($table) {
    case 'title':
        $data['sh'] = 0;

    break;

    case 'ad' :


    case 'mvim' :

    break;

    case 'image' :

    break;

    case 'total' :

    break;

    case 'bottom' :

    break;

    case 'news' :

    break;

    case 'admin' :

    break;

    case 'menu' :

    break;
    }

$DB->save($data);

to("../back.php?do=$table");
?>