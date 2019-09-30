Условие Лабораторной:
    Вопрос “почем в Одессе рубероид?“ тревожит умы всего бывшего СНГ на протяжении длительного периода времени. Мы должны дать ответ на этот вопрос окончательно и бесповоротно!
  Поскольку Одесса находиться в Украине, а цены на сырье в долларах, для расчетов мы будем пользоваться курсом НБУ. 
  Примем что стоимость рубероида это:
  Стоимость материалов для изготовления рубероида + стоимость работ + 20% наценка предприятия по изготовлению рубероида. (формула 1)
  Материалы импортные(т.е. в баксах или евро), рабочая сила - отечественная(т.е. в грн.).
  Делаем html форму в которую эксперт по изготовлению рубероида заносит цену на материалы для изготовления рубероида (в долларах за квадрат, или евро за квадрат), и зарплату рабочего(в месяц в грн). Для простоты примем, что Среднестатистический рабочий, работает в день 8 часов, обычно рабочих дней в месяце  - 22. т.е.:
  Цена за час рабочего: зарплата рабочего в месяц/(22*8).
  За час рабочий средней ленивости делает 3,5 квадратных метра рубероида. Значит стоимость рабочей силы для изготовления 1кв.м. рубероида = зарплата рабочего в месяц/(22*8)/3.5
	  Для изготовления используем такие материалы:
  полимерная пленка (цена в $)
  кровельный картон(цена в $)
  битум(цена в евро)
  песок(цена в грн )
  Итого:
  У нас 5 полей ввода для удобства считаем что каждая из единиц материала дает 1 кв. метр рубероида. Все переводим в  грн по курсу НБУ и считаем результат в гривнах по формуле 1, и показываем результат пользователю.
  Примечания:
  Курс НБУ берем с сайта НБУ. https://bank.gov.ua/control/uk/publish/article?art_id=38441973
  А конкретнее отсюда https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json
  Делается это примерно так:

  $json = file_get_content(‘https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json’);
  $courses = json_decode($json,true);
	  После этих двух строк в переменной $courses лежит ассоциативный массив с актуальным списком валют, из которого вы без труда можете достать нужный Вам курс. Чтобы посмотреть массив используйте функцию var_dump($courses);

  Для закрепления можно попробовать вывести сколько стоил рубероид месяц назад, или год назад. Разница будет благодаря курсу.

