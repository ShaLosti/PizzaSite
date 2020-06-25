<?php

    class User {

        private $email;
        private $name;

        public function __construct($name='', $email='', $password = ''){
            $this->email = $email;
            $this->name = $name;
            $this->psw = $password;
        }

        public function userOutPut(){
            echo $this->name . ' ' . $this->email;
        }

        public function getName(){
            return $this->name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPsw(){
            return $this->psw;
        }

        public function setName($name){
            if(is_string($name) && strlen($name)>1){
                $this->name = $name;
                return true;
            }
            else{
                return false;
            }
        }

        public function setEmail($email){
            if(strlen($email)>1){
                $this->email = $email;
                return true;
            }
            else{
                return false;
            }
        }

        public function setPsw($psw){
            if(strlen($psw)>1){
                $this->psw = $psw;
                return true;
            }
            else{
                return false;
            }
        }
    }

    $user = new User();

    $errors = array('userLogin' =>'', 'userPsw' =>'', 'userEmail' =>'');

    if(isset($_POST['loginSubmit'])){

        //check login
        if(empty($_POST['userLogin'])){
            $errors['userLogin'] = 'An login is required <br>';
        }
        else{
            $user->setName($_POST['userLogin']);
            if(!preg_match('/^[a-zA-Z\s]+$/',$user->getName())){
                $errors['userLogin'] = 'Login must be valid login address';
            }
        }
        if(empty($_POST['userPsw'])){
            $errors['userPsw'] = 'An password is required <br>';
        }
        else{
            $user->setPsw($_POST['userPsw']);
            if(!preg_match('/[a-zA-Z0-9]{4,}/', $user->getPsw())){
                $errors['userPsw'] = 'Password must be letters and spaces only'; 
            }
        }
        if(!array_filter($errors)){
            // $email = mysqli_real_escape_string($conn, $_POST['userLogin']);
            // $title = mysqli_real_escape_string($conn, $_POST['userPsw']);
            
            // // create sql
            // $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";
            
            // // save to db and check

            // if(mysqli_query($conn, $sql)){
            //     header('location: includes/login.inc.php');
            // } else{
            //     echo 'Query error' . mysqli_error($conn);
            // }
        }
    }

?>

<?php require 'templates/header.php' ?>

<section class="container grey-text">
        <h4 class="center">Log in</h4>
        <form action="#" name='loginForm' method="POST" class="white">
            <label>Login</label>
            <input type="text" name="userLogin" value="<?= htmlspecialchars($user->getName())?>" placeholder="Login">
            <div class="red-text"><?= $errors['userLogin']?></div>
            <label>E-mail</label>
            <input type="text" name="userEmail" value="<?= htmlspecialchars($user->getEmail()) ?>" placeholder="E-mail">
            <div class="red-text"><?= $errors['userEmail']?></div>
            <label>Password</label>
            <input type="password" name="userPsw" value="<?= htmlspecialchars($user->getPsw()) ?>" placeholder="Password">
            <div class="red-text"><?= $errors['userPsw']?></div>
            <label>Repeat password</label>
            <input type="password" name="userPsw" value="" placeholder="Repeat password">
            <div class="red-text"><?= $errors['userPsw']?></div>
            <div class="center">
                <input type="submit" name="loginSubmit" value="Log in" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

<script>
var loginBox = document.signupForm.userLogin;
var pswBox = document.signupForm.userPsw;
 
function onblur(e){
    // получаем новое значение
    var val = e.target.value;
    if(e.target.name=='userPsw')
    {
        var myRe = new RegExp("[a-zA-Z0-9]{4,}");
        pswBox.style.borderColor = myRe.test(val) ? "green" : "red";
    }
    else
    {
        var myRe = new RegExp("^[a-zA-Z\s]+$");
        loginBox.style.borderColor = myRe.test(val) ? "green" : "red";
    }
}

loginBox.addEventListener("blur", onblur);
pswBox.addEventListener("blur", onblur);
</script>


<?php include 'templates/footer.php' ?>
