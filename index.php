<!-- Página principal -->
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
        <title>WaterView</title>

        <!-- APP ICON -->

        <!-- CSS STYLESHEETS -->
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/app.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- JS SCRIPTS -->
        <script src="scripts/index.js" defer></script>
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="img-container">Img</div>
                <ul class="links">
                    <li><i class="fa fa-calendar-o" aria-hidden="true"></i> <a href="history.html">Histórico Mensal</a></li>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span><a href="">Perfil</a></span></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="row">
                <div class="circle-graphic" id="progressBar">
                    <div class="value" id="progressValue"></div>
                </div>
                <div class="buttons">
                    <button>Atualizar</button>
                    <button>Imprimir</button>
                </div>
            </div>
            <div class="row capacity">
                <div class="info">
                    <table>
                        <thead>
                            <th>Capacidade Total</th>
                            <th>Capacidade Utilizada</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="totalCapacity"></td>
                                <td id="utilizedCapacity"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="btn-on-off">
                <button onclick="turnOn()">Ligar</button>
                <button onclick="turnOff()">Desligar</button>
            </div>
        </main>

        <div id="div-refresh" style="display: none;"></div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </body>
</html>
