<?php
session_start();
include_once 'config.php';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

if (!empty($email) && !empty($password)) {
    //puxar no banco email e senha do dados do formulario
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND pass = '{$password}'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Online";
        $sql2 = mysqli_query($conn, "UPDATE users SET status_ = '$status' WHERE unique_id = {$row['unique_id']}");
        if($sql2){
             $_SESSION['unique_id'] = $row['unique_id']; 
             echo "success";
        }
      
    } else {
        echo "Email ou senha Incorreto";
    }

} else {
    echo "Preencha os campos";
}
