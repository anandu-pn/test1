<?php
require 'connect.php';
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']=true){

    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
        <h1>welcom admin</h1>
        
    </body>
    </html>
    ";
    //session_destroy();

}
else{
    echo "permission denied";
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
    <script>
        const name=/^[A-Z][a-z]*(\s[A-Z][a-z]*)*$/;
        const roll=/^\d{4}$/;
        const password=/^.{2,8}$/;
        //const subj=/^[a-zA-Z]$/;
        const mark=/^(?:\d{1,2}|100)$/;

        function validate1(event){
            var roll1=document.getElementById('roll').value;
            var name1=document.getElementById('name').value;
            var password1=document.getElementById('pass').value;
            if(name1=='' || roll1=='' || password1==''){
                alert('Fill all the fileds');
                return false;
            }
            if(!(roll.test(roll1))){
                alert("Please enter correct roll number");
                return false;
            }
            if(!(password.test(password1))){
                alert("Please enter correct password number");
                return false;
            }
            if(!(name.test(name1))){
                alert("Please enter correct name");
                return false;
            }
            alert('success');
            return true;
        }
        function validate2(event){
            var mark2=document.getElementById('mark').value;
            var roll2=document.getElementById('roll1').value;
            if(roll2=='' || mark2==''){
                alert('Fill all the fileds');
                return false;
            }
            if(!(roll.test(roll2))){
                alert("Please enter correct roll number");
                return false;
            }
            if(!(mark.test(mark2))){
                alert("Please enter correct mark");
                return false;
            }
            alert('success');
            return true;
        }
    </script>
    <style>
        body{
            background-color: beige;
        }
    </style>
</head>
<body><center>
    <h2>student registration</h2>
    <form action="register.php" method="post" onsubmit="return validate1(event)">
        <label for="username">Roll NO:
            <input type="text" name='roll' id='roll'>
        </label><br>
        <label for="name">Name:
            <input type="text" name='name' id='name'>
        </label><br>
        <label for="password">Password:
            <input type="text" name='pass' id='pass'>
        </label><br>
        <input type="submit" value="Register" name='sub' id='sub'>
    </form>
    <h2>Mark updation</h2>
    <form action="mark.php" method="post" onsubmit="return validate2(event)">
        <label for="roll">Roll:
            <select id="roll1" name="roll1">
                <?php
                $data="SELECT roll FROM user";
                $q=mysqli_query($conn,$data);
                $result=mysqli_num_rows($q);
                if($result){
                    while($row=mysqli_fetch_assoc($q)){
                        if($row['roll']=='admin'){
                            continue;
                        }
                        echo "<option value=\"{$row['roll']}\">{$row['roll']}</option>";
                    }
                }
                ?>
            </select>
        </label>
        <label for="subject">Subject:
            <input type="text" name="subject" id="subject">
        </label>
        <label for="mark">Mark:
            <input type="number" name="mark" id="mark">
        </label>
        <input type="submit" value="submit" name='sub1' id='sub1'>
    </form>
    <h2>Delete user</h2>
    <form action="delete.php" method="post">
        <label for="roll">Roll:
            <select id="roll1" name="roll2">
                <?php
                $data="SELECT roll FROM user";
                $q=mysqli_query($conn,$data);
                $result=mysqli_num_rows($q);
                if($result){
                    while($row=mysqli_fetch_assoc($q)){
                        if($row['roll']=='admin'){
                            continue;
                        }
                        echo "<option value=\"{$row['roll']}\">{$row['roll']}</option>";
                    }
                }
                ?>
            </select>
        <input type="submit" value="submit" name='sub2' id='sub2'>
    </form>

</center>
</body>
</html>