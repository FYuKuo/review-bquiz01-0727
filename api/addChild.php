<?php
include('./base.php');
$table = $_POST['table'];

$DB = new DB($table);


if(isset($_POST['id'])){
    
    foreach ($_POST['id'] as $key => $id) {

        if(isset($_POST['del']) && in_array($id,$_POST['del'])){

            // dd($_POST['del']);

            $DB->del($id);

        }else{

            $data = $DB->find($id);
    
            $data['text'] = $_POST['text']["$key"];
            $data['href'] = $_POST['href']["$key"];
    
            // dd($data);
            
            $DB->save($data);
        }

    }

}

if(isset($_POST['textAdd'])){
    
    $data = [];
    
    foreach ($_POST['textAdd'] as $key => $value) {
    
        $data['text'] = $_POST['textAdd']["$key"];
        $data['href'] = $_POST['hrefAdd']["$key"];
        $data['sh'] = 1;
        $data['parent'] = $_POST['parentId'];


        $DB->save($data);
    }
    
    dd($data);
    
    
}




to("../back.php?do=$table");



?>