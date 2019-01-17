<?php
  $conn = new mysqli("localhost","root","","project");
  $enroll = $_POST['id'];
  $sql = "select * from students where id=$enroll;";
  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
    echo "false";
  }
  else {
    echo "true";
  }
 ?>
