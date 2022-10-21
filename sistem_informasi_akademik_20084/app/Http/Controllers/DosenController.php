<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class DosenController extends Controller
{
    public function insert(){

        $raw = DB::insert("INSERT INTO dosens (nidn,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('2222', 'Asep','lk','Jalanin aja dulu','Palembang','1984-12-05','asep.jpg',now(),now())");
        dump($raw);

        $query = DB::table('dosens')->insert(
            [
                'nidn' => '1111',
                'nama' => 'Sayuti',
                'jenis_kelamin' => 'lk',
                'alamat' => 'Jalanin aja dulu',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1979-11-11',
                'photo' => 'sayuti.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($query);

        $eloquent = Dosen::create(
            [
                'nidn' => '1112',
                'nama' => 'Lesti',
                'jenis_kelamin' => 'pr',
                'alamat' => 'Jalanin aja dulu',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1988-12-13',
                'photo' => 'Lesti.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($eloquent);
        return "Sukses Input Data";
    }

    public function select(){

        $raw = DB::select("SELECT * FROM dosens");
        dump($raw);

        $query = DB::table('dosens')->get();
        dump($query);

        $eloquent = Dosen::all();
        dump($eloquent);
        return "Sukses";
    }

    public function update(){

        $raw = DB::update("UPDATE dosens SET nama='Luna',updated_at=now() WHERE nama=?",['Lesti']);
        dump($raw);

        $query = DB::table('dosens')->where('nama','Asep')->update(['photo' => 'Asep(1).jpg','updated_at' => now(),]);
        dump($query);

        $eloquent = Dosen::where('nama','Sayuti')->first()->update(['alamat' => 'Jl sama kamu jadian sama dia','updated_at' => now(),]);
        dump($eloquent);

        return "Sukses Update Data";

    }

    public function delete(){

        $raw = DB::delete("DELETE FROM dosens WHERE nama=?",['Sayuti']);
        dump($raw);

        $query = DB::table('dosens')->where('nama','Asep')->delete();
        dump($query);

        $eloquent = Dosen::where('nidn','1111')->delete();
        dump($eloquent);

        return "Sukses Hapus Data";
    }
}
