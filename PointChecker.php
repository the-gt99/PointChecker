<?php
/*-----Входные данные-----*/
$arr = ["0.0", "0.4", "4.0", "4.4"];
$free_arr = [];
$points_y = [];
$points_x = [];

/*---Проверка массивов---*/
for($i=0;$i<count($arr);$i++){
    $result = explode(".",$arr[$i]);
    array_push($points_y,$result[0]);
    array_push($points_x,$result[1]);
}

$count = count($points_x);
if($count != count($points_y)) exit('Массивы имеют разный размер!');

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////Line////////////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*-----------------Result - arr(area,round,point_(1-2),text)------------------*/
/*----------------------------------------------------------------------------*/
function Line($points_x,$points_y,$all_Line){
    global $count,$free_arr;
    for($i=0;$i < $count;$i++){
        $x1 = $points_x[$i];
        $y1 = $points_y[$i];
        
        for($j=$i+1; $j < $count;$j++) {
            $x2 = $points_x[$j];
            $y2 = $points_y[$j];
            
            $distance = sqrt((($x2-$x1)*($x2-$x1))+(($y2-$y1)*($y2-$y1)));
            
            if($all_Line){
                $point_1 = ["x" => $x1, "y" => $y1];
                $point_2 = ["x" => $x2, "y" => $y2];
                $arr = ["max" => $distance, "point_1" => $point_1, "point_2" => $point_2];
                $index++; 
                $info = ["Info_$index"=> $arr];
                $free_arr = array_merge($free_arr,$info);
            }
            
            if($distance>$max){
                
                $max=$distance;
                $round = round($max);
                $result = "----------line----------------<br>
                Distance: = $round<br><br>
                Point1:[$x1][$y1]<br>
                Point2:[$x2][$y2]<br>
                ----------line----------------<br><br>";
            }
        }
    }
$point_1 = ["x" => "$x1", "y" => "$y1"];
$point_2 = ["x" => "$x2", "y" => "$y2"];

$return = [
"distance" => "$max",
"round" => "$round",
"point_1" => $point_1,
"point_2" => $point_2,
"text" => "$result"];
return $return;
}

////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Triangle//////////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*--------------------Result - arr(area,point_(1-3),text)---------------------*/
/*----------------------------------------------------------------------------*/
function Triangle($points_x,$points_y,$all_Triangle){
    global $count,$free_arr; 
    for($i=0;$i<$count;$i++){
        $x1 = $points_x[$i];
        $y1 = $points_y[$i];
        for($j=$i+1;$j<$count;$j++){
            $x2 = $points_x[$j];
            $y2 = $points_y[$j];
            for($k=$j+1;$k<$count;$k++){
                $x3 = $points_x[$k];
                $y3 = $points_y[$k];
                
                $distanceA = sqrt((($x3-$x2)*($x3-$x2))+(($y3-$y2)*($y3-$y2)));
                $distanceB = sqrt((($x2-$x1)*($x2-$x1))+(($y2-$y1)*($y2-$y1)));
                $distanceC = sqrt((($x1-$x3)*($x1-$x3))+(($y1-$y3)*($y1-$y3)));
                
                $p = ($distanceA+$distanceB+$distanceC)/2;
                
                $s = sqrt($p*($p-$distanceA)*($p-$distanceB)*($p-$distanceC));
                
                if($all_Triangle){
                    $point_1 = ["x" => $x1, "y" => $y1];
                    $point_2 = ["x" => $x2, "y" => $y2];
                    $point_3 = ["x" => $x3, "y" => $y3];
                    
                    $arr = ["max" => $s, "point_1" => $point_1, "point_2" => $point_2, "point_3" => $point_3];
                    $index++; 
                    $info = ["Info_$index"=> $arr];
                    $free_arr = array_merge($free_arr,$info);
                }
                    
                if($s > $max){
                    $max = $s;
                    $result = "----------Triangle----------<br>
                    Area = $max<br><br>
                    Point1:[$x1][$y1]<br>
                    Point2:[$x2][$y2]<br>
                    Point3:[$x3][$y3]<br>
                    ----------Triangle----------<br><br>";
                }
            }
        }
    }
$point_1 = ["x" => "$x1", "y" => "$y1"];
$point_2 = ["x" => "$x2", "y" => "$y2"];
$point_3 = ["x" => "$x3", "y" => "$y3"];

$return = [
"area" => "$max",
"point_1" => $point_1,
"point_2" => $point_2,
"point_3" => $point_3,
"text" => "$result"];

return $return;
}

////////////////////////////////////////////////////////////////////////////////
///////////////////////////////Square///////////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*--------------------Result - arr(area,point_(1-4),text)---------------------*/
/*----------------------------------------------------------------------------*/
function Square($points_x,$points_y){
    global $count;    
    $return = 'Квадрат не обнаружен';
    
    for($i=0;$i<$count;$i++){
        $x1 = $points_x[$i];
        $y1 = $points_y[$i];
        
        for($j=0;$j<$count;$j++){
            $x2 = $points_x[$j];
            $y2 = $points_y[$j];  
            
            for($k=0;$k<$count;$k++){
                $x3 = $points_x[$k];
                $y3 = $points_y[$k];
                
                for($l=0;$l<$count;$l++){
                    $x4 = $points_x[$l];
                    $y4 = $points_y[$l];   
                
                    $distanceA = sqrt((($x4-$x3)*($x4-$x3))+(($y4-$y3)*($y4-$y3)));
                    $distanceB = sqrt((($x3-$x2)*($x3-$x2))+(($y3-$y2)*($y3-$y2)));
                    $distanceC = sqrt((($x2-$x1)*($x2-$x1))+(($y2-$y1)*($y2-$y1)));
                    $distanceD = sqrt((($x1-$x4)*($x1-$x4))+(($y1-$y4)*($y1-$y4)));
                    
                    if($distanceA == $distanceB and $distanceA == $distanceC and $distanceA == $distanceD){
                        $VectorPoint_x_1 = $x1-$x2;
                        $VectorPoint_x_2 = $x2-$x3;
                        $VectorPoint_x_3 = $x3-$x4;
                        $VectorPoint_x_4 = $x4-$x1;
                        
                        $VectorPoint_y_1 = $y1-$y2;
                        $VectorPoint_y_2 = $y2-$y3;
                        $VectorPoint_y_3 = $y3-$y4;
                        $VectorPoint_y_4 = $y4-$y1;
                        
                        $Test1 = ($VectorPoint_x_1*$VectorPoint_x_2)+($VectorPoint_y_1*$VectorPoint_y_2);
                        $Test2 = ($VectorPoint_x_2*$VectorPoint_x_3)+($VectorPoint_y_2*$VectorPoint_y_3);
                        $Test3 = ($VectorPoint_x_3*$VectorPoint_x_4)+($VectorPoint_y_3*$VectorPoint_y_4);
                        $Test4 = ($VectorPoint_x_4*$VectorPoint_x_1)+($VectorPoint_y_4*$VectorPoint_y_1);
                        
                        $s = ($distanceA*$distanceA);
                        
                        
                        if($Test1 == 0 and $Test2 == 0 and $Test3 == 0 and $Test4 == 0 and $s > $max){
                            $max = $s;
                            $result = "----------Square------------<br>
                            Area = $max<br><br>
                            Point1:[$x1][$y1]<br>
                            Point2:[$x2][$y2]<br>
                            Point3:[$x3][$y3]<br>
                            Point4:[$x4][$y4]<br>
                            ----------Square------------<br><br>";
                        }
                    }
                }
            }
        }
    }
$point_1 = ["x" => "$x1", "y" => "$y1"];
$point_2 = ["x" => "$x2", "y" => "$y2"];
$point_3 = ["x" => "$x3", "y" => "$y3"];
$point_4 = ["x" => "$x4", "y" => "$y4"];

$return = [
"area" => "$max",
"point_1" => $point_1,
"point_2" => $point_2,
"point_3" => $point_3,
"point_4" => $point_4,
"text" => "$result"];

return $return;
} 

////////////////////////////////////////////////////////////////////////////////
/////////////////////////////All_Objects////////////////////////////////////////
/*----------------------------------------------------------------------------*/
/*-------------------------------Result - message-----------------------------*/
/*----------------------------------------------------------------------------*/
function All_Objects($max,$name,$points_x,$points_y){
    global $free_arr;
    
    $up = "----------$name----------------<br>";
    $down = "<br><br>----------$name----------------<br><br>";

    for($i=0;$i<count($free_arr);$i++){
        $max_from_arr = $free_arr['Info_'.$i]['max'];
        if("$max" == "$max_from_arr"){
            if($name == 'Line'){
                $distance = $free_arr['Info_'.$i]['max'];
                    
                $x1 = $free_arr['Info_'.$i]['point_1']['x'];
                $x2 = $free_arr['Info_'.$i]['point_2']['x'];
                    
                $y1 = $free_arr['Info_'.$i]['point_1']['y'];
                $y2 = $free_arr['Info_'.$i]['point_2']['y'];
                    
                $result = $result."<br>Distance:$distance<br>
                Point1:[$x1][$y1]<br>
                Point2:[$x2][$y2]<br>";
                    
            }elseif($name == 'Triangle'){
                $area = $free_arr['Info_'.$i]['max'];
                    
                $x1 = $free_arr['Info_'.$i]['point_1']['x'];
                $x2 = $free_arr['Info_'.$i]['point_2']['x'];
                $x3 = $free_arr['Info_'.$i]['point_3']['x'];
                    
                $y1 = $free_arr['Info_'.$i]['point_1']['y'];
                $y2 = $free_arr['Info_'.$i]['point_2']['y'];
                $y3 = $free_arr['Info_'.$i]['point_3']['y'];
                    
                $result = $result."<br>Area:$area<br>
                Point1:[$x1][$y1]<br>
                Point2:[$x2][$y2]<br>
                Point3:[$x3][$y3]<br>";    
            }
        } 
    }
    
$return = $up.$result.$down;
return $return;
}


$Triangle = Triangle($points_x,$points_y,1);
$max = $Triangle['area'];
echo(All_Objects($max,'Triangle',$points_x,$points_y));

$Line = Line($points_x,$points_y,1);
$max = $Line['distance'];
echo(All_Objects($max,'Line',$points_x,$points_y));


?>