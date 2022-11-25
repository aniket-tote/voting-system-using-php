<?php
session_start();
include('connect.php');

$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['rserdata']['id'];

$update_votes=mysqli_query($connect,"UPDATE user SET votes='$total_votes' WHERE ID='$gid'");
$update_user_status=mysqli_query($connect,"UPDATE user SET status=-1 WHERE ID='$gid'");

if($update_votes and $update_user_status){
    $groups=mysqli_query($connect,"SELECT * FROM user WHERE role=2 ");
    $_SESSION['USERDATA']['STATUS']=1;
    $_SESSION['groupsdata']=$groupsdata;
    echo'<script>
    alert("Voted sussessfully");
    window.location="../routes/dashboard.php";
    </script>';
}
else{
    echo'<script>
    alert("Some error occured!");
    window.location="../routes/dashboard.php";
    </script>';
}
