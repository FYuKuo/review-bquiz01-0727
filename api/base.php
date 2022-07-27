<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB {
    protected $dsn = 'mysql:host=localhost;charset=utf8;dbname=db15-0727';
    protected $user = 'root';
    protected $pw = '';
    public $pdo;
    public $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,$this->user,$this->pw);
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM `$this->table`";

        if(isset($arg[0])){
            if(is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }

                $sql = $sql . " WHERE" . join('AND',$tmp);

            }else{
                $sql = $sql . $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {

        $sql = "SELECT * FROM `$this->table`";

        if(is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);

        }else{
            $sql = $sql . " WHERE `id` = '$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {

        $sql = "DELETE FROM `$this->table`";

        if(is_array($id)) {
            foreach ($id as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);

        }else{
            $sql = $sql . " WHERE `id` = '$id'";
        }

        return $this->pdo->exec($sql);
    }

    public function save($data)
    {
        if(isset($data['id'])){
        // 更新

        foreach ($data as $key => $value) {

            if($key != 'id') {
                $tmp[] = "`$key` = '$value'";

            }
        }

        $sql = "UPDATE `$this->table` SET " .join(',',$tmp). " WHERE `id` = '{$data['id']}'";

        }else{
        //儲存
        $col = join("`,`",array_keys($data));
        $value = join("','",$data);

        $sql = "INSERT INTO `$this->table` (`$col`) VALUES ('$value')";
        }

        return $this->pdo->exec($sql);
    }

    public function math($math,...$arg)
    {
        $sql = "SELECT $math(*) FROM `$this->table`";

        if(isset($arg[0])){
            if(is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }

                $sql = $sql . " WHERE" . join('AND',$tmp);

            }else{
                $sql = $sql . $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    public function q($str)
    {
        $sql = "SELECT * FROM `$this->table` WHERE " . $str;

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}


class STR {
    public $header;
    public $img;
    public $text;
    public $href;
    public $acc;
    public $pw;
    public $updateBtn;
    public $updateHeader;
    public $updateImg;
    public $updateText;
    public $updateHref;
    public $addBtn;
    public $addHeader;
    public $addImg;
    public $addText;
    public $addHref;
    public $addAcc;
    public $addPw;
    public $addPwch;
    public $table;


    public function __construct($table)
    {
        $this->table = $table;

        switch ($table) {
            case 'title':
                $this->header = '網站標題管理';
                $this->img = '網站標題';
                $this->text = '替代文字';
                $this->updateBtn = '更新圖片';
                $this->updateHeader = '更新標題區圖片';
                $this->updateImg = '網站標題：';
                $this->updateText = '替代文字：';
                $this->addBtn = '新增網站標題圖片';
                $this->addHeader = '新增標題區圖片';
                $this->addImg = '網站標題：';
                $this->addText = '替代文字：';

            break;

            case 'ad' :
                $this->header = '動態文字廣告管理';
                $this->text = '動態文字廣告';
                $this->addBtn = '新增動態文字廣告';
                $this->addHeader = '新增動態文字廣告';
                $this->addText = '動態文字廣告：';
            break;

            case 'mvim' :
                $this->header = '動畫圖片管理';
                $this->img = '動畫圖片';
                $this->updateBtn = '更新動畫';
                $this->updateHeader = '更新動畫圖片';
                $this->updateImg = '動畫圖片：';
                $this->addBtn = '新增動畫圖片';
                $this->addHeader = '新增動畫圖片';
                $this->addImg = '動畫圖片：';
            break;

            case 'image' :
                $this->header = '校園映像資料管理';
                $this->img = '校園映像資料圖片';
                $this->updateBtn = '更新圖片';
                $this->updateHeader = '更新校園映像圖片';
                $this->updateImg = '校園映像圖片：';
                $this->addBtn = '新增校園映像圖片';
                $this->addHeader = '新增校園映像圖片';
                $this->addImg = '校園映像圖片：';
            break;

            case 'total' :
                $this->header = '進站總人數管理';
                $this->text = '進站總人數：';
            break;

            case 'bottom' :
                $this->header = '頁尾版權資料管理';
                $this->text = '頁尾版權資料：';
            break;

            case 'news' :
                $this->header = '最新消息資料管理';
                $this->text = '最新消息資料內容';
                $this->addBtn = '新增最新消息資料';
                $this->addHeader = '新增最新消息資料';
                $this->addText = '最新消息資料：';
            break;

            case 'admin' :
                $this->header = '管理者帳號管理';
                $this->acc = '帳號';
                $this->pw = '密碼';
                $this->addBtn = '新增管理者帳號';
                $this->addHeader = '新增管理者帳號';
                $this->addAcc = '帳號：';
                $this->addPw = '密碼：';
                $this->addPwch = '確認密碼：';
            break;

            case 'menu' :
                $this->header = '選單管理';
                $this->text = '主選單名稱';
                $this->href = '選單連結網址';
                $this->child = '次選單數';
                $this->updateBtn = '編輯次選單';
                $this->updateHeader = '編輯次選單';
                $this->updateHref = '次選單名稱';
                $this->updateText = '次選單連結網址';
                $this->addBtn = '新增主選單';
                $this->addHeader = '新增主選單';
                $this->addText = '主選單名稱：';
                $this->addHref = '選單連結網址：';
            break;


        }



    }
}



function to($url){
    header("location:$url");
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


if(isset($do)) {
    $STR = new STR($do);
}

function alert($str){
    echo "<script>";
    echo "alert('$str')";
    echo "</script>";
}

$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('mvim');
$Image = new DB('image');
$Total = new DB('total');
$Bottom = new DB('bottom');
$News = new DB('news');
$Admin = new DB('admin');
$Menu = new DB('menu');
?>