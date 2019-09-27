<?php
include "includes/connection.php";
session_start();
if (isset($_POST['login'])) {
    $empId = ($_POST['empId']);
    $password = ($_POST['password']);
    //insert into logins table
    $logins = mysqli_query($link, "INSERT INTO tbl_logins(empId)VALUES('$empId')") or die(mysqli_query());

    //check if employee exists
    $checkEmp = mysqli_query($link, "SELECT * FROM tbl_employees WHERE empId='" . $empId . "' ") or die(mysqli_error());
    $count = mysqli_num_rows($checkEmp);
    $row = mysqli_fetch_array($checkEmp);
    if ($count == 1) {
        //verify password
        if (password_verify($password, $row['password'])) {
            if (isset($_POST['remme'])) {
                setcookie('user', $empId, time() + 60 * 60 * 24 * 365, '/');
                setcookie('pass', md5($password), time() + 60 * 60 * 24 * 365, '/');
            }
            $_SESSION['employeeId'] = $row['empId'];
            $_SESSION['name'] = $row['name'];
            header("location:cashier/");
        } else {
            $errorMsg = "Wrong Password";
        }
    } elseif ($count > 1) {
        $errorMsg = " Kindly see the admin for error rectification ";
    } else {
        $errorMsg = "you are not allowed to use this system";
    }

}
/***
 *
 * 1.check if user exist
 * 2.verify the details
 * 3.create a cookie
 ***/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/header-scripts.php"; ?>
</head>
<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <?php
            if (isset($errorMsg)) {
                echo "<div class='alert-danger'>";
                echo $errorMsg;
                echo "</div>";
                unset($errorMsg);
            }

            if (isset($_GET['logout'])) {
                echo "<div class='alert-success'>";
                echo "Logout successful.";
                echo "</div>";

            }

            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Employee Id</label>
                    <input class="form-control" type="text" name="empId" placeholder="Employee Id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remme" value="1" type="checkbox"> Remember
                            Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.php">Register an Account</a>
                <a class="d-block small" href="reset-password.php">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer-scripts.php" ?>
</body>
</html>