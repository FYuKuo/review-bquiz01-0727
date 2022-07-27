<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);

$data = $DB->find($_POST['id']);
$data['text'] = $_POST['text'];


$DB->save($data);


to("../back.php?do=$table");

?>