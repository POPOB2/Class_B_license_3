<?php
date_default_timezone_set("Asia/Taipei");
session_start();
// ------------------------------------------------------------------------------------------------------------------------------
class DB{
    protected $table;
    protected $dsn='mysql:host=localhost; charset=utf8; dbname=db19';
    protected $pdo;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn, 'root', '');
    }

// ------------------------------------------------------------------------------------------------------------------------------
function all(...$arg){
    $sql="select * from $this->table";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key =>$val){
                $tmp[]="`$key`='$val'";
        }
        $sql.=" WHERE " . join(" && " , $tmp);
    }else{
        $sql.=$arg[0];
        }
    }

    if(isset($arg[1])){
        $sql.=$arg[1];
    }
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
// ------------------------------------------------------------------------------------------------------------------------------
function find($id){
    $sql="select * from $this->table WHERE";
    if(is_array($id)){
        foreach($id as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        $sql.=join(" && ", $tmp);
    }else{
        $sql."`id`='$id'";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
// ------------------------------------------------------------------------------------------------------------------------------
function math($math,$col,...$arg)
{
    $sql="select $math($col) from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            //$sql = $sql . " where " . join(" && ",$tmp);
            $sql .= " where " . join(" && ",$tmp);
        }else{
            // $sql=$sql . $arg[0];
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }
    //echo $sql;
    return $this->pdo->query($sql)->fetchColumn();
}
// ------------------------------------------------------------------------------------------------------------------------------
function save($array){
    if(isset($array['id'])){
        foreach($array as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        $sql="update $this->table set ".join(",",$tmp);
    }else{
        $col=join("`,`",array_keys($array));
        $values=join("','",$array);
        $sql="insert into $this->table (`{$col}`) values('{$values}')";
    }
    return $this->pdo->exec($sql);
}
// ------------------------------------------------------------------------------------------------------------------------------
function del($id){
    $sql="delete from $this->table WHERE " ;
    if(is_array($id)){
        foreach($id as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        $sql.= join(" && ",$tmp);
    }else{
        $sql.=" `id`='$id'";
    }
    return $this->pdo->exec($sql);
}
// ------------------------------------------------------------------------------------------------------------------------------
function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

}
// ------------------------------------------------------------------------------------------------------------------------------
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
// ------------------------------------------------------------------------------------------------------------------------------
function to($url){
    header("location:".$url);
}
// ------------------------------------------------------------------------------------------------------------------------------
// 8/12-8:10 ~ 10:3
$Order=new DB('orders');
$Poster=new DB('poster');
// 8/8-11:25 ~ 11:55
$Movie=new DB('movie');
// 8/8-13:41 ~ 13:56
// 全域變數, 該陣列用於back/movie.php顯示 分級 的圖示
$Level=[
    '普遍級'=>'03C01.png',
    '輔導級'=>'03C02.png',
    '保護級'=>'03C03.png',
    '限制級'=>'03C04.png'
];
?>