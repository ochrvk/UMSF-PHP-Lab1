<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Цена рубероида</title>
		<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
		 
    </head>
    <body>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
        <header class="ui container">
			<h1>Калькулятор цены рубероида</h1>
		</header>
		
		<form action="action.php" method="post" class="ui container">
			<br>
			<div>
				<h3 class = "ui small header">Полимерная плёнка ($):&emsp;&emsp; <div class="ui small input"><input type = "text" name ="polymer"></div></h3>
				<h3 class = "ui small header">Кровельный бетон ($):&emsp;&emsp;&nbsp;&nbsp;&nbsp; <div class="ui small input"><input type = "text" name ="concrete"></div></h3>
				<h3 class = "ui small header">Битум (€):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<div class="ui small input"><input type = "text" name ="bitumen"></div></h3>
			</div>
			<br>
			<div>
				<h3 class = "ui small header">Песок (грн):&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <div class="ui small input"><input type = "text" name ="sand"></div></h3>
				<h3 class = "ui small header">Зарплата рабочего (грн):&nbsp;&nbsp;&nbsp; &emsp;<div class="ui small input"><input type = "text" name ="salary"></div></h3>
			</div>
			<br>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button class = " ui button" type="submit" >Посчитать</button>
		</form>
    </body>
</html>
