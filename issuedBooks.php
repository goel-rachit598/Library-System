<?php
  session_start();
  $id = $_SESSION['id'];
  $conn = new mysqli("localhost","root","","project");
  $sql = "SELECT * FROM BOOKS WHERE isbn IN (SELECT isbn FROM issue_book WHERE id = 17103135);";
  $result = $conn->query($sql);
  $text = '';
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      $state .= $row['title'] .'*'. $row['author'] .'*';
    }
  }
  echo $state;
 ?>
