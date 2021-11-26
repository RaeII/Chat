<?php
ini_set('display_errors', 0);
error_reporting(0);
session_start();
include_once 'config.php';
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //Se o email é valido
    //verificar se o email existe no banco
    $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_num_rows($sql) > 0) {
      echo "$email - Já existe";
    } else {
      //verifica a imagem
      if (isset($_FILES['image'])) {
        $img_name = $_FILES['image']['name']; //nome do arquivo
        $img_type = $_FILES['image']['type']; //tipo do arquivo
        $tmp_name = $_FILES['image']['tmp_name']; //nome temporario do arquivo

        //Ver se o arquivo é uma imagem
        $img_explode = explode('.', $img_name); //divide o nome do arquivo em array, antes e depois do "."
        $img_ext = end($img_explode); //pega o ultimo array

        $extensions = ['png', 'jpeg', 'jpg'];
        //verifica se o arquivo possui extenção solicitada
        if (in_array($img_ext, $extensions) === true) {
          $time = time(); //retorna a hora atual
          //para nomear casa imgem com a hora assim tendo um nome unico
          //uploud da img
          $new_img_name = $time . $img_name;

          if (move_uploaded_file($tmp_name, "img/" . $new_img_name)) {
            
            //Move a imagem para o diretorio se ocorrer certo
            $status = "Online";
            $ramdom_id = rand(time(), 1000000000); //id aleatorio para o usuario

            //inserindo no banco
            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, pass, img, status_)
                                    VALUES ({$ramdom_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', 
                                     '{$new_img_name}', '{$status}')");

            if ($sql2) { //se os dados forem inseridos
              $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
              if (mysqli_num_rows($sql3) > 0) {

                $row = mysqli_fetch_row($sql3);
                $_SESSION['unique_id'] = $row['unique_id']; //unique_id adicionado a sessão

                echo "success";
              }
            }
          }
        } else {
          echo "Selecione um arquivo png, jpeg ou jpg";
        }
      } else {
        echo "Selecione uma imagem";
      }
    }
  } else {
    echo "$email - Não é valido";
  }
} else {
  echo "vazio";
}
