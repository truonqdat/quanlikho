<?php
class SessionMiddleware
{
  public function checkSession()
  {
    return isset($_SESSION['admin']);
  }
}