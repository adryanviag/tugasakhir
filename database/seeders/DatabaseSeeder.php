<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instance;
use App\Models\Unit;
use App\Models\Classification;
use App\Models\Location;
use App\Models\IsiDisposisi;
use App\Models\SuratMasuk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User
        User::create([
            'username' => 'admin',
            'unit_id' => 'UN01',
            'pass' => bcrypt('password'),
            'prev' => 'admin'
        ]);

        User::create([
            'username' => 'operator',
            'unit_id' => 'UN03',
            'pass' => bcrypt('password'),
            'prev' => 'operator'
        ]);

        //Instance
        Instance::create([
            'kode' => 'INS01',
            'kdunit' => 'UN02',
            'instansi' => 'HIMALKOM',
            'kontak' => '085364736473',
            'alamat' => 'Jl. Unri no. 48',
            'kota' => 'Pekanbaru',
            'kodepos' => '28473',
            'telpon' => '072-223',
            'fax' => '11111',
            'email' => 'himalkom@gmail.com',
            'web' => 'himalkom.unri.ac.id'
        ]);

        Instance::create([
            'kode' => 'INS02',
            'kdunit' => 'UN03',
            'instansi' => 'HIMAFI',
            'kontak' => '081273827382',
            'alamat' => 'Jl. Unri no. 30',
            'kota' => 'Pekanbaru',
            'kodepos' => '28412',
            'telpon' => '072-332',
            'fax' => '22222',
            'email' => 'himafi@gmail.com',
            'web' => 'himafi.unri.ac.id'
        ]);

        Instance::create([
            'kode' => 'INS03',
            'kdunit' => 'UN01',
            'instansi' => 'HIMABIO',
            'kontak' => '082273728812',
            'alamat' => 'Jl. Unri no. 22',
            'kota' => 'Pekanbaru',
            'kodepos' => '28332',
            'telpon' => '072-421',
            'fax' => '33333',
            'email' => 'himabio@gmail.com',
            'web' => 'himabio.unri.ac.id'
        ]);


        // Unit
        Unit::create([
            'Kode' => 'UN01',
            'Nama' => 'Dekan',
            'Desk' => 'Dekan'
        ]);

        Unit::create([
            'Kode' => 'UN02',
            'Nama' => 'WD 1',
            'Desk' => 'Wakil Dekan 1'
        ]);

        Unit::create([
            'Kode' => 'UN03',
            'Nama' => 'WD 2',
            'Desk' => 'Wakil Dekan 2'
        ]);

        // Classifications

        Classification::create([
            'Kode' => 'CL01',
            'Klas' => 'Klasifikasi Satu',
            'Aktif' => '2',
            'InAktif' => '0',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL02',
            'Klas' => 'Klasifikasi Dua',
            'Aktif' => '2',
            'InAktif' => '3',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL03',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL04',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL05',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL06',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL07',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL08',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL09',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL10',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL11',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL12',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        Classification::create([
            'Kode' => 'CL13',
            'Klas' => 'Klasifikasi Tiga',
            'Aktif' => '1',
            'InAktif' => '4',
            'TindakLanjut' => 'tindak lanjut'
        ]);

        // Locations
        Location::create([
            'KdLokasi' => 'LOK1',
            'KdUnit' => 'UN01',
            'Desk' => 'Lemari 1'
        ]);

        Location::create([
            'KdLokasi' => 'LOK2',
            'KdUnit' => 'UN03',
            'Desk' => 'Lemari 2'
        ]);

        Location::create([
            'KdLokasi' => 'LOK3',
            'KdUnit' => 'UN02',
            'Desk' => 'Lemari 3'
        ]);

        // ! Isi Disposisi
        IsiDisposisi::create([
            'Kode' => 'KD01',
            'Isi' => 'Beri Disposisi'
        ]);

        IsiDisposisi::create([
            'Kode' => 'KD02',
            'Isi' => 'Terima Disposisi'
        ]);

        // ! Surat Masuk
        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213161',
            'Pengirim' => 'FMIPA',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK1',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN02',
            'NoAgenda' => 'A213122',
            'Pengirim' => 'FMIPA02',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK1',
            'Klas' => 'CL02',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213132',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213134',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213139',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213143',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213100',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213104',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213103',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213102',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);

        SuratMasuk::create([
            'KdUnit' => 'UN03',
            'NoAgenda' => 'A213101',
            'Pengirim' => 'FMIPA03',
            'TglDiterima' => '21-08-2020',
            'SifatSurat' => 'Biasa',
            'StatusSurat' => 'Disimpan',
            'Lokasi' => 'LOK2',
            'Klas' => 'CL01',
            'TglSurat' => '20-08-2020',
            'NoSurat' => 'NS01',
            'Lamp' => 'Isi Lampiran',
            'IsiRingkas' => 'Isi Ringkasan',
            'TglHrsSelesai' => '23-08-2020',
            'Catatan' => 'Isi Catatan',
            'MasaAktif' => '2',
            'MasaInAktif' => '2',
            'LokasiMedia' => '0',
            'LokasiFisik' => '0',
        ]);
    }
}
