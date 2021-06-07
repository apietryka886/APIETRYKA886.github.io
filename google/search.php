<?php
$cities = file_get_contents('C:/Apache24/htdocs/apietryka886.github.io/google/cities.json', true);
$arr = json_decode($cities);
$cityArray =[];
#echo gettype($arr);
$value = htmlspecialchars($_GET["name"]);
foreach ($arr as $city){
    if(stripos($city->name, $value)){
        if(count($cityArray) === 10){
            break;
        }
        array_push($cityArray, $city);
    }
}
$results = json_encode($cityArray);
if(count($cityArray)!= 0){
    echo ($results);
}
?>