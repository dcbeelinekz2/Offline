<?php
require "database.php";
$d = file_get_contents("php://input");
$json = json_decode($d, true);
$all_keys  = array_keys($json);
$user_data = $json["me"];
$username = $user_data["username"];
$port = $user_data["port"];
$server_user = $user_data["server_user"];
$server_pass = $user_data["server_pass"];
$ipaddr = $user_data["ipaddr"];
$delete = "DELETE FROM files WHERE ip = \"$ipaddr\"";
$del_result = mysqli_query($link,$delete);
foreach ($all_keys as $key)
{
  if(isset($json[$key]["name"]))
  {
  $name = $json[$key]["name"];
  $hash = $json[$key]["hash"];
  $sql = "INSERT INTO `files`(`name`, `location`, `ip`, `username`, `server_user`, `server_pass`, `port`,`hash`) VALUES (\"$name\",\"$key\",\"$ipaddr\",\"$username\",\"$server_user\",\"$server_pass\",\"$port\",\"$hash\")";
  //echo $sql;
  $result = mysqli_query($link,$sql);
}
}
?>
