<?php

namespace App\Http\Controllers\Project\api\data\coa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\project\keuangan\dk_akun as akun;

use DB;

class coa_controller extends Controller
{
    public function resource(Request $request){
        
        $data = akun::join('dk_hierarki_dua', 'hd_id', 'ak_kelompok')
                        ->join('dk_hierarki_satu', 'hs_id', 'hd_level_1')
                        ->select(
                            'ak_nama',
                            'ak_opening',
                            'hd_nomor',
                            'hd_level_1',
                            'hd_nama',
                            'hs_nama',
                             DB::raw('date(dk_akun.created_at) as tanggal_buat'),
                             DB::raw('concat(hd_level_1, hd_nomor, ak_nomor) as nomor_akun'))

                        ->get();

        return response()->json([
            'data'  => $data
        ]);
    }
}
