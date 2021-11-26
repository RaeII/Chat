<?php include_once "head.php"; ?>

<body>
    <!--  Cadastro para o formulario-->
    <div class="wrapper">

        <section class="form signup">
            <header>header</header>

            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>

                <div class="name-details">
                    <div class="field input">
                        <label>Nome</label>
                        <input type="text" name="fname" placeholder="Nome" require>
                    </div>
                    <div class="field input">
                        <label>Sobre nome</label>
                        <input type="text" name="lname" placeholder="Sobre Nome" require>
                    </div>
                </div>

                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" require>
                </div>

                <div class="field input">
                    <label>Senha</label>
                    <input  type="password" name="password" placeholder="Senha" require>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field image">
                    <label>Selecione imagem</label>
                    <input type="file" name="image" require>
                </div>

                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>
            </form>

            <div class="link">Já possui login? <a href="login.php">login</a> </div>
        </section>
    </div>
    <script src="js/pass.show.hide.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>