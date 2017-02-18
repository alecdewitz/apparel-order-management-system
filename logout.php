<?php
session_start();

if(isset($_GET['multiple-sessions'])){
  setcookie("multiple_sessions", "true", time() + (10), "/"); //holds true for 10 seconds
  if(session_destroy()) {
      header("Location: ./?multiple_sessions=true&logged_out=true");
  }
}

if(session_destroy()) {
    header("Location: ./?logged_out=true");
}
