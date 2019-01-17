<?php
$conn=new mysqli("localhost","root","","project");
$sql="INSERT INTO BOOKS VALUES(1233,'Algorithm','Sahani','CENGAGE',5,'shelf 2','Yes',3,200,4),
                              (1234,'Databases','Navathe','Sahil',4,'shelf 1','Yes',2,400,5),
                              (1235,'Data Structures','Coremen','Arora',8,'shelf 2','No',3,250,4),
                              (1236,'Mathematics','R K Jain','EG Ltd.',10,'shelf 5','No',7,1000,3),
                              (1237,'Optics','Ajoy Ghatak','Ajay Kumar',12,'shelf 3','No',3,270,3)";
$conn->query($sql);
?>
