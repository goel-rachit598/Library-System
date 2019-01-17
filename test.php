<?php
$conn=new mysqli("localhost","dbms","12345","project");
if($conn->connect_error)
    die("connection failed".connect_error());
else
  echo "connected successfully<br>";
$sql="CREATE TABLE STUDENT(name varchar(20),
                           enroll int,
                          email varchar(40),
                          dob date,
                          gender varchar(5),
                          hosteller varchar(5),
                          batch varchar(5),
                          address varchar(70),
                          groups varchar(20),
                          phone bigint,
                          primary key(enroll))";
if($conn->query($sql))
      echo "STUDENT TABLE CREATED<br>";
else
      echo"STUDENT TABLE NOT CREATED<br>";
$sql="INSERT INTO STUDENT VALUES('rachit',17103122,'rahcit@hfm','1998-05-05','male','yes','b3','jaypee','fucking',9140681127),
                                ('rachit',17103123,'rahcit@hfm','1998-05-05','male','yes','b3','jaypee','fucking',9140681127),
                                ('rachit',17103124,'rahcit@hfm','1998-05-05','male','yes','b3','jaypee','fucking',9140681129),
                                ('rachit',17103125,'rahcit@hfm','1998-05-05','male','yes','b3','jaypee','fucking',9140681129);";
if($conn->query($sql))
  echo "STUDENT TABLE CREATED<br>";
else
  echo"STUDENT TABLE NOT CREATED<br>"
?>
