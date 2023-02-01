<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Schedule Mahasiswa</title>
</head>
<body>
    <div class="all-schedule">
        @foreach($schedules as $schedule)
        <div id="card-schedule">
            <div class="item-schedule">
                <table border="1" cellspacing="0">
                    <tr>
                        <th>Hari</th>
                        <td>:</td>
                        <td>{{$schedule->hari}}</td>
                    </tr>
                    <tr>
                        <th>Matkul</th>
                        <td>:</td>
                        <td>{{$schedule->matkul}}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>:</td>
                        <td>{{$schedule->kelas}}</td>
                    </tr>
                    <tr>
                        <th>Jam</th>
                        <td>:</td>
                        <td>{{$schedule->jam}}</td>
                    </tr>
                    <tr>
                        <th>Ruang</th>
                        <td>:</td>
                        <td>{{$schedule->ruang}}</td>
                    </tr>
                    <tr>
                        <th>Dosen</th>
                        <td>:</td>
                        <td>{{$schedule->dosen}}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>