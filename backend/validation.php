<?php
include 'connect.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>';

echo "<div class='container fs-4'>";
echo "<h1>Save user</h1>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $useremail = $_POST["email"];
    $userpassword = $_POST["password"];

    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

    if (preg_match($pattern, $useremail)) {
        $useremail = $_POST["email"];
    } else {
        echo "<br>" . "Your email is not valid, please try again";
        exit();
    }

    $errors = [];
    $formdata = [];

    if (empty($useremail)) {
        $errors['email'] = 'Email is required';
    } else {
        $formdata["email"] = $useremail;
    }

    if (empty($userpassword)) {
        $errors['password'] = 'Password is required';
    } else {
        $formdata["password"] = $userpassword;
    }

    if ($errors) {
        $errors_str = json_encode($errors);
        $url = "Location:login.php?errors={$errors_str}";

        if ($formdata) {
            $old_data = json_encode($formdata);
            $url .= "&old={$old_data}";
        }
        header($url);
    } else {
       $table ='admin';
        $db = connect_to_DB($table); 
        
        if ($db) {
           
            $query = "SELECT * FROM `admin` WHERE `email` = :email";
            $stmt = $db->prepare($query);
            $stmt->execute(['email' => $useremail]);
            $user = $stmt->fetch();

            if (!$user) {
                $errors_str = 'Email not found';
                $url = "Location:login.php?errors={$errors_str}";
                header($url);
                exit();
            }

           
            if ($userpassword === $user['password']) {
                $url = "Location:dashboard.php";
                header($url);

            } else {
                $errors_str = 'Email or password not correct';
                $url = "Location:login.php?errors={$errors_str}";
                header($url);
                exit();
            }
        } else {
            echo "Failed to connect to the database.";
            exit();
        }
    }
}
?>
