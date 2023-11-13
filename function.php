<?php

function summa(float $first = 1, $second = 8.5): float
{
    $result = $first + $second;
    return $result;
}

echo summa(2.5);

function summaEl(...$items)
{
    foreach ($items as $v) {
        echo "$v<br />\n"; // выводим элемент
    }
}

echo summaEl(2.5, 2.5);

echo 'Global<br>';
$var = 5;
function summaGlob()
{
    global $var;
    $var += 5;
    echo $var;
}

summaGlob();
echo $var.'вне функции<br>';


function staticFunc()
{
    static $var;
    $var += 1;
    echo $var;
}

staticFunc();
staticFunc();

$call = 5;
function callSelf($call)
{
    if ($call > 0) {
        echo $call."<br>";
        $call--;
        callSelf($call);
    }

}

callSelf($call);

$array = [
    'title' => 'director',
    'name'  => 'sviatoclav',
    'sub'   => [
        'title' => 'zam',
        'name'  => 'vova',
        'sub'   => [
            [
                [
                    'title' => 'nach otdela1',
                    'name'  => 'vova',
                    'sub'   => [
                        [
                            'title' => 'manager',
                            'name'  => 'sergei',
                            'sub'   => []
                        ],
                        [
                            'title' => 'manager',
                            'name'  => 'vania',
                            'sub'   => []
                        ]

                    ]
                ],
                [
                    'title' => 'nach otdela2',
                    'name'  => 'fedya',
                    'sub'   => [
                        [
                            'title' => 'manager',
                            'name'  => 'sania',
                            'sub'   => []
                        ],
                        [

                            'sub'   => [],
                            'title' => 'manager',
                            'name'  => 'gosha',

                        ]

                    ]
                ]


            ]
        ]
    ]


];

function diss(array $arr):void
{

    foreach ($arr as $key => $value) {

        if ($key === 'title') {
            echo ' должность:'.$value;
        } elseif ($key === 'name') {

            echo ' имя:'.$value;

        } elseif ($key === 'sub' && ! empty($value)) {
            echo '<br> подчинённые: ';
            diss($value);
        } elseif (is_array($value)){
            diss($value);
        }

    }
}



$structure =[];

function dissArray(array $arr, array &$resultStructure):void
{

        $structure =[];
        foreach ($arr as $key => $value) {

        if ($key === 'title') {
            $structure[$key] = $value;
        } elseif ($key === 'name') {
            $structure[$key] = $value;
            $resultStructure[] = $structure;


        } elseif ($key === 'sub' && !empty($value) || is_array($value)) {

            dissArray($value,$resultStructure);
        }

    }


}

dissArray($array,$structure);
echo '<pre>';
print_r($structure);


