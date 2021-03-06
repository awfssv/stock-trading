<?php 
    // enable sessions
  session_start();
  $prompt = " ";
  
  if(!isset($_SESSION["authenticated"])) {
    $host = $_SERVER["HTTP_HOST"];
    $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host$path/home.php");
    exit;
  }

   require '../module/quoteHeader.php';
?>

    <h2>股票行情</h2>

      <table id="indexhead">
        <caption>
          大盘指数
        </caption>
        <tr>
          <td><a href="http://quotes.money.163.com/0000001.html" target="_blank">上证指数</a></td>
          <td><a href="http://quotes.money.163.com/1399001.html" target="_blank">深证成指</a></td>
          <td><a href="http://quotes.money.163.com/1399006.html" target="_blank">创业板指</a></td>
        </tr>
        <tr>
          <td id="index0">--</td>
          <td id="index1">--</td>
          <td id="index2">--</td>
        </tr>
      </table>      

      <br/>

    <script>
        var indexArr = new Array("0000001","1399001","1399006");
          
        var hqArr = new Array(
          ["1300182", "软件服务", "2014-02-20", "45.20", "58.95", "买入"],
          ["1002304", "食品饮料", "2014-02-17", "49.92", "74.80", "买入"],
          ["1300212", "软件服务", "2014-02-17", "42.10", "63.70", "买入"],
          ["1002672", "环境保护", "2014-02-14", "39.68", "49.00", "买入"],
          ["1300263", "工业机械", "2014-02-12", "37.21", "46.00", "买入"],
          ["1000830", "化工",     "2014-02-11", "3.93",  "5.10",  "金股"],
          ["1002104", "元器件",   "2014-02-11", "20.88", "25.00", "买入"],
          ["1300177", "通信设备", "2014-01-27", "27.75", "32.80", "买入"],
          ["0600519", "食品饮料", "2014-01-21", "126.79","214.00","买入"],
          ["1002195", "软件服务", "2014-01-17", "17.38", "23.00", "买入"],
          ["1002215", "化工",     "2014-01-13", "8.62",  "11.20", "买入"],
          ["1002416", "商业连锁", "2014-01-07", "19.38", "26.50", "金股"],
          ["1300312", "通信技术", "2014-01-07", "15.31", "20.00", "买入"],
          ["1300104", "互联网",   "2014-01-03", "44.88", "50.00", "买入"],
          ["1000860", "农林牧渔", "2014-01-02", "15.36", "21.80", "买入"],
          ["0601515", "广告包装", "2013-12-31", "25.92", "31.20", "买入"],
          ["1002589", "医药",     "2013-12-30", "49.58", "52.20", "买入"],
          ["1300146", "食品饮料", "2013-12-25", "69.61", "72.00", "买入"],
          ["1300002", "软件服务", "2013-12-24", "25.61", "34.50", "买入"],
          ["1300027", "传媒娱乐", "2013-12-20", "29.00", "40.00", "买入"],
          ["1300017", "电信运营", "2013-12-19", "79.39", "170.00","买入"],
          ["1002367", "运输设备", "2013-12-19", "13.74", "18.00", "买入"],
          ["1002285", "房地产",   "2013-12-12", "13.12", "24.00", "买入"],
          ["1002281", "通信设备", "2013-12-09", "35.29", "37.40", "买入"],
          ["0600372", "航空航天", "2013-12-02", "24.90", "30.00", "买入"],
          ["0600184", "通用机械", "2013-12-02", "24.78", "35.00", "买入"],
          ["1300075", "软件服务", "2013-12-02", "41.65", "45.00", "买入"],
          ["1300096", "软件服务", "2013-12-02", "26.70", "34.26", "买入"],
          ["1300147", "医药",     "2013-11-29", "19.38", "23.20", "买入"],
          ["1002475", "元器件",   "2013-11-29", "29.42", "35.30", "买入"],
          ["0600406", "软件服务", "2013-11-28", "13.60", "16.49", "买入"],
          ["1300024", "工业机械", "2013-11-28", "42.15", "50.00", "金股"],
          ["1300332", "环境保护", "2013-11-25", "12.42", "15.00", "买入"],
          ["1002610", "电器设备", "2013-11-25", "8.2",   "19.00" , "金股"],
          ["1002273", "元器件",   "2013-11-25", "18.50", "23.70", "买入"],
          ["1002065", "软件服务", "2013-11-22", "29.90", "38.80", "买入"],
          ["0601318", "保险类",   "2013-11-15", "36.74", "47.00", "买入"],
          ["1002317", "医药",     "2013-11-15", "21.50", "27.80", "买入"],
          ["0600535", "医药",     "2013-11-12", "39.70", "42.30", "买入"],
          ["1300157", "石油",     "2013-11-06", "24.83", "32.00", "买入"],
          ["1000063", "通信设备", "2013-11-06", "15.91", "17.50", "金股"],
          ["1300289", "医药",     "2013-11-06", "30.48", "36.54", "买入"],
          ["1000826", "环境保护", "2013-11-06", "34.89", "45.00", "金股"],
          ["0601766", "运输设备", "2013-11-06", "5.00",  "6.50" , "买入"],
          ["0601699", "煤炭",     "2013-11-01", "11.52", "12.90", "买入"],
          ["1002422", "医药",     "2013-10-31", "46.10", "53.00", "买入"],
          ["0600633", "传媒娱乐", "2013-10-31", "34.66", "45.00", "买入"],
          ["1000002", "房地产",   "2013-10-31", "9.08",  "10.60", "买入"],
          ["0601601", "保险类",   "2013-10-31", "17.13", "22.00", "买入"],
          ["0600157", "煤炭",     "2013-10-31", "6.01",  "7.80" , "买入"],
          ["0601238", "汽车类",   "2013-10-31", "7.92",  "9.50" , "买入"],
          ["0600597", "食品饮料", "2013-10-30", "21.64", "27.00", "买入"],
          ["0600637", "传媒娱乐", "2013-10-30", "38.78", "45.00", "买入"],
          ["0600699", "汽车类",   "2013-10-30", "13.62", "17.00", "买入"],
          ["0600886", "电力",     "2013-10-30", "4.02",  "5.12" , "买入"],
          ["0600837", "证券类",   "2013-10-30", "11.75", "14.62", "买入"],
          ["1002185", "半导体",   "2013-10-29", "10.94", "14.20", "买入"],
          ["0600518", "医药",     "2013-10-29", "19.48", "22.50", "买入"],
          ["1002572", "家居用品", "2013-10-29", "20.78", "23.90", "买入"],
          ["1002631", "家居用品", "2013-10-29", "12.09", "14.50", "买入"],
          ["1002565", "造纸",     "2013-10-29", "16.54", "19.85", "买入"],
          ["1002604", "食品饮料", "2013-10-29", "20.17", "25.60", "买入"],
          ["0600305", "食品饮料", "2013-10-28", "16.63", "20.80", "买入"],
          ["1002612", "纺织服装", "2013-10-28", "23.93", "27.90", "买入"],
          ["1002303", "造纸",     "2013-10-28", "20.21", "24.25", "买入"],
          ["1002305", "房地产",   "2013-10-28", "7.94",  "10.32", "买入"],
          ["1002048", "汽车类",   "2013-10-28", "8.24",  "10.20", "买入"],
          ["0600805", "综合类",   "2013-10-28", "10.30", "13.30", "买入"],
          ["0600403", "煤炭",     "2013-10-28", "9.34",  "11.90", "买入"],
          ["0600674", "电力",     "2013-10-28", "11.47", "14.14", "买入"],
          ["1002683", "化工",     "2013-10-28", "28.12", "35.00", "买入"],
          ["1002396", "通信设备", "2013-10-25", "17.25", "36.00", "买入"],
          ["1300055", "环境保护", "2013-10-25", "37.00", "49.00", "买入"], 
          ["1000669", "供气供热", "2013-10-25", "31.95", "40.33", "买入"],
          ["1002284", "汽车类",   "2013-10-25", "8.74",  "10.80", "买入"],
          ["1002410", "软件服务", "2013-10-25", "29.83", "38.18", "买入"],
          ["1002022", "医药",     "2013-10-25", "15.26", "18.30", "买入"],
          ["1002448", "运输设备", "2013-10-25", "13.27", "16.50", "买入"],
          ["0600741", "汽车类",   "2013-10-25", "10.62", "13.65", "买入"],
          ["1002286", "食品饮料", "2013-10-25", "16.86", "18.90", "买入"],
          ["1000726", "纺织服饰", "2013-10-25", "8.95",  "11.60", "买入"],
          ["1300315", "互联网",   "2013-10-25", "28.60", "35.00", "买入"],
          ["1002376", "电脑设备", "2013-10-25", "10.76", "13.25", "买入"],
          ["0600050", "电信运营", "2013-10-25", "3.44",  "4.00" , "买入"],
          ["0600761", "工程机械", "2013-10-24", "10.22", "12.00", "金股"],
          ["1002462", "商业连锁", "2013-10-24", "14.99", "20.00", "金股"],
          ["0601222", "电气仪表", "2013-10-24", "25.52", "29.70", "买入"],
          ["1300257", "通用机械", "2013-10-23", "35.85", "45.00", "买入"],
          ["1300128", "元器件",   "2013-10-23", "10.90", "12.00", "买入"],
          ["1002230", "软件服务", "2013-10-22", "48.86", "58.63", "金股"],
          ["0601799", "汽车类",   "2013-10-22", "12.78", "14.00", "买入"],
          ["1300074", "通信设备", "2013-10-22", "32.70", "38.85", "买入"],
          ["1300258", "汽车类",   "2013-10-21", "11.88", "14.50", "买入"],
          ["1002138", "元器件",   "2013-10-21", "16.56", "19.80", "买入"],
          ["1300005", "纺织服装", "2013-10-21", "16.25", "22.50", "买入"],
          ["1002251", "商业连锁", "2013-10-18", "14.78", "16.50", "买入"],
          ["1300144", "旅游",     "2013-10-18", "19.65", "21.32", "买入"],
          ["1002126", "汽车类",   "2013-10-18", "7.87",  "9.45" , "买入"],
          ["0600828", "商业连锁", "2013-10-16", "5.99",  "6.75" , "买入"],
          ["0600138", "旅游",     "2013-10-16", "18.40", "21.00", "买入"],
          ["1300299", "软件服务", "2013-10-15", "18.42", "20.00", "买入"],
          ["1300287", "软件服务", "2013-10-15", "33.50", "40.20", "买入"],
          ["1300253", "软件服务", "2013-10-14", "57.75", "70.00", "买入"],
          ["1002521", "造纸",     "2013-10-14", "8.61",  "9.80" , "买入"],
          ["1002063", "软件服务", "2013-10-14", "19.50", "30.00", "买入"],
          ["1300094", "农林牧渔", "2013-10-14", "7.37",  "8.40" , "买入"],
          ["1002313", "通信设备", "2013-10-14", "19.96", "20.00", "买入"]
        );
        
      var gdzqUrl = urlMake(indexArr, hqArr);
          
      emptyTableMake("gdzq", hqArr);
      doJsonp(gdzqUrl, stockArrayMake, 20000);

      var nowTime = new Date();
      if(nowTime.getHours() >= 9 && nowTime.getHours() <= 15) {
        setInterval("doJsonp(gdzqUrl, stockArrayMake, 20000)", "5000");
      }
    </script>


<?php
  require '../module/footer.php';
?>
