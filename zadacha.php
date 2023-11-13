<?php

$array = [
    ['id' => 1, 'name' => 'director', 'parent_id' => null],
    ['id' => 2, 'name' => 'уборщца', 'parent_id' => 1],
    ['id' => 3, 'name' => 'нач отдела', 'parent_id' => 1],
    ['id' => 4, 'name' => 'сотрудник', 'parent_id' => 3],
    ['id' => 5, 'name' => 'сотрудник', 'parent_id' => 2],
    ['id' => 6, 'name' => 'сотрудник', 'parent_id' => 2],
    ['id' => 7, 'name' => 'сотрудник', 'parent_id' => 2],
];




function formatArray(array $array)
{
    $sortAray = [];
    foreach ($array as $value) {

        if ($value['parent_id'] === null) {

            $sortAray[] = $value;
//            $arrayOper = $value;
//            foreach ($array as $children){
//                if ($children['parent_id']==$value['id'])
//                {
//                    $arrayOper['children'][] = $children;
//                    }
//            }
        }
    }

    return $sortAray;
}

;

$sortAray = formatArray($array);
$childrenArray = sortChildren($array);

echo '<pre>';
print_r($sortAray);
echo '/<pre>';
echo '<pre>';
print_r($childrenArray);
echo '/<pre>';

function sortChildren(array $array, $parent = null): array
{

    $sortAray = [];
    foreach ($array as $value) {


        if ($value['parent_id'] === $parent) {
            echo " ребёнок=".$value['parent_id']."родитель=$parent ";

            foreach ($array as $children) {
                if ($children['parent_id'] === $value['id']) {
                    echo $value['id'];
                    $children['children'] = [];
                    $children['children'][] = sortChildren($array,
                        $children['id']);
                    $value['children'][] = $children;

                    $sortAray = $value;

                }
            }

        }
    }
    return $sortAray;
}