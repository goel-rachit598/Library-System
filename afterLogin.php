<?php
  //session_start();
  $conn = new mysqli("localhost","root","","project");
  $search = $_POST['search'];
  $categories = $_POST['categories'];
  if($categories == "All")
  {
    $sql = "select * from BOOKS where title REGEXP '$search' or author REGEXP '$search' or publisher REGEXP '$search';";

  }
  else {
    $sql = "select * from BOOKS where $categories REGEXP '$search';";
  }
  $result = $conn->query($sql);

  if($result->num_rows > 0)
  {
      while($row = $result->fetch_assoc()){
      echo $row['title'].",".$row['author'].",".$row['no_of_books_avail'].",".$row['ratings'].",";}
  }
  else
  {
      echo "NO";
  }
 ?>
