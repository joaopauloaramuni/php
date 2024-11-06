<?php

define("BASE_URL", "http://127.0.0.1/");	 //URL principal do site
define("ADMIN_EMAIL", "rafael.lott2@gmail.com"); //Email do proprietário do site

//BANCO DE DADOS
define("USER", "root");
define("PASSWORD", "");
define("DB_NAME", "db_djquintao");

if (mysql_connect("", USER, PASSWORD))
mysql_select_db(DB_NAME);
else
die;

?>