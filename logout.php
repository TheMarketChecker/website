<?php
 session_start();

  unset($_SESSION['email']);
  session_regenerate_id(true);
  header("Location:login");
?>