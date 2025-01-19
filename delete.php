<?php
    require 'connect.php';
if($_POST['sub2']){
    if($_POST['roll2']!=''){
        $roll=$_POST['roll2'];
        
        $z="DELETE FROM user WHERE roll='$roll'";
        $q=mysqli_query($conn,$z);
        if($q){
            echo "<script>
                    alert('successfully deleted');
                    window.location.href=('admin.php');    
                    </script>";
        }
        else{
            echo "<script>
                    alert('deletion failed');
                    window.location.href=('admin.php'); 
                    </script>";
        }
    }
}
?>