
<!-- 若登入 先在此做判斷 檢查有無帳號密碼之類的東西 -->
<?php
// 這裡用!empty 因為 isset POST一定有東西
if(!empty($_POST)){
    if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
        $_SESSION['login']=1;
        to('back.php');
    }else{
        $error="帳號或密碼錯誤";
    }
}

?>

<h3 style="color:red" class="ct"><?=(isset($error))?$error:'';?></h3>
<!-- 短寫如下 -->
<!-- <h3 style="color:red" class="ct"><?=$error??'';?></h3> -->

<!-- 當前頁重整  -->
<form action="back.php" method="post">
<table style="width:30%; margin:auto;">
    <tr>
        <td>帳號:</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>密碼:</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <!-- colspan=擴展橫向盒子 -->
    <tr>
        <td colspan="2" class="2"><div class="ct"><input type="submit" value="送出"></div></td>
    </tr>
</table>
</form>