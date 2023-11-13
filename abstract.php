<?php
abstract class AbstractClass
{
    // Данные методы должны быть определены в дочернем классе
    abstract protected function getValue();



}

 class First extends AbstractClass
{

    function getValue(){
        echo "value";
    }

}

class First2 extends First
{



}
//$first1 = new First;
//$first1->getValue();
//$first2 = new First2;
//$first2->getValue();
//




$array = [
    ['id'=>1,'name'=>'director','parent_id'=>null],
    ['id'=>2,'name'=>'уборщца','parent_id'=>1],
    ['id'=>3,'name'=>'нач отдела','parent_id'=>1],
    ['id'=>4,'name'=>'сотрудник','parent_id'=>3],
    ['id'=>5,'name'=>'director2','parent_id'=>null],
    ['id'=>6,'name'=>'сотрудник','parent_id'=>5],
];

$data = array_combine(array_column($array, 'id'), $array);

$treeResult = treeCreator($data, 'parent_id');
$result = array_values($treeResult);



echo "<pre>";
print_r($result);
echo "<pre>";


function treeCreator(array $data, string $field): array
{
    $arr = [];
    foreach ($data as $key => &$node) {
        if (!array_key_exists($node[$field], $data)) {
            $arr[$key] = &$node;
        } else {
            $data[$node[$field]]['childs'][$key] = &$node;
        }
    }
    return $arr;
}

//$map =['id'=>'','name'=>'','parent_id'=>'','children'=>[]];
//
//$final = [];
//foreach ($array as $item) {
//    $map['id'] = $item['id'];
//    $map['name'] = $item['name'];
//    $map['parent_id'] = $item['parent_id'];
//    $final[] = $map;
//}
//
//foreach ($final as &$item) {
//    foreach($final as $key => $item2){
//        if($item['id']===$item2['parent_id']){
//            $item['children'][] = $item2;
//           // unset($final[$key]);
//        }
//    }
//}
//foreach ($final as $key => $item) {
//    if($item['parent_id']!==null){
//        //unset($final[$key]);
//    }
//}
//echo '<pre>';
//print_r($final);
//echo '</pre>';

$pre = 4;
$fre = 7;
Echo ++$pre;
Echo $pre += $fre;


$arr = [
    ['time'=>'5:00','name'=>'Новость4'],
    ['time'=>'24:00','name'=>'Новость3'],
    ['time'=>'7:00','name'=>'Новость6'],
    ['time'=>'8:00','name'=>'Новость1'],
    ['time'=>'22:00','name'=>'Новость2'],
    ['time'=>'6:00','name'=>'Новость5'],
];

$sortArr = [];
foreach ($arr as $value){
   $time = str_replace(':', '', $value['time']);
   if(strlen($time)<4 && $time[0]<8){
       $time = '3'.$time;
   }
    $value['time'] = $time;
    $sortArr[] = $value;
}
usort($sortArr,"cmp");
print_r($sortArr);

function cmp($a, $b)
{
    if ($a['time'] == $b['time']) {
        return 0;
    }
    return ($a['time'] < $b['time']) ? -1 : 1;
}

check('7');
function check(int $a):int{

   return $a;

}


$array = [
              ['id'=>1,'name'=>'director','parent_id'=>null,
             'children'=>[
                       ['id'=>2,'name'=>'уборщца','parent_id'=>1,'children'=>[]],
                       ['id'=>3,'name'=>'нач отдела','parent_id'=>1,'children'=>[
                                                    ['id'=>4,'name'=>'сотрудник','parent_id'=>3, 'children'=>[]]
                                                                                ]
                       ]
                    ]
                ]
            ];