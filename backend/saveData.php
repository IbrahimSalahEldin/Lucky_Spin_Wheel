<?php
include 'connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';


$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gift = $_POST["gift"];

$errors =[];
$formdata = [];

if(empty($name) and isset($name)){

    $errors['name']='name required';
}else{
    $formdata["name"]= $name;
}

if(empty($email) and isset($email)){

    $errors['email']='email required';
}else{
    $formdata["email"]= $email;
}


if(empty($phone) and isset($phone)){

    $errors['phone']='phone required';
}else{
    $formdata["phone"]= $phone;
}

if(empty($gift) and isset($gift)){

    $errors['gift']='gift required';
}else{
    $formdata["gift"]= $gift;
}


if($errors){
    $errors_str= json_encode($errors);

    $url="Location:../index.php?errors={$errors_str}";

    if($formdata){
        $old_data= json_encode($formdata);
        $url .="&old={$old_data}";
    }
    header($url);



$pattern="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

if(preg_match($pattern,$email)){
    $useremail = $_POST["email"];
}else{
echo "<br>"."your email is not valid pz try again";
exit();
}


$errors =[];
$formdata = [];

if(empty($name) and isset($name)){

    $errors['name']='name required';
}else{
    $formdata["name"]= $name;
}

if(empty($email) and isset($email)){

    $errors['email']='email required';
}else{
    $formdata["email"]= $email;
}

if(empty($phone) and isset($phone)){

    $errors['phone']='phone required';
}else{
    $formdata["phone"]= $phone;
}

if(empty($gift) and isset($gift)){

    $errors['gift']='gift required';
}else{
    $formdata["gift"]= $gift;
}

if($errors) {
    $errors_str = json_encode($errors);
    $url = "Location:../index.php?errors={$errors_str}";
    if ($formdata) {
        $old_data = json_encode($formdata);
        $url .= "&old={$old_data}";
    }
    header($url);
}
}else {

    $table = 'users';
    try {
    $db = connect_to_DB($table);
        if ($db){
            $query="Insert INTO `users` (`Name`, `email`, `phone`, `gift`) Values(:username,:useremail,:userphone,:usergift)";
            $stmt=$db->prepare($query);
            $stmt->bindParam(":username", $name, PDO::PARAM_STR);
            $stmt->bindParam(":useremail", $email, PDO::PARAM_STR);
            $stmt->bindParam(":userphone", $phone, PDO::PARAM_STR);
            $stmt->bindParam(":usergift", $gift, PDO::PARAM_STR);
            $stmt->execute();
            var_dump($stmt->rowCount());
            var_dump($db->lastInsertId());
            header("Location:../index.php");
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
