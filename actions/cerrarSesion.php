<?php
session_start(); 
session_unset(); 
session_destroy(); 

header("Location: /Proyecto-Web-ClienteServidor/login.php"); 
exit();