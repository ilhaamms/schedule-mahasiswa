<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-5.2.3-dist/css/bootstrap.css') }}">
    <link
            rel="stylesheet"
            href="{{ asset('/css/styleChangeSchedule.css') }}"
        />
    <title>Document</title>
</head>
<body>
    @foreach($schedules as $schedule)
    <div class="edit-form">
        <form action="/fixChangeSchedule" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h5 class="text-center mb-5">Change Schedule</h5>
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
                            value="{{$schedule->hari}}"
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
                            value="{{$schedule->matkul}}"
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
                            id="class"
                            name="class"
                            class="form-control"
                            value="{{$schedule->kelas}}"
                        />
                    </td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td>
                        {{$schedule->jam}}
                        <input
                            type="hidden"
                            id="clock"
                            name="clock"
                            class="form-control"
                            value="{{$schedule->jam}}"
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
                            class="form-select form-select-lg form-control"
                            value="{{$schedule->ruang}}"
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
                    <td>
                        <input
                            required
                            type="text"
                            id="dosen"
                            name="dosen"
                            class="form-control"
                            value="{{$schedule->dosen}}"
                        />
                    </td>
                </tr>
                    <td>
                        <a><button type="submit" class="edit-schedule">Edit</button></a>
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
        <a href="/"><button type="submit" class="cancel-schedule">Cancel</button></a>
    </div>
    @endforeach
</body>
</html>
