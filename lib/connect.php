<?php
include 'adodb5/adodb.inc.php';
include 'function.php';

$db = NewADOConnection('mysql');
$db->Connect("localhost", "root", "", "webpet");
if (!$db->isConnected()){
    print_pre("database is not connect");
}else{
    // print_pre("database is connected");
}
