<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use PDF;

class ScheduleController extends Controller
{

    public function export(){
        $schedules = Schedule::all();
 
    	$pdf = PDF::loadview('export',['schedules'=>$schedules]);
        return $pdf->stream();
    }

    public function grafik(){
        return view('grafik');
    }

    public function home(){
        return view('home');
    }

    public function addSchedule(Request $request){

        DB::table('schedules')->insert([
            'hari' => $request->day,
            'matkul' => $request->matkul,
            'kelas' => $request->class,
            'jam' => $request->clock,
            'ruang' => $request->room,
            'dosen' => $request->dosen,
        ]);

        return redirect('/');
    }

    public function schedule(){
        $schedules = DB::table('schedules')->get();
        return view('schedule', ['schedules' => $schedules]);
    }

    public function searchSchedule($day){
        $schedules = DB::table('schedules')->where('hari', $day)->get();
        return view('schedule', ['schedules' => $schedules]);
    }
    
    public function deleteSchedule($jam){
        $schedules = DB::table('schedules')->where('jam', $jam)->delete();
        return redirect('/');
    }
    
    public function changeSchedule($jam){
        $schedules = DB::table('schedules')->where('jam', $jam)->get();
        return view('changeSchedule', ['schedules' => $schedules]);
    }

    public function fixChangeSchedule(Request $request){
        DB::table('schedules')->where('jam', $request->clock)->update([
            'hari' => $request->day,
            'matkul' => $request->matkul,
            'kelas' => $request->class,
            'jam' => $request->clock,
            'ruang' => $request->room,
            'dosen' => $request->dosen,
        ]);

        return redirect('/');
    }
}
