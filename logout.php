<?php
session_start();
if(isset($_SESSION['doctor'])){
    $_SESSION['doctor']=null;
    header("Location:doctorlog.php");
}
?>