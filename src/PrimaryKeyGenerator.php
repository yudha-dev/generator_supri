<?php

namespace Yudhadev\GeneratorSupri;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrimaryKeyGenerator
{
    // Fungsi untuk membuat singkatan dari nama tabel
    protected static function getPrefix($table)
    {
        // Daftar aturan singkatan yang diinginkan
        $abbreviations = [
            'user'          => 'USR',
            'pelanggan'     => 'PLG',
            'barang'        => 'BRG',
            'bahan'         => 'BHN',
            'karyawan'      => 'KRY',
            'transaksi'     => 'TRX',
            'kelas'         => 'KLS',
            'jadwal'        => 'JDL',
            'pembayaran'    => 'PMB',
            'kategori'      => 'KAT',
            'dokter'        => 'DKR',
            'pasien'        => 'PSN',
            'klinik'        => 'KLN',
            'obat'          => 'OBT',
            'resep'         => 'RSP',
            'penyakit'      => 'PNK',
            'laporan'       => 'LPR',
            'sumber'        => 'SMB',
            'inventaris'    => 'INV',
            'akun'          => 'AKN',
            'anggota'       => 'ANG',
            'artikel'       => 'ART',
            'detail'        => 'DTL',
            'dokumen'       => 'DMN',
            'faktur'        => 'FKT',
            'hutang'        => 'HTG',
            'invoice'       => 'INV',
            'jabatan'       => 'JBN',
            'kartu'         => 'KRT',
            'keuangan'      => 'KJN',
            'kontak'        => 'KTK',
            'layanan'       => 'LYN',
            'master'        => 'MST',
            'pengguna'      => 'PGN',
            'proyek'        => 'PRJ',
            'referensi'     => 'REF',
            'ruang'         => 'RNG',
            'satuan'        => 'STN',
            'supplier'      => 'SPL',
            'tagihan'       => 'TGH',
            'unit'          => 'UNT',
            'verifikasi'     => 'VRF',
            'dusun'         => 'DSN',
            'anggaran'      => 'ANG',
            'pembelian'     => 'PBL',
            'penjualan'     => 'PJL',
            'penerimaan'    => 'PNR',
            'pengeluaran'   => 'PGL',
            'penerimaan'    => 'PNR',
            'pengajuan'     => 'PJR',
            'upah_tenaga'   => 'UTG',
            'biaya_operasional' => 'BOP',
            'detail_kebutuhan' => 'DKH',
            'detail_penjualan' => 'DPJ',
            'detail_transaksi' => 'DTR',
            'detail_bahan' => 'DBH',
            'kepala_dusun' => 'KDS',
            'kepala_klinik' => 'KLN',
            'ketua_rt' => 'KRT',
            'ketua_rw' => 'KRW',
            'swadaya_masyarakat' => 'SMA',
            'kriteria_topsis' => 'KTP',
            'pembagian_anggaran' => 'PAG',
            'proses_pembangunan' => 'PPB',
        ];

        // Dapatkan nama tabel dalam bentuk tunggal
        $singularTable = Str::singular($table);

        // Cek jika singkatan tersedia
        if (array_key_exists($singularTable, $abbreviations)) {
            return $abbreviations[$singularTable];
        }

        // Jika tidak ada aturan, ambil 3 huruf pertama
        return strtoupper(substr($singularTable, 0, 3));
    }

    public static function generatePrimaryKey($table)
    {
        // Dapatkan prefix berdasarkan nama tabel
        $prefix = self::getPrefix($table);
        $column = 'id_' . Str::singular($table); // Misal untuk tabel users jadi id_user

        // Dapatkan nilai maksimum dari kolom ID
        $maxId = DB::table($table)->max($column);

        if ($maxId) {
            // Hapus prefix dan tambahkan 1 ke nilai numerik
            $number = intval(str_replace($prefix, '', $maxId)) + 1;
        } else {
            // Jika tidak ada nilai, mulai dari 1
            $number = 1;
        }

        // Format angka dengan leading zero
        $newId = $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);

        return $newId;
    }
}
