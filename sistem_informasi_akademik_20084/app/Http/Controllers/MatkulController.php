<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Matkul;
use App\Http\Requests\StoreMata_kuliahRequest;
use App\Http\Requests\UpdateMata_kuliahRequest;

class MataKuliahController extends Controller
{
    public function insert(){

        $raw = DB::insert("INSERT INTO matkuls (kode_mk,nama_mk,created_at,updated_at) VALUES ('669', 'Framework',now(),now())");
        dump($raw);

        $query = DB::table('matkuls')->insert(
            [
                'kode_mk' => '700',
                'nama_mk' => 'Cloud Computing',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($query);

        $eloquent = Matkul::create(
            [
                'kode_mk' => '701',
                'nama_mk' => 'Data Mining',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
        dump($eloquent);
        return "Sukses Input Data";
    }

    public function select(){
        $raw = DB::select("SELECT * FROM matkuls");
        dump($raw);

        $eloquent = DB::table('matkuls')->get();
        dump($eloquent);

        $sql3 = Matkul::all();
        dump($sql3);
        return "Sukses";
    }

    public function update(){

        $raw = DB::update("UPDATE matkuls SET nama_mk='PBM',updated_at=now() WHERE id=?",[1]);
        dump($raw);

        $query = DB::table('matkuls')
        ->where('id','2')->update(['nama_mk' => 'Blockchain','updated_at' => now()]);
        dump($query);

        $eloquent = Matkul::where('id','3')->first()->update(['nama_mk' => 'Technopreneur','updated_at' => now()]);
        dump($eloquent);
        return "Sukses Update Data";
    }

    public function delete(){

        $raw = DB::delete("DELETE FROM matkuls WHERE id=?",[1]);
        dump($raw);

        $query = DB::table('matkuls')->where('id',2)->delete();
        dump($query);

        $eloquent = Matkul::where('id',3)->delete();
        dump($eloquent);
        return "Sukses Hapus Data";
    }
}
