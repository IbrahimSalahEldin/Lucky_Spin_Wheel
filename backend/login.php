<?php


if(isset($_GET["errors"])){

            $errors = json_decode($_GET["errors"], true);
    
        }
        if(isset($_GET["old"])){
   
            $old_data = json_decode($_GET["old"], true);
   
        }

        if (isset($_GET['errors'])) {
          $error_message = urldecode($_GET['errors']);
      
          
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form action="validation.php" method="post">
          <span class="text-danger"> <?php  echo $error_message; ?> </span>
            <!-- Email input -->
            <div class="form-outline mb-4">
            <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
            <input type="email" class="form-control" name="email" id="email"  value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>" placeholder="Enter your email">
              <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
            <span class="text-danger"> <?php if(isset($errors['password'])) echo $errors['password']; ?> </span>
            <input type="password" class="form-control" name="password"  value="<?php if(isset($old_data['password'])) echo $old_data['password']; ?>"  id="password" placeholder="Enter your password">
              <label class="form-label" for="form2Example2">Password</label>
            </div>

          
            <input type="submit" value="submit" class="btn btn-primary btn-block mb-4"/>

          </form>
       
        </div>
      </div>
    </div>
  </div>
</section>



</body>
</html>