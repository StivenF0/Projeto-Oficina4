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
                <select name="" id="idSelMon">
                    <!-- with database this next part gets different -->
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11" selected>Novembro</option>
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
            const date = new Date();
            const actualYear = date.getFullYear() // In the final project this will be the year we get from th registers, maybe even two years according to th period, so the way we'll treat this data will be different
            const leapYear = ((actualYear % 4 == 0 & actualYear % 100 != 0) || (actualYear % 100 == 0 && actualYear % 400 == 0)) ? true : false

            const months = {1: '31', 2: (leapYear) ? '29' : '28', 3: '31', 4: '30', 5: '31', 6: '30', 7: '31', 8: '31', 9: '30', 10: '31', 11: '30', 12: '31'}
            const monthsNames = {1: 'January', 2: 'February', 3: 'March', 4: 'April', 5: 'May', 6: 'June', 7: 'July', 8: 'August', 9: 'September', 10: 'October', 11: 'November', 12: 'December'}
            
            // This next four lines ar here just o create fake values
            const september = [23, 19, 98, 90, 28, 94, 8, 54, 52, 27, 73, 100, 50, 84, 95, 16, 12, 24, 20, 58, 92, 5, 37, 72, 64, 48, 33, 3, 36, 44];
            const october = [26, 24, 90, 44, 88, 7, 79, 80, 82, 36, 92, 63, 51, 97, 61, 87, 68, 4, 67, 40, 9, 29, 5, 8, 16, 59, 13, 10, 96, 56, 53];
            const november = [68, 15, 4, 22, 2, 64, 100, 58, 10, 89, 78, 34, 27, 29, 13, 82, 17, 88, 3, 80, 18, 65, 84, 86, 14, 30, 50, 91, 79, 70];
            const monthsData = {9: september, 10: october, 11: november}

            let myChart = null;

            function drawChart(month) {
                const labels = [];

                for (let a = 0; a < months[month]; a++) {
                    labels[a] = (a < 9) ? '0' + (a + 1) : a + 1
                }

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Nível por Dia',
                        backgroundColor: 'rgb(30, 144, 255)',
                        borderColor: 'rgb(30, 144, 255)',
                        data: monthsData[month],
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
                
                if (myChart != null) {
                    myChart.destroy()
                }

                myChart = new Chart(document.getElementById('myChart'), config);
            }

            const selectMonth = document.getElementById("idSelMon")
            let viewMonth = selectMonth.options[selectMonth.selectedIndex].value
            drawChart(viewMonth)

            selectMonth.addEventListener('change', () => {
                viewMonth = selectMonth.options[selectMonth.selectedIndex].value
                drawChart(viewMonth)
            })
        </script>
    </body>
</html>
