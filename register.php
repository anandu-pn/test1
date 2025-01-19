<?php
require 'connect.php';
if(isset($_POST['sub'])){
    if($_POST['roll']!='' && $_POST['name']!='' && $_POST['pass']!=''){
        $roll=$_POST['roll'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $z="INSERT INTO user(roll,username,pass) VALUES ('$roll','$name','$pass')";
        $q=mysqli_query($conn,$z);
        if($q){
            echo "<script>
                    alert('Student registraton complete');
                    window.location.href=('admin.php');    
                    </script>";
        }
        else{
            echo "<script>
                    alert('Insertion failed');
                    window.location.href=('admin.php'); 
                    </script>";
        }
    }
}
else{
    echo "<script>
                    alert('problem with submit');
                    window.location.href=('admin.php'); 
                    </script>";
}
?>