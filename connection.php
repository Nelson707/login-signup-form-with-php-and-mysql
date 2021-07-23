<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "10977";
$dbname = "login";

if(!$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Error! failed to conect");
}