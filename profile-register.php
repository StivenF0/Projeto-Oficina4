<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- BASIC META -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- RESPONSIVE META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- APP INFO -->
        <meta name="author" content="Acsa Cibelly Carvalho Bezerra, Eduardo Aquino da Silva, Stiven Felipe Câmara Fonseca">
        
        <!-- PAGE TITLE -->
        <title>Profile Register - WaterView</title>

        <!-- APP ICON -->

        <!-- CSS STYLESHEETS -->
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/register.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="img-container">Img</div>
                <ul class="links">
                    <li><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="./">Página Inicial</a> </li>
                    <li><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="history.html">Histórico Mensal</a> </li>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span><a href="">Perfil</a></span></li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Cadastro de perfil</h1>

            <form action="profile-register-back.php" method="POST">
                <div class="form-part-one">
                    <p><input type="text" placeholder=" " id="profile-name" name="nName" class="inputs"><label for="profile-name">Nome</label></p>
                    <p><input type="password" min="1" id="password" name="nPasswd" class="inputs" placeholder=" "><label for="password">Senha</label></p>
                    
                    <p><input type="email" placeholder=" " id="profile-email" name="nEmail" class="inputs"><label id="emailLabel" for="profile-email">E-mail</label></p>
                </div>

                <p id="user-p">
                    <!-- with php and database this will be different -->
                    <select name="nType" id="idSel">
                        <option value="default" disabled selected id="selected">Tipo de usuário</option>
                        <option value="admin">Administrador</option>
                        <option value="comum">Comum</option>
                    </select>
                </p>

                <input type="submit" value="Cadastrar" id="subBtn" disabled>
            </form>
        </main>

        <script>
            // Still need to make sure everything is okay

            const inputName = document.getElementById('profile-name')
            const inputPassword = document.getElementById('password')
            const inputEmail = document.getElementById('profile-email')
            const emailLabel = document.getElementById('emailLabel')
            const selectElement = document.getElementById("idSel")
            const submitButton = document.getElementById('subBtn')

            inputName.addEventListener('input', validateForm)
            inputPassword.addEventListener('input', validateForm)
            inputEmail.addEventListener('input', validateForm)
            inputEmail.addEventListener('input', validateEmail)
            selectElement.addEventListener('change', validateForm)

            function validateForm() {
                const selectedOption = selectElement.options[selectElement.selectedIndex].value
                if (inputNam.value.length > 0 && inputPassword.value.length > 0 && selectedOption != "default" && dimensionRegExIsValid(inputEmail.value)) {
                    submitButton.disabled = false
                    submitButton.style.background = "#1e90ff"
                    submitButton.style.color = "#fff"
                    submitButton.style.cursor = "pointer"

                    submitButton.onmouseenter = () => submitButton.style.background = "#66b3ff"
                    submitButton.onmouseleave = () => submitButton.style.background = "#1e90ff"
                } else {
                    submitButton.disabled = true
                    submitButton.style.background = "#a3d1ff"
                    submitButton.style.color = "cornflowerblue"
                    submitButton.style.cursor = "default"
                }
            }

            function dimensionRegExIsValid(dimension) {
                let dimensionRegEx = /[\d]{1,3}[x][\d]{1,3}[x][\d]{1,3}/i;
                return dimensionRegEx.test(dimension)
            }

            function validateDimension() {
                if (dimensionRegExIsValid(inputEmail.value)) {
                    inputEmail.style.borderBottom = "2px solid #1e90ff"
                    emailLabel.style.color = "#1e90ff"
                } else {
                    inputEmail.style.borderBottom = "2px solid #f11515"
                    emailLabel.style.color = "#f11515"
                }
            }
        </script>
    </body>
</html>
