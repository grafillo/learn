<?php
$arr = ['user1' =>[
    'lasname' => 'Кузнецов',
    'firstname' => 'Иван'
    ],
'user2' =>[
    'lasname' => 'Tokovic',
    'firstname' => 'John'
]
];

$arr = json_encode($arr,JSON_UNESCAPED_UNICODE);
print_r($arr);
file_put_contents('json.txt', $arr);
$arr = file_get_contents('json.txt');
echo ($arr);

$arr = json_decode($arr, true);
echo $arr['user1']['lasname'];



