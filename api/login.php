<?php
    session_start();//to activate session variable.
    include ("connect.php") ;

    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role' ");

    if(mysqli_num_rows($check)>0){
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect," SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);//MYSQLI_ASSOC associates, joins all the groups fetched and make a object for all the arrays .
        $_SESSION['userdata'] = $userdata;//user data stored in session variable(global variable).
        $_SESSION['groupdata'] = $groupsdata;//group data stored in session variable(global variable).
        //using session variable these data can be used in dashboard file without including this file unlike we done for  connect.php
        echo '
            <script>
                window.location = "../routes/dashboard.php";
            </script>
        ';


    }
    else{
        echo '
            <script>
                alert("Invalid Credentials or User not found !");
                window.location = "../";
            </script>
        ';
    }

?>