# PointChecker

### Три функции (**Line**,**Triangle**,**Square**). <br>

**Line** - имеет следущие параметры активации ($points_x,$points_y,$all_Line). <br>
Где $points_x - это масив X кординат всех точек; <br>
$points_y - это масив Y кординат всех точек; <br>
$all_Line - это параметр принимающий значения (1/0). При активации ($all_Line = 1) функция заполнит масив free_arr и позволит в позже найти все линии максиальной длинны. <br>

Сделать это можно следующим кодом:
```php
//php code 
$Line = Line($points_x,$points_y,1);
$max = $Line['distance'];
echo(All_Objects($max,'Line',$points_x,$points_y));
```
после вызова функции в ответ приходит масив cсо следущими ключами:
1. distance
2. round
3. point_1
4. point_2
5. text



**Triangle** - имеет следущие параметры активации ($points_x,$points_y,$all_Triangle). <br>
Где $points_x - это масив X кординат всех точек; <br>
$points_y - это масив Y кординат всех точек; <br>
$all_Triangle - это параметр принимающий значения (1/0). При активации ($all_Line = 1) функция заполнит масив free_arr и позволит в позже найти все линии максиальной длинны. <br>

Сделать это можно следующим кодом:
```php
//php code 
$Triangle = Triangle($points_x,$points_y,1);
$max = $Triangle['area'];
echo(All_Objects($max,'Triangle',$points_x,$points_y));
```
