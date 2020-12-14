<?php
session_start();
if(isset($_SESSION['email'])) {
    session_destroy();
    header("location: index.php");
} else {
    echo "<script>
        alert('This action is prohibited!');
        window.location.replace('index.php');
    </script>";
}
?>