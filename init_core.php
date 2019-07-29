<?php
session_start();
ob_start();

function loggedin() {
  
  if (isset($_SESSION['uid']) &&!empty($_SESSION['uid'])) {
          return true;
    
  }
  else return false;
}

?>