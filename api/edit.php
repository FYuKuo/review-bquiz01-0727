<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);


foreach ($_POST['id'] as $key => $id) {
    
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){

            $DB->del($id);
            // echo $id;

    }else{
        $data = $DB->find($id);

        switch ($table) {
            case 'title':
                $data['text'] = $_POST['text']["$key"];
                $data['sh'] = ($_POST['sh'] == $id)?1:0;
        
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
    
            // dd($data);
            $DB->save($data);
    }

}


to("../back.php?do=$table");
// 
?>