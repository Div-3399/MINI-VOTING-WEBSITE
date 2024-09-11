<?php
    include("connect.php") ;
    // to connect files
    //as used post meathod . variable pre defined to fetch data from frontend.
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];//different format contains name of image field.
    $tmp_name = $_FILES['photo']['tmp_name'];//temporary name  'tmp_nam' will not work both variable should have same name.
    $role = $_POST['role'];

    if($password==$cpassword){
        move_uploaded_file($tmp_name,"../uploads/$image");//to move actual image to uploads folder as database is saving name only.
        $insert = mysqli_query($connect, "INSERT INTO user (name,mobile,address,password,photo,role,status,votes) VALUES ('$name','$mobile','$address','$password','$image','$role',0,0)");
        if($insert){
            echo '
                <script>
                    alert("Registration Succesfull!");
                    window.location = "../";
                </script>
            ';
        }
        else{
            echo '
            <script>
                alert("Some error occurred!");
                window.location = "../routes/register.html";
            </script>
        ';
        }
    }
    else{
        echo '
            <script>
                alert("Password and Confirm Password does not match!");
                window.location = "../routes/register.html";
            </script>
        ';
        
    }
