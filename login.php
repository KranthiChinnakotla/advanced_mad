
<?php
$user = htmlspecialchars($_GET["user"]);

function phpAlert($msg){
    echo "<script type=\"text/javascript\"> alert(\"$msg\");</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="en-US" lang="en-US"
      id="htmlRegister">
<head>
    <style>
        #htmlRegister {
            background: url("http://i.stack.imgur.com/7X3An.png");
        }
        h1{
            color: gray;
            margin-left: 30%;
        }
        #credentials{
            background-color: black;
            border-radius: 10px;
            opacity: 0.6;
            position: absolute;
            width: 250px;
            height: 250px;
            z-index: 15;
            top: 20%;
            bottom: 50%;
            margin-left: 30%;
            border: groove;
            border-style: groove;
        }
        .textColors{
            font-weight: bolder;

            color: antiquewhite;
            margin: 3px;
            font-size: 12pt;
        }
        .inputBoxes{
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            font-size:15pt;
            margin: 4px;
            height:40px;
            width:200px;
        }
        #submit {
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            width: 100px; height: 50px;
            font-size: medium;
            margin-left: 55px;
        }

    </style>
</head>
<body>
<h1> LogIn </h1>
<div id="credentials">
    <div id="insider">
        <form method="post"
        <label class="textColors">Email</label><br>
        <input type="text" name = "emailinput" placeholder = "Enter your email" class="inputBoxes" value="<?php echo $user ?>" /><br>
        <label class = "textColors">Password</label><br>
        <input type="password" name="password" placeholder = "Enter password" class="inputBoxes"/><br>
        <br> <input type="submit" name="Submit" value="Submit" id = "submit"/>
        </form>
    </div>

</div>
<?php
/**
 * Created by PhpStorm.
 * User: Prathyusha
 * Date: 8/27/16
 * Time: 7:26 PM
 */
if(isset($_POST["Submit"])){
    $email = $_POST["emailinput"];
    $pass = $_POST["password"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $datbase = "test";

    $conn = new mysqli($servername,$username,$password,$datbase);
    if($conn -> connect_error){
        die("Connection failed: " .$conn->connect_error);
        echo "fail";

    }else{
        //echo "connected";
    }
    $sql = "select * from users where password = '".$pass."' and email = '".$email."'";

    $result = $conn -> query($sql);
    if($result->num_rows > 0){

        while ($row = $result -> fetch_assoc()){
            phpAlert($row["email"]."Logged in successfully");


        }
    }else{
        $selectError = mysqli_error($conn);
        phpAlert("InCorrect Password");
    }
}
?>
</body>
</html>

