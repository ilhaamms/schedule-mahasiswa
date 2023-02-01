<?php
$koneksi        = mysqli_connect("localhost", "root", "", "mahasiswa");

$senin       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'senin' ");
$selasa       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'selasa' ");
$rabu       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'rabu' ");
$kamis       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'kamis' ");
$jumat       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'jumat' ");
$sabtu       = mysqli_query($koneksi, "SELECT hari FROM schedules WHERE hari = 'sabtu' ");
?>
<html>
    <head>
        <title>Belajar Chart</title>
        <link
        rel="stylesheet"
        href="{{ asset('/css/styleGrafik.css') }}"
        />
        

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" ></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {

                    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

                    datasets: [{
                            label: 'jumlah jadwal',

                            data: [
                                <?php echo mysqli_num_rows($senin); ?>,
                                <?php echo mysqli_num_rows($selasa);?>,
                                <?php echo mysqli_num_rows($rabu);?>,
                                <?php echo mysqli_num_rows($kamis);?>,
                                <?php echo mysqli_num_rows($jumat);?>,
                                <?php echo mysqli_num_rows($sabtu);?>,
                            ],

                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgb(170, 227, 226, 0.2)',
                                'rgb(191, 219, 56, 0.2)',
                                'rgb(252, 115, 0, 0.2)',
                                'rgb(93, 56, 145, 0.2)'
                            ],

                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgb(191, 219, 56, 1)',
                                'rgb(252, 115, 0, 1)',
                                'rgb(93, 56, 145, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>