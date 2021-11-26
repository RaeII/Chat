<?php include_once "head.php"; ?>

<body>
    <!--  Cadastro para o formulario-->
    <div class="wrapper">

        <section class="form login">
            <header>Login</header>

            <form action="#">
                <div class="error-txt"></div>

                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>

                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="pass" placeholder="Senha">
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>
            </form>

            <div class="link">Não possui login? <a href="index.php">Cadastre-se</a> </div>
        </section>
    </div>
    <script src="js/pass.show.hide.js"></script>
    <script src="js/login.js"></script>
</body>

</html>