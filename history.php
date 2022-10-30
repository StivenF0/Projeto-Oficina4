<?php
    session_start();

    $activeSession = (!empty($_SESSION['activeSession'])) ? $_SESSION['activeSession'] : false;

    if (!$activeSession) {
        header('Location: login.php');
    }
?>

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
        <title>Histórico Mensal - WaterView</title>

        <!-- APP ICON -->

        <!-- CSS STYLESHEETS -->
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/history.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <header>
            <nav class="navbar">
                <div class="img-container">
                    <img src="img/waterview-logo.svg" alt="">
                </div>
                <ul class="links">
                    <li class="underline">
                        <a href="./">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Página Inicial</span> 
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Perfil</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Histórico Mensal</h1>
            <div class="month-options">
                <select name="" id="">
                    <option disabled selected value="">Selecione o mês</option>
                    <!-- with database this next part gets different -->
                    <option value="">Mês 1</option>
                    <option value="">Mês 2</option>
                    <option value="">Mês 3</option>
                </select>
            </div>

            <!-- CHART -->
            <div class="div-main">
                <div class="history-chart">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="chart-info">
                    <h2>Número de série: </h2>
                    <h2>Capacidade máxima: </h2>
                    <h2>Média mensal: </h2>
                    <button>Imprimir</button>
                </div>
            </div>
        </main>

        <!-- JS SCRIPTS -->
        <script src="node_modules/chart.js/dist/chart.js"></script>
        <script>
            // Maybe will be easier to get data from database with PHP if scripts are into what will eventually be the '.php' file
            const months = {
                1: '31',
                2: '',
                3: '31',
                4: '30',
                5: '31',
                6: '30',
                7: '31',
                8: '31',
                9: '30',
                10: '31',
                11: '30',
                12: '31'
            }

            const labels = [];

            for (let a = 0; a < 31; a++) {
                labels[a] = (a < 9) ? '0' + (a + 1) : a + 1
            }

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Nível por Dia',
                    backgroundColor: 'rgb(30, 144, 255)',
                    borderColor: 'rgb(30, 144, 255)',
                    data: [0, 10, 5, 2, 20, 30, 45, 70, 90, 100, 20, 60, 55, 56, 88, 92, 90, 95, 80, 76, 12, 50, 70, 70, 70, 87, 84, 93, 98, 100, 99],
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    animation: {
                        duration: 2500
                    },

                    plugins: {
                        legend: {
                            position: 'bottom'
                        },

                        title: {
                            display: true,
                            text: 'Volume médio diário do mês Mês X',
                            align: 'center',
                            color: '#1e90ff',
                            font: {
                                size: 25,
                                weight: 500
                            }
                        },

                        tooltip: {
                            backgroundColor: '#97cbff',
                            titleColor: '#000',
                            bodyColor: '#000'
                        }
                    }
                }
            };

            const myChart = new Chart(document.getElementById('myChart'), config);
        </script>
    </body>
</html>
