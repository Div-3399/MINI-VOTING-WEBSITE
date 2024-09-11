<?php

session_start();

if (!isset($_SESSION['userdata'])) { //says if userdata present in sessions only then it will be fetched
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupdata'];
if ($_SESSION['userdata']['status'] == 0) {
    $status = '<b style="color:red">Not Voted</b>';
} else {
    $status = '<b style="color:green">Voted</b>';
}


?>
<html>

<head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
</head>

<body>
    <style>
        #backbtn {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            float: left;
            margin: 10px;
        }

        #logoutbtn {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            float: right;
            margin: 10px;
        }

        #Profile {
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }

        #Group {
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;
        }

        #votebtn {
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            float: left;
        }

        #mainPannel {
            padding: 10px;
        }

        #voted{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: green;
            color: white;
            float: left;
        }
    </style>

    <!-- <header>
        <nav>
            <div class="logo">
                <img src="../images/logo.jpg" alt="">
            </div>
            <ul>
                <li><a href="../main.html">Home</a></li>
                <li><a href="../Mini voting.pptx ">About</a></li>
                <li><a href="../routes/register.html">Register</a></li>
                <li><a href="../index.html">Login</a></li>
                 <li><a href="result.html">Result</a></li> 
            </ul>
        </nav>
    </header> -->

    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn"> Back</button></a>
                <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
        </center>
        <hr>
        <div id="mainPannel">
            <div id="Profile">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"></center><br><br>
                <b>Name:</b><?php echo $userdata['name'] ?><br><br>
                <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b><?php echo $userdata['address'] ?><br><br>
                <b>Status:</b><?php echo $status ?><br><br>
            </div>
            <div id="Group">
                <?php
                if (!isset($_SESSION['groupsdatadata'])) {
                    //we have to use loop as there are multiple data arrays here
                    for ($i = 0; $i < count($groupsdata); $i++) {
                ?>
                        <div>
                            <img src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100" style="float: right;">
                            <b>Group Name : </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                            <b>Votes : </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php 
                                    if($_SESSION['userdata']['status']==0)
                                    {?>
                                        <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                    <?php    
                                    }
                                    else{
                                        ?>
                                        <button disabled type="button" name="votebtn" value="Voted" id="voted"></button>
                                        <?php
                                    }
                                ?>
                            </form>
                        </div>
                        <hr>
                        <br><br>
                <?php
                    }
                } else {
                }
                ?>
            </div>
        </div>
    </div>
    <!-- <footer class="flex-all-center">
        <p>Copyright &copy; V-vote</p>
    </footer> -->

</body>

</html>