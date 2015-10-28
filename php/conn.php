<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/29/15
 * Time: 1:13 AM
 */
$conn = new PDO("mysql:host=localhost;dbname=quiz", "root", "root");
$conn->query("set names 'utf8'");
$conn->query("SET character_set_results=utf8");