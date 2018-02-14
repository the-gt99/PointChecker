# PointChecker
Три функции (Line,Triangle,Square).
Line - имеет следущие параметры активации ($points_x,$points_y,$all_Line).
Где $points_x - это масив X кординат всех точек;
$points_y - это масив Y кординат всех точек;
$all_Line - это параметр принимающий значения (1/0). При активации ($all_Line = 1) функция заполнит масив free_arr и позволит в позже найти все линии максиальной длинны.

Сделать это можно следующим кодом:

```php
//php code 
$Line = Line($points_x,$points_y,1);
$max = $Line['distance'];
echo(All_Objects($max,'Line',$points_x,$points_y));
```


