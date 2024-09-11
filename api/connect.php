<?php

// variable=mysqli_connect("hostname","database username","database password","database name")or die("comment to be displayed if function fails");
    $connect = mysqli_connect("localhost","root","","voting") or die("connection failed!");
//to check if connected or not
// if($connect){
//     echo "connected!"; 
// }
// else{
//     echo "not connected!";
// }
//echo is like print

?>