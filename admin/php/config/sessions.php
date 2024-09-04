<?php
session_start();

 # validating session
if (strlen($_SESSION['aid']) < 1) {
  header('Location: index.php');
}