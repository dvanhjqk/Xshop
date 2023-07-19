<?php
session_start();
$_SESSION['cart']=[];
$i = ['abc', 'xyz'];
    array_push($_SESSION['cart'], $i);

$_SESSION['name'] = "Huy";
if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
}else{
    echo "";
}
echo "<a href='giohang.php?act=xoa'>delete</a>";
if($_GET['act'] == "xoa"){
    $u = ['ú òa'];
    unset($_SESSION['name']);
    array_push($_SESSION['cart'], $u);
    var_dump($_SESSION['cart']);
    if(!isset($_SESSION['name'])){
        echo "còn cái nịt";
    }
}