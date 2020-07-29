<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{

    public function createStep1(Request $request)
    {
        $asset = $request->session()->get('asset');
        dd($asset);

        return view('user.formB',compact('asset'));
    }

    public function PostcreateStep1(Request $request)
    {
      // dd($request);

        $validatedData = $request->validate([
            'gaji_pasangan'=> ['numeric'],
            'jumlah_imbuhan'=> ['numeric'],
            'jumlah_imbuhan_pasangan'=> ['numeric'],
            'sewa'=> ['numeric'],
            'sewa_pasangan'=>['numeric'],
            'jenis_dividen' => ['string'],
            'dividen' =>['numeric'],
            'dividen_pasangan' =>['numeric'],
            'pinjaman_perumahan_pegawai' =>['numeric'],
            'bulanan_perumahan_pegawai' =>['numeric'],
            'pinjaman_perumahan_pasangan' =>['numeric'],
            'bulanan_perumahan_pasangan' => ['numeric'],
            'pinjaman_kenderaan_pegawai' => ['numeric'],
            'bulanan_kenderaan_pegawai' => ['numeric'],
            'pinjaman_kenderaan_pasangan'=> ['numeric'],
            'bulanan_kenderaan_pasangan'=> ['numeric'],
            'jumlah_cukai_pegawai'=> ['numeric'],
            'bulanan_cukai_pegawai'=> ['numeric'],
            'jumlah_cukai_pasangan'=>['numeric'],
            'bulanan_cukai_pasangan' => ['numeric'],
            'jumlah_koperasi_pegawai'=> ['numeric'],
            'bulanan_koperasi_pegawai'=> ['numeric'],
            'jumlah_koperasi_pasangan'=>['numeric'],
            'bulanan_koperasi_pasangan' => ['numeric'],
            'jumlah_pinjaman_pegawai' =>['numeric'],
            'jumlah_bulanan_pegawai' =>['numeric'],
            'jumlah_pinjaman_pasangan' =>['numeric'],
            'jumlah_bulanan_pasangan' =>['numeric'],
            'jenis_harta' =>['required', 'string'],
            'pemilik_harta' =>['required', 'string'],
            'hubungan_pemilik' =>['required', 'string'],
            'maklumat_harta' => ['required', 'string'],
            'tarikh_pemilikan_harta' => ['required', 'date'],
            'bilangan' => ['required', 'numeric'],
            'nilai_perolehan'=> ['required','numeric'],
            'cara_perolehan'=> ['required', 'string'],
            'nama_pemilikan_asal'=>['required', 'string'],
            'jumlah_pinjaman' => ['numeric'],
            'institusi_pinjaman' =>['string'],
            'tempoh_bayar_balik' =>['string'],
            'ansuran_bulanan' =>['numeric'],
            'tarikh_ansuran_pertama' =>['date'],
            'jenis_harta_pelupusan' =>['string'],
            'alamat_asset' => ['string'],
            'no_pendaftaran' => ['string'],
            'harga_jualan' => ['numeric'],
            'tarikh_lupus' => ['date'],
        ]);

        // dd($validatedData);

        if(empty($request->session()->get('asset'))){
            $asset = new \App\FormB();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
            // dd($asset);

        }

        else{
            $asset = $request->session()->get('asset');
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
            // dd($asset);

        }
        // return redirect({{route('user.formC')}});
        return redirect()->route('user.formC');
    }




    public function createStep2(Request $request)
    {
        $asset = $request->session()->get('asset');
        dd($asset);

        return view('user.formC',compact('asset'));
    }

    public function PostcreateStep2(Request $request)
    {
      // dd($request);

        $validatedData = $request->validate([
            'jenis_harta_lupus'=> ['required', 'string'],
            'pemilik_harta_pelupusan'=> ['required', 'string'],
            'hubungan_pemilik_pelupusan'=> ['required', 'string'],
            'no_pendaftaran_harta'=> ['required', 'string'],
            'tarikh_pemilikan'=> ['required', 'date'],
            'tarikh_pelupusan'=> ['required', 'date'],
            'cara_pelupusan'=> ['required', 'string'],
            'nilai_pelupusan'=> ['required', 'numeric'],

        ]);

        // dd($validatedData);

        if(empty($request->session()->get('asset'))){
            $asset = new \App\FormC();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
            // dd($asset);

        }

        else{
            $asset = $request->session()->get('asset');
            $asset = new \App\FormC();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
            // dd($asset);

        }
        // return redirect({{route('user.formC')}});
        return redirect()->route('user.formD');
    }

    public function createStep3(Request $request)
    {
        $asset = $request->session()->get('asset');
        dd($asset);

        return view('user.formD',compact('asset'));
    }

    public function PostcreateStep3(Request $request)
    {
      // dd($request);

        $validatedData = $request->validate([
            'nama_syarikat'=> ['required', 'string'],
            'no_pendaftaran_syarikat'=> ['required', 'string'],
            'alamat_syarikat'=> ['required', 'string'],
            'jenis_syarikat'=> ['required', 'string'],
            'pulangan_tahunan'=> ['required', 'numeric'],
            'modal_syarikat'=> ['required', 'numeric'],
            'modal_dibayar'=> ['required', 'numeric'],
            'punca_kewangan'=> ['required', 'string'],
            'nama_ahli'=> ['required', 'string'],
            'hubungan'=> ['required', 'string'],
            'jawatan_syarikat'=> ['required', 'string'],
            'jumlah_saham'=> ['required', 'numeric'],
            'nilai_saham'=> ['required', 'numeric'],
            'dokumen_syarikat'=> ['required', 'string'],

        ]);

        // dd($validatedData);

        if(empty($request->session()->get('asset'))){
            $asset = new \App\FormD();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
           dd($asset);

        }

        else{
            $asset = $request->session()->get('asset');
            $asset = new \App\FormD();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
           // dd($asset);

        }
        // return redirect({{route('user.formC')}});
        return redirect()->route('user.formG');
    }

    public function createStep4(Request $request)
    {
        $asset = $request->session()->get('asset');
        dd($asset);

        return view('user.senaraiharta',compact('asset'));
    }

    public function PostcreateStep4(Request $request)
    {
      // dd($request);

        $validatedData = $request->validate([
            'tarikh_lantikan'=> ['required', 'date'],
            'nama_perkhidmatan'=> ['required', 'string'],
            'gelaran'=> ['required', 'string'],
            'luas_pertanian'=> ['required', 'string'],
            'lot_pertanian'=> ['required', 'string'],
            'mukim_pertanian'=> ['required', 'string'],
            'negeri_pertanian'=> ['required', 'string'],
            'luas_perumahan'=> ['required', 'string'],
            'lot_perumahan'=> ['required', 'string'],
            'mukim_perumahan'=> ['required', 'string'],
            'negeri_perumahan'=> ['required', 'string'],
            'tarikh_diperolehi'=> ['required', 'date'],
            'luas'=> ['required', 'string'],
            'lot'=> ['required', 'string'],
            'mukim'=> ['required', 'string'],
            'negeri'=> ['required', 'string'],
            'jenis_tanah'=> ['required', 'string'],
            'nama_syarikat'=> ['required', 'string'],
            'modal_berbayar'=> ['required', 'numeric'],
            'jumlah_unit_saham'=> ['required', 'numeric'],
            'nilai_saham'=> ['required', 'numeric'],
            'sumber_kewangan'=> ['required', 'string'],
            'institusi'=> ['required', 'string'],
            'alamat_institusi'=> ['required', 'string'],
            'ansuran_bulanan'=> ['required', 'numeric'],
            'tarikh_ansuran'=> ['required', 'date'],
            'tempoh_pinjaman'=> ['required', 'string'],
            'pengakuan'=> ['required', 'string'],



        ]);

        // dd($validatedData);

        if(empty($request->session()->get('asset'))){
            $asset = new \App\FormG();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
           dd($asset);

        }

        else{
            $asset = $request->session()->get('asset');
            $asset = new \App\FormG();
            $asset->fill($validatedData);
            $request->session()->put('asset', $asset);
           // dd($asset);

        }
        // return redirect({{route('user.formC')}});
        return redirect()->route('user.senaraiharta');
    }



}
