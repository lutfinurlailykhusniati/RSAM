<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwals;
use App\Doctor;
use App\Booking;
use Excel;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ReportController extends Controller
{
     

    public function index() {
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        $bookings =  $this->getTanggalJadwals($constraints);

        $doctors = \App\Doctor::all();
        return view('petugas/report/index', ['bookings' => $bookings, 'searchingVals' => $constraints]);
    }

    private function getTanggalJadwals($constraints) {
        // dd($constraints);
        $bookings = Booking::leftJoin('jadwals','jadwals.id','bookings.id_jadwal')
                        ->leftJoin('hari_jadwals', 'hari_jadwals.id','bookings.id_harijadwal')
                        ->whereDate('bookings.tanggal_jadwal', '>=', $constraints['from'])
                        ->whereDate('bookings.tanggal_jadwal', '<=', $constraints['to'])
                        ->get(['hari_jadwals.jam_mulai','hari_jadwals.jam_berakhir','bookings.*']);
        return $bookings;
    }

    public function search(Request $request) {
        $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];

        $bookings = $this->getTanggalJadwals($constraints);
        // dd($bookings);
       return view('petugas/report/index', ['bookings' => $bookings, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) {
        $this->prepareExportingData($request)->export('xlsx');
        redirect()->intended('petugas/report');
    }

    private function prepareExportingData($request) {
        $author = Auth::user()->name;
        $jadwals = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
        return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($jadwals, $request, $author) {

        // Set the title
        $excel->setTitle('Laporan Pendaftaran Online '. $request['from'].' to '. $request['to']);

        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('Lutfi Nurlaily Khusniati');

        // Call them separately
        $excel->setDescription('Laporan Pendaftaran Online');

        $excel->sheet('Pendaftaran Online', function($sheet) use($jadwals) {

        $sheet->fromArray($jadwals);
            });
        });
    }

    private function getExportingData($constraints) {
        return DB::table('bookings')
            ->leftJoin('hari_jadwals','hari_jadwals.id','=','bookings.id_harijadwal')
            ->leftJoin('jadwals', 'jadwals.id', 'bookings.id_jadwal')
            ->leftJoin('doctors', 'jadwals.dokter_id', '=', 'doctors.id')
            ->leftJoin('pasiens', 'bookings.id_pasien', '=', 'pasiens.id')
            ->leftJoin('polyclinics', 'doctors.poliklinik_id', '=', 'polyclinics.id')
            ->select('pasiens.id as No_RM','pasiens.name as Nama_Pasien','bookings.tanggal_jadwal', 'hari_jadwals.jam_mulai', 'hari_jadwals.jam_berakhir',  'bookings.no_antrian as Nomor_Antrian', 'polyclinics.nama_poliklinik as Poliklinik', 'doctors.nama as Nama_Dokter')
            ->whereDate('bookings.tanggal_jadwal', '>=', $constraints['from'])
            ->whereDate('bookings.tanggal_jadwal', '<=', $constraints['to'])
            ->get()
            ->map(function ($item, $key) {
                return (array) $item;
            })
            ->all();
    }

    

}
