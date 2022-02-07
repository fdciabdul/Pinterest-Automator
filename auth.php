<?php
session_start();
if(isset($_POST['email'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $_POST['email'];
        echo "<script>alert('sukses login');</script>";
        echo "<script>window.location.assign('index.php');</script>";
}else {
		echo "<script>alert('login dulu gan');</script>";
            echo "<script>window.location.assign('login.php');</script>";
}