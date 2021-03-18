<?php
include ('db.php');
if (isset($_POST['type'])) {
    if ($_POST['type'] == 'login') {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from users where username='$username' and password='$password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                echo json_encode(array("statusCode" => "sucess"));
                $_SESSION["username"] = $username;
            }
        } else {
            echo json_encode(array("statusCode" => "fail"));
        }
    }
    if ($_POST['type'] == 'register') {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $date = date("Y-m-d");
        $sql_check = "SELECT * FROM users where email='$email' ";
        $result_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($result_check) > 0) {
            $row = mysqli_fetch_assoc($result_check);
            if ($email == $row['email']) {
                echo json_encode(array("statusCode" => "already_exists"));
            }
        } else {
            $sql = "INSERT INTO users (username, password,email,created_date)
VALUES ('$username','$password','$email','$date')";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(array("statusCode" => "sucess"));
                $_SESSION["username"] = $username;
            } else {
                echo json_encode(array("statusCode" => "fail"));
            }
        }
    }
}
?>
