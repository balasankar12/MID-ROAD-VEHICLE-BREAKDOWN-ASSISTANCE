<?php
 $errors = array();

    if (isset($_POST['submit'])) { 
        include('connection.php');
        if($_POST['approval']==1){
            $sql1="update helperservice_details set status=1 where hs_id={$_GET['id']}";
            if ($conn->query($sql1)==TRUE){
                echo "<script>alert('Approved');
                window.location.href='adminhome.php';
                </script>"; 
            }else{
                echo "<script>alert('Failed');
                window.location.href='adminhome.php';
                </script>";
            }
        }
        else{
            $sql1="delete from helperservice_details where hs_id={$_GET['id']}";
            if ($conn->query($sql1)==TRUE){
                echo "<script>alert('Rejected');
                window.location.href='adminhome.php';
                </script>"; 
            }else{
                echo "<script>alert('Failed');
                window.location.href='adminhome.php';
                </script>";
            }
        }
    }
        
?>