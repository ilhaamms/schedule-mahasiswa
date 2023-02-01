<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
        rel="stylesheet"
        href="{{ asset('/css/bootstrap-5.2.3-dist/css/bootstrap.css') }}"
        />
        <link rel="icon" href="{{ asset('/image/uhamka.png') }}">
        <link
        rel="stylesheet"
        href="{{ asset('/css/style.css') }}"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
        <script src="{{ asset('/css/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('/js/jquery-3.6.3.min.js') }}"
        ></script>
        <script type="text/javascript">
            function showSchedule() {
                $.ajax({
                    type: "GET",
                    url: "/schedule",
                }).done(function (data) {
                    $("#data-schedule").html(data);
                });
            }
            
            function showGrafik() {
                $.ajax({
                    type: "GET",
                    url: "/grafik",
                }).done(function (data) {
                    $("#data-schedule").html(data);
                });
            }

            function searchSchedule() {
                var day = document.getElementById("days").value;
                                
                $.ajax({
                    type: "GET",
                    url: "/searchSchedule/" + day,
                }).done(function (data) {
                    $("#data-schedule").html(data);
                });
            }

        </script>
        <title>Jadwal Mahasiswa</title>
    </head>
    <body onload="showSchedule()">
    <header>
        <div class="image">
            <img src="{{ asset('/image/uhamka.png') }}" alt="Gambar Tidak Ada">
        </div>
        <div class="jumbotron">
            <h1 class="text-center">
              Jadwal Kuliah Universitas Dr. Hamka Fakultas Teknik Industri &
              informatika
            </h1>
        </div>
    </header>
    <main>
        <div class="schedule">
            <div class="search-schedule">
                <h2 class="text-white">Data Schedule</h2>
                <h6 class="text-white">Cari Jadwal Berdasarkan Hari</h6>
                <input type="text" id="days">
                <button class="search" type="submit" onclick="searchSchedule()">Search</button>
                <button class="show" type="submit" onclick="showSchedule()">Show All Schedule</button>
                <button class="grafik" type="submit" onclick="showGrafik()">Show Grafik</button>
            </div>
            <div class="new-schedule">
                <button data-bs-toggle="modal" data-bs-target="#ModalInsert">+ New Schedule</button>
                <a href="/export"><button class="export">Export Schedule</button></a>
            </div>
            <h3 class="text-center text-white">List Jadwal Uhamka University</h3>
            <div id="data-schedule"></div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
                fill="#144272"
                fill-opacity="1"
                d="M0,32L48,53.3C96,75,192,117,288,112C384,107,480,53,576,80C672,107,768,213,864,224C960,235,1056,149,1152,112C1248,75,1344,85,1392,90.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
            ></path>
        </svg>
            <div class="modal" id="ModalInsert">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/addSchedule" method="post" enctype="multipart/form-data" id="formdata">
                        {{ csrf_field() }}

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Input New Schedule</h4>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                            ></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>Hari</td>
                                    <td>:</td>
                                    <td>
                                        <input
                                            required
                                            type="text"
                                            id="day"
                                            name="day"
                                            class="form-control"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Matkul</td>
                                    <td>:</td>
                                    <td>
                                        <input
                                            required
                                            type="text"
                                            id="matkul"
                                            name="matkul"
                                            class="form-control"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>
                                        <input
                                            required
                                            type="text"
                                            id="mkClass"
                                            name="class"
                                            class="form-control"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jam</td>
                                    <td>:</td>
                                    <td>
                                        <input
                                            required
                                            type="time"
                                            id="clock"
                                            name="clock"
                                            class="form-control"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ruang</td>
                                    <td>:</td>
                                    <td>
                                        <select
                                            name="room"
                                            id="room"
                                            class="form-select form-select-lg"
                                        >
                                            <option value="FT203">FT203</option>
                                            <option value="FT204">FT204</option>
                                            <option value="FT205">FT205</option>
                                            <option value="FT303">FT303</option>
                                            <option value="FT304">FT304</option>
                                            <option value="FT305">FT305</option>
                                            <option value="FT403">FT403</option>
                                            <option value="FT404">FT404</option>
                                            <option value="FT405">FT405</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dosen</td>
                                    <td>:</td>
                                    <td><input  required id="dosen" class="form-control" type="text" name="dosen" /></td>
                                </tr>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="button-modal-footer">
                            <input
                                type="submit"
                                class="btn btn-danger"
                                value="submit"
                                id="submit"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="container-video">
            <div class="title-galeri-video">
                <h4 class="text-white text-center pt-5" id="galeri-video">Video About Uhamka</h4>
            </div>
            <div class="wrap-video-uhamka">
                <div class="video-uhamka">
                    <div class="video">
                        <video
                            src="{{ asset('/video/uhamka1.mp4') }}"
                            controls="controls"
                            control
                        ></video>
                    </div>
                    <div class="description-video text-center">
                        <p>
                            Universitas Muhammadiyah Prof. Dr. HAMKA (UHAMKA)
                        </p>
                    </div>
                </div>
                <div class="video-uhamka">
                    <div class="video">
                        <video
                            src="{{ asset('/video/uhamka2.mp4') }}"
                            controls="controls"
                            control
                        ></video>
                    </div>
                    <div class="description-video">
                        <p class="text-center">
                            Uhamka-Suara Kecerdasan
                        </p>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#144272" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,117.3C384,160,480,224,576,208C672,192,768,96,864,80C960,64,1056,128,1152,138.7C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
        <div class="container-developer">
            <div class="title-galeri-developer">
                <h4 class="text-white text-center" id="galeri-developer">About Developer</h4>
            </div>
            <div class="wrap-developer-uhamka">
                <div class="image-developer">
                    <div class="developer">
                        <img src="{{ asset('/image/ilham.jpg') }}" alt="Gambar Tidak Ada">    
                    </div>
                    <div class="description-image">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>Ilham Muhammad Sidiq</td>
                            </tr>
                            <tr>
                                <td>Nim</td>
                                <td>:</td>
                                <td>2003015043</td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td>:</td>
                                <td>FTII</td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td>:</td>
                                <td>Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>5B</td>
                            </tr>
                            <tr>
                                <td>Asal</td>
                                <td>:</td>
                                <td>Bekasi</td>
                            </tr>
                            <tr>
                                <td>Profesi</td>
                                <td>:</td>
                                <td>Fullstack Developer</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
            <p class="text-center"><marquee>Website By Ilham Muhammad Sidiq</marquee></p>
            <p class="text-center">&copy;2023 Uhamka University</p>
    </footer>
    </body>
</html>