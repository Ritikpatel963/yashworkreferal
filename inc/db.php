<?php
session_start();
$conn = new mysqli("localhost", "root", "", "manjeet");

if (!$conn) {
    die("Mysql Not Connected");
}
