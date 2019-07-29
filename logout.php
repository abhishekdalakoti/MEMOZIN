<?php
include 'functions.php';
include 'sqlconnect.php';
require 'init_core.php';
check("walkout",$c,$_SESSION['uid']);
session_destroy();

header('Location: index');

?>