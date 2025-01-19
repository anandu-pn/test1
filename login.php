<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        const user=/^(?:\d{4}|(admin))$/;
        const pass=/^.{2,8}$/;
        function validate(event) {
            //event.preventDefault();
            var pass1=document.getElementById('password').value;
            var user1=document.getElementById('user').value;
            if(user1=='' || pass1==''){
                alert("Please fill all field to continue");
                return false;
            }
            if(!(user.test(user1))){
                alert("Please enter correct roll number");
                return false;
            }
            if(!(pass.test(pass1))){
                alert("Please enter correct password number");
                return false;
            }
            alert('success');
            return true;
        }

    </script>
</head>
<body>
    <center>
        <form action="login.php" method="post" onsubmit="return validate(event)" >
            <label for="username">Roll:
                <input type="text" id='user' name='user'>
            </label><br>
            <label for="password">Password:
                <input type="text" name='password' id='password'>
            </label><br><br>
            <input type="submit" value="Submit" name='sub' is='sub'>
        </form>
    </center>
</body>
</html>
<?php
    require 'connect.php';
    if(isset($_POST['sub'])){
        if($_POST['user']!='' && $_POST['password']!=''){
            $roll=$_POST['user'];
            $pass=$_POST['password'];
            $data="SELECT * FROM user WHERE roll='$roll' AND pass='$pass' ";
            $q=mysqli_query($conn,$data);
            $result=mysqli_num_rows($q);
            if($result){
                session_start();
                $_SESSION['roll']=$roll;
                $_SESSION['status']=true;
                //while($row=mysqli_fetch_assoc($q)){}
                if($roll=='admin'){
                    $_SESSION['admin']=true;
                    echo "<script>
                    alert('Welcome admin');
                    window.location.href=('admin.php');    
                    </script>";
                }
                else{
                    echo "<script>
                    alert('Welcome user');
                    window.location.href=('score.php');    
                    </script>";
                }
                
            }
            else{
                echo "<script>
                    alert('Incorrect password or username');    
                </script>";
            }
        }
        }
?>