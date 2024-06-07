<?php

class database
{
  const HOST = 'localhost';

  const USERNAME = 'root';

  const PASSWORD = '';

  const DB = 'quanlikho';

  public function connect()
  {
    $conn = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB);
    if (mysqli_connect_errno() == 0) {
      return $conn;
    }
    return false;
  }

}

?>