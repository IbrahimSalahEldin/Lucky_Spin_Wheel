<?php
if(isset($_GET["errors"])){
            $errors = json_decode($_GET["errors"], true);
        }
        if(isset($_GET["old"])){
            $old_data = json_decode($_GET["old"], true);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Spin</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <a href="backend/login.php" class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</a>

                                <form class="mx-1 mx-md-4" action="backend/saveData.php" method="post" enctype="multipart/form-data">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" value="<?php if(isset($old_data['name'])) echo $old_data['name']; ?>" id="form3Example1c" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                            <span class="text-danger"> <?php if(isset($errors['name'])) echo $errors['name']; ?> </span>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="email" id="form3Example3c" class="form-control"
                                            value="<?php if(isset($old_data['email'])) echo $old_data['email']; ?>"
                                             />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <span class="text-danger"> <?php if(isset($errors['email'])) echo $errors['email']; ?> </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="phone" id="form3Example4c" class="form-control"
                                            value="<?php if(isset($old_data['phone'])) echo $old_data['phone']; ?>" />
                                            <label class="form-label" for="form3Example4c">phone</label>
                                            <span class="text-danger"> <?php if(isset($errors['phone'])) echo $errors['phone']; ?> </span>

                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="gift" id="form3Example4c" class="form-control"
                                            value="<?php if(isset($old_data['gift'])) echo $old_data['gift']; ?>" />
                                            <label class="form-label" for="form3Example4c">gift</label>
                                            <span class="text-danger"> <?php if(isset($errors['gift'])) echo $errors['gift']; ?> </span>

                                        </div>
                                    </div>

                                  

                                  
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" value="submit" class="btn btn-primary btn-lg"/>
                                    </div>

                                </form>


                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/phones/new-templates/bootstrap-registration/draw1.webp"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
