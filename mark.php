<?php
require 'connect.php';
if($_POST['sub1']){
    if($_POST['roll1']!='' && $_POST['subject']!='' && $_POST['mark']!=''){
        $roll=$_POST['roll1'];
        $subject=$_POST['subject'];
        $mark=$_POST['mark'];
        if($mark>90)
        $grade='A';
        else if($mark>80)
        $grade='B';
        else if($mark>70)
        $grade='C';
        else if($mark>60)
        $grade='D';
        else
        $grade='F';
        
        $z="INSERT INTO exam1(roll,subject,mark,grade) VALUES ('$roll','$subject','$mark','$grade')";
        $q=mysqli_query($conn,$z);
        if($q){
            echo "<script>
                    alert('Mark updated successfully');
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
?>