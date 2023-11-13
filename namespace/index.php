<?php

require_once ('apple/user.php');
require_once ('android/user.php');
require_once ('pc/user.php');

use Apple\User as Mac;
use Pc\User as Pc;
use Android\User as Android;

$mac = new Mac();
$pc = new Pc();
$samsung = new Android();