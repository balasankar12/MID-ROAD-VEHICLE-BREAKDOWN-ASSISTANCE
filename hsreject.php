<?php
 $errors = array();
    if (isset($_POST['submit'])) { 
        include('connection.php');

        $sql1="delete from helperservice_details where hs_id={$_GET['id']}";
        if ($conn->query($sql1)==TRUE){
            echo "<script>alert('DELETED');
            window.location.href='adminhome.php';
            </script>"; 
        }else{
            echo "Failed";
        }
    }   
?>