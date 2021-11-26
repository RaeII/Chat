<?php include_once "head.php"; 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }


?>

<body>
    <!--  Cadastro para o formulario-->
    <div class="wrapper">
        <section class="users">
            <header>
                <?php include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT *FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                
                <div class="content">
                    <img src="php/img/<?=$row['img']?>" alt="">
                    <div class="details">
                        <span><?=$row['fname'] . " " . $row['lname'] ?></span>
                        <p><?=$row['status_']?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?=$row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Selecione para iniciar o chat</span>
                <input type="text" placeholder="Nome para pesquisa">
                <button><i class="fas fa-search"></i></button>
            </div>
                <div class="users-list">
                
                </div>
            
        </section>
    </div>
    <script src="js/users.js"></script>
</body>

</html>