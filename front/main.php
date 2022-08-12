<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>





    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%; display:flex; flex-wrap:wrap; justify-content:space-between;">
<!-- 8/12-13:04 ~ 14:30 -->
      <?php
          $startDate=date("Y-m-d",strtotime("-2 days"));// 用strtotime()將時間往回推兩天
          $today=date("Y-m-d");

          // betwween時間語法的字串 規定 小的在前面大的在後面, 後面的變數要用單引號框起來 使其變成字串 否則2022-8-10的-會變減法 使結果不是日期而是數字2004
          $all=$Movie->math("count" , "id" , " Where `sh`='1' && ondate between '$startDate' AND '$today'");
          // echo $all;
          $div=4;
          $pages=ceil($all/$div);
          $now=$_GET['p']??1;
          $start=($now-1)*$div;
          // $row=Movir表查詢全部(sh值為1 && 顯示區間為$startDate 和 $today 限制顯示為$start,$div)
          $rows=$Movie->all(" Where `sh`='1' && ondate between '$startDate' AND '$today' order by rank limit $start,$div"); 
          foreach($rows as $row){
      ?>
        <div style="display:flex; flex-wrap:wrap; border:1px solid #ccc; border-radius:5px; width:49.5%; padding:5px; box-sizing:border-box; margin:2px 0;">
            <div style="width:30%">
            <a href="?do=intro&id=<?$row['id'];?>">
              <img src="./upload/<?=$row['poster'];?>" style="width:60px; height:80px; border:2px solid white;">
            </a>
          </div>
          <div style="width:70%; padding-left:2px; box-sizing:border-box;">
              <div><?=$row['name'];?></div>
              <div>分級:
                <img src="./icon/<?=$Level[$row['level']];?>" style="width:18px;">
                <?=$row['level'];?>
              </div>
              <div>上映日期:<?=$row['ondate'];?></div>
            </div>
            <div style="width:100%">
              <button onclick="location.href='?do=intro&id=<?$row['id'];?>'">劇情簡介</button>
              <button onclick="location.href='?do=order&id=<?$row['id'];?>'">線上訂票</button>
            </div>
          </div>


      <?php
      }
      ?>


        <div class="ct" style="width:100%">
        <?php
          if(($now-1)>0){
            $p=($now-1);
            echo "<a href='?p={$p}' > < </a>";
          }

          for($i=1;$i<=$pages ;$i++){
              $fontSize=($now==$i)?'24px':'18px';
            echo "<a href='?p={$i}' style='font-size:{$fontSize}'> $i </a>";
          }

          if(($now+1)<=$pages){
            $p=($now+1);
            echo "<a href='?p={$p}' > > </a>";
          }
        ?>


        </div>
      </div>
    </div>