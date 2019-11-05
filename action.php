<html>
    <head>
        <meta charset="UTF-8">
        <title>Цена рубероида</title>
		<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
		 
    </head>
	<body>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
	</body>
</html>
<?php
            function convert($date = null, $money= 'USD'){
                if($date == null ){
                    $date = date('Ymd');
                }
                $url = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode='
                        .$money.'&date='
                        .$date.'&json';
                $exchange = file_get_contents($url);
                $exchange = json_decode($exchange, true);
                $valuta = $exchange[0]['rate'];
                
                return $valuta;
            }
            
            $dollars = convert();
                    
            $date = date('Ymd', strtotime("-1 months"));
            $dollars_2 = convert($date);
            
            
            
            
            $money = 'EUR';
            $euro = convert(null, $money);
            
            $date = date('Ymd', strtotime("-1 months"));
            $euro_2 = convert($date, $money);
            
            $y = 1;
            
            $temp = $_POST['polymer'];
            if(is_numeric($temp) == true && $temp > 0)
            {
                $polymer = $_POST['polymer'] * $dollars;
                $polymer_2 = $_POST['polymer'] * $dollars_2;
                $y=0;
            }
         
            
            $temp = $_POST['concrete'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $concrete = $_POST['concrete'] * $dollars;
                $concrete_2 = $_POST['concrete'] * $dollars_2;
                $y=0;
            }
            
            
            $temp = $_POST['bitumen'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $bitumen = $_POST['bitumen'] * $euro;
                $bitumen_2 = $_POST['bitumen'] * $euro_2;
            
                $y=0;
            }
           
            
            $sand = $_POST['sand'];
            if(!is_numeric($sand) || $sand > 0)
            {
                $y=1;
            }
         
            
            $temp = $_POST['sand'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $salary = $_POST['salary']; 
                $y=0;
            }
           
            
            
            // -----------------------------------------------------------------start calc  ruberuid 
            $salary = $salary / (22 * 8) / 3.5;
            $sl_send =  (float)$sand + $salary;
            $ruberoid =     ($polymer + $concrete + $bitumen +$sl_send) *1.2;
            $ruberoid_2 =   ($polymer_2 + $concrete_2 + $bitumen_2 + $sl_send) *1.2;
            // ------------------------------------------------------------------end calc  ruberuid             

            
            
            if($y == 1)
            {
                echo "<p class = 'ui small header'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".'Данные не введены или введены не верно'."</p>";
            }
            else
            {
                ?>
				<header class="ui container">
					<h1>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Цена рубероида</h1>
				</header>
				<br>
				<div class="ui container">
                 <p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;К оплате: <?=round($ruberoid, 2)?></li>
                 <p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Цена рубероида в прошлом месяце: <?php echo round($ruberoid_2, 2)?></li>
            <?php }
            ?><p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Доллар: <?php echo round($dollars, 2)?></li>
            <p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Доллар в прошлом месяце: <?php echo round($dollars_2, 2)?></li>
            <p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Евро: <?php echo round($euro, 2)?></li>
            <p class = "ui small header">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Евро в прошлом месяце: <?php echo round($euro_2, 2)?></li></div>
			<form action="index.php" method="post" class="ui container">
			<br>
			
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class = " ui button" type="submit" >Назад</button>
		</form>
