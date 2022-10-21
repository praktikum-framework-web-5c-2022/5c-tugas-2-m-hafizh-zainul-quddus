<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    public function insert(){

        $raw = DB::insert("INSERT INTO mahasiswas (npm,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('2000','Sunarto','lk','Jl asal kau bahagia','Palembang','2002-03-03','Sunarto.jpg',now(),now())");
        dump($raw);

        $query = DB::table('mahasiswas')->insert(
            [
                'npm' => '2001',
                'nama' => 'Gon',
                'jenis_kelamin' => 'lk',
                'alamat' => 'Jl asal kau bahagia',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2002-05-03',
                'photo' => 'Gon.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($query);

        $query = Mahasiswa::create(
            [
                'npm' => '2002',
                'nama' => 'Sutrisno',
                'jenis_kelamin' => 'lk',
                'alamat' => 'Jl asal kau bahagia',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2002-07-17',
                'photo' => 'Sutrisno.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($query);
        return "Sukses Input Data";
    }

    public function select(){

        $raw = DB::select("SELECT * FROM mahasiswas");
        dump($raw);

        $query = DB::table('mahasiswas')->get();
        dump($query);

        $eloquent = Mahasiswa::all();
        dump($eloquent);
        return "Sukses";
    }

    public function update(){

        $raw = DB::update("UPDATE mahasiswas SET nama='Mamat',updated_at=now() WHERE id=?",[1]);
        dump($raw);

        $query = DB::table('mahasiswas')
        ->where('id','1')
        ->update(
            [
                'alamat' => 'JL Bakpao',
                'updated_at' => now()
            ]
            );
        dump($query);

        $eloquent = Mahasiswa::where('id','2')->first()->update(['nama'=>'Edi','updated_at' => now()]);
        dump($eloquent);
        return "Sukses Update Data";
    }

    public function delete(){

        $raw = DB::delete("DELETE FROM mahasiswas WHERE id=?",['1']);
        dump($raw);

        $query = DB::table('mahasiswas')->where('id',2)->delete();
        dump($query);

        $eloquent = Mahasiswa::where('id',3)->delete();
        dump($eloquent);
        return "Sukses Hapus  Data";
    }
}
