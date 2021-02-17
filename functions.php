<?php
include "db.php";

function escape($string)
{
  global $connection;

  return mysqli_real_escape_string($connection, $string);
}

function reportContact($username, $email, $subject)
{
  global $connection;

  $query = "INSERT INTO contactform VALUES('','$username','$email','$subject')";
  $result = mysqli_query($connection, $query);
  if (!$result)
    return false;
  else
    return true;
}
