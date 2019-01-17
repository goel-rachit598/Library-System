<?php

$conn=new mysqli("localhost","root","","project");

if($conn->connect_error)
    die("connection failed".connect_error());
else {
  echo "connected successfully";
}

$sql="CREATE TABLE BOOKS (isbn int,
                          title varchar(40),
                          author varchar(40),
                          publisher varchar(40),
                          no_of_books_avail int,
                          location varchar(40),
                          pdf_avail varchar(200),
                          available_books int,
                          pages int,
                          ratings int,
                          primary key(isbn)
                        )";
if($conn->query($sql))
  echo "running1";
else
    echo"not running 1";
$sql="CREATE TABLE TAGS(isbn_1 int references BOOKS(isbn), tag varchar(100))";
if($conn->query($sql))
      echo "running2";
else
      echo"not running 1";
?>
