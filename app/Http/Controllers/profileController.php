<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            '_foto' => 'mimes:png,jpg,gif,jpeg|max:10240',
            '_email' => 'required|email',
        ], [
            '_foto.mimes' => 'Foto yang di upload hanya boleh berjenis JPEG,PNG,GIF, dan JPG!',
            '_foto.max' => 'Ukuran foto melibihi batas maximal',
            '_email.required' => 'E-mail wajib diisi!',
            '_email.email' => 'E-mail yang dimasukan tidak valid!',
        ]);

        // Menghapus file foto lama sebelum pembaruan


        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $nama_foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $nama_foto_baru);

            $old_foto = metadata::where('meta_key', '_foto')->first();
            if ($old_foto) {
                $old_foto_path = public_path('foto') . '/' . $old_foto->meta_value;
                if (file_exists($old_foto_path)) {
                    unlink($old_foto_path);
                }
            }

            metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $nama_foto_baru]);
        }
        metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);

        metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        metadata::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
        metadata::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
        metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);
        return redirect()->route('profile.index')->with('success', 'Berhasil melakukan update data profil.');
    }
}
