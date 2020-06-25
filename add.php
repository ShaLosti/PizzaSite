<?php
    include('config/db_connect.php');
    
    $title = $email = $ingredients = '';
    $errors = array('email' =>'', 'title' =>'', 'ingredients' => '');

    if(isset($_POST['submit'])){

        //check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br>';
        }
        else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be valid email address';
            }
        }
        if(empty($_POST['title'])){
            $errors['title'] = 'An title is required <br>';
        }
        else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'title must be letters and spaces only'; 
            }
        }
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'An ingredients is required <br>';
        }
        else{
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be a comma separated list'; 
            }        
        }
        if(!array_filter($errors)){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // create sql
            $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
            
            // save to db and check

            if(mysqli_query($conn, $sql)){
                header('location: index.php');
            } else{
                echo 'query error' . mysqli_error($conn);
            }
        }
    }//end POST check
?>

    <?php require 'templates/header.php' ?>
    
    <section class="container grey-text">
        <h4 class="center">Add a pizza</h4>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="white">
            <label>Your Email</label>
            <input type="text" name="email" value="<?= htmlspecialchars($email)?>">
            <div class="red-text"><?= $errors['email']?></div>
            <label>Pizza title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($title)?>">
            <div class="red-text"><?= $errors['title']?></div>
            <label>Ingredients (comma separated)</label>
            <input type="text" name="ingredients" value="<?= htmlspecialchars($ingredients)?>">
            <div class="red-text"><?= $errors['ingredients']?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
        <!-- <?= htmlspecialchars($_COOKIE['cookietext']) ?? 'Unknown' ?> -->
    </section>

    <?php require 'templates/footer.php' ?>