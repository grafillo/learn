<?php
$arr = 'аывавыаываываыв';
$result = [];

echo $arr[1];
foreach ($arr as $value){

    if(array_key_exists('first', $result)){
            $result[$value]++;
    }else{
        $result[$value]=1;
    }

}

echo '<pre>';
print_r($result);
echo '/<pre>';

