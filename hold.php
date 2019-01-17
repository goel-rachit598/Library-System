<?php
  $conn = new mysqli("localhost","root","","project");
  $id = $_POST['search'];
  $sql = "select * from hold_book where id = $id;";
  //echo $sql;
  $result  = $conn->query($sql);
  echo $result->num_rows;
?>
