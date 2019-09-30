<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <form action="index.php" method="post">
             <p>Полимерная плёнка ($): <input type = "text" name ="polymer"></p>
             <p>Кровельный бетон ($): <input type = "text" name ="concrete"></p>
             <p>Битум (€): <input type = "text" name ="bitumen"></p>
             <p>Песок (грн): <input type = "text" name ="sand"></p>
             <p>Зарплата рабочего (грн): <input type = "text" name ="salary"></p>
            <p><input type="submit" value = "Посчитать"></p>
        </form>
        <?php
            //Достаю доллар
            $date = date('Ymd');
            $exchange = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&date='.$date.'&json');
            $exchange = json_decode($exchange, true);
            $dollars = $exchange[0]['rate'];
            //Закончил доставать доллар
            
            //Достаю доллар месяц назад
            $date = date('Ymd', strtotime("-1 months"));
            $exchange = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&date='.$date.'&json');
            $exchange = json_decode($exchange, true);
            $dollars_2 = $exchange[0]['rate'];
            //Закончил доставать доллар
            
            
            //Достаю евро
            $date = date('Ymd');
            $exchange = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&date='.$date.'&json');
            $exchange = json_decode($exchange, true);
            $euro = $exchange[0]['rate'];
            //Закончил доставать евро
            
            //Достаю евро месяц назад
            $date = date('Ymd', strtotime("-1 months"));
            $exchange = file_get_contents('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&date='.$date.'&json');
            $exchange = json_decode($exchange, true);
            $euro_2 = $exchange[0]['rate'];
            //Закончил доставать евро
            
            $y = 0;
            
            $temp = $_POST['polymer'];
            if(((is_numeric($temp))) == true && $temp > 0)
            {
                $polymer = $_POST['polymer'] * $dollars;
                $polymer_2 = $_POST['polymer'] * $dollars_2;
            }
            else
            {
                $y = 1;
            }
            
            $temp = $_POST['concrete'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $concrete = $_POST['concrete'] * $dollars;
                $concrete_2 = $_POST['concrete'] * $dollars_2;
            }
            else
            {
                 $y = 1;
            }
            
            $temp = $_POST['bitumen'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $bitumen = $_POST['bitumen'] * $euro;
                $bitumen_2 = $_POST['bitumen'] * $euro_2;
            }
            else
            {
                 $y = 1;
            }
            
            $temp = $_POST['sand'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $sand = $_POST['sand'];
            }
            else
            {
                 $y = 1;
            }
            
            $temp = $_POST['sand'];
            if((is_numeric($temp)) == true && $temp > 0)
            {
                $salary = $_POST['salary'];
            }
            else
            {
                 $y = 1;
            }
            
            
            
            //Посчитал цену рубероида
            $salary = $salary / (22 * 8) / 3.5;
            $ruberoid = $polymer + $concrete + $bitumen + $sand + $salary +(($polymer + $concrete + $bitumen + $sand + $salary) / 5);
            $ruberoid_2 = $polymer_2 + $concrete_2 + $bitumen_2 + $sand + $salary +(($polymer_2 + $concrete_2 + $bitumen_2 + $sand + $salary) / 5);
            //Закончил считать цену рубероида
            
            
            if($y == 1)
            {
                echo 'Данные не введены или введены не верно';
            }
            else
            {
                 echo '<li>'.'К оплате: '.round($ruberoid, 2).'</li>';
                 echo '<li>'.'Цена рубероида в прошлом месяце: '.round($ruberoid_2, 2).'</li>';
            }
            echo '<li>'.'Доллар: '.round($dollars, 2).'</li>';
            echo '<li>'.'Доллар в прошлом месяце: '.round($dollars_2, 2).'</li>';
            echo '<li>'.'Евро: '.round($euro, 2).'</li>';
            echo '<li>'.'Евро в прошлом месяце: '.round($euro_2, 2).'</li>';
        ?>
    </body>
</html>
