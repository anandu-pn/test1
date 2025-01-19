<?php
require 'connect.php';
session_start();
if(isset($_SESSION['status']) && $_SESSION['status']=true){
    
}
else{
    echo 'permission denied';
    header('Location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>
    <center>
        <h2>Score card</h2>
        <?php
            $roll=$_SESSION['roll'];
            $data="SELECT * FROM exam1 WHERE roll='$roll'";
            $q=mysqli_query($conn,$data);
            $result=mysqli_num_rows($q);
            if($result){
                $total=0;
                $i=0;
                echo '<br><br><table border=\'1px\' width=\'500px\'>
                        <tr>
                            <th>Subject</th>
                            <th>Score</th>
                            <th>Grade</th>
                        </tr>';
                while($row=mysqli_fetch_assoc($q)){
                    echo"<tr>
                            <td>
                                {$row['subject']}
                            </td>
                            <td>
                                {$row['mark']}
                            </td>
                            <td>
                                {$row['grade']}
                            </td>
                        </tr>";
                        $total=$total+$row['mark'];
                        $i=$i+1;
                }
                $i=$i*100;
                echo "</table><br><br><br><br><h3>Your total mark is: {$total} out off {$i}";
            }
            else{
                echo '<br><br><br><br><br><br><h2>No data found!<h2>';
            }

        ?>
    </center>
</body>
</html>