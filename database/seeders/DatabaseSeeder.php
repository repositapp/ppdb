<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aplikasi;
use App\Models\Artikel;
use App\Models\Dokumen;
use App\Models\Halaman;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Menu;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@themesbrand.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'admin',
            'status' => '1',
            'created_at' => now(),
        ]);
        User::updateOrCreate([
            'name' => 'Creator Berita',
            'username' => 'kreator',
            'email' => 'kreator@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'petugas',
            'status' => '1',
            'created_at' => now(),
        ]);
        User::updateOrCreate([
            'name' => 'Aldo',
            'username' => 'siswa',
            'email' => 'aldo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'avatar' => 'users-images/1J7iwiUja9gMqtHL7eIzR6RbaH0rrzZ5buklDQLy.png',
            'role' => 'siswa',
            'status' => '1',
            'created_at' => now(),
        ]);
        // User::factory(100)->create();

        Aplikasi::updateOrCreate([
            'nama_lembaga' => 'SMAN 2 Batauga',
            'telepon' => '0822-1690-1082',
            'fax' => '0822-1690-1082',
            'email' => 'sman2batauga@gmail.com',
            'alamat' => 'Jl. Gajah Mada, Kelurahan Masiri, Kecamatan Batauga, Kabupaten Buton, Sulawesi Tenggara',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.3509091053234!2d122.61879689999998!3d-5.6622875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da46984f0ded0b3%3A0x26383f068b6f5583!2sSMAN%202%20BATAUGA!5e0!3m2!1sid!2sid!4v1753264995948!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'nama_ketua' => 'Hanaruddin, S.Sos., M.Si.',
            'sidebar_lg' => 'SMAN 2 BATAUGA',
            'sidebar_mini' => 'S2B',
            'title_header' => 'Sistem Informasi Pendaftaran Siswa Baru SMAN 2 Batauga',
            'logo' => 'aplikasi-images/sman-2-batauga.png',
        ]);

        Kategori::create([
            'name' => 'Umum',
            'slug' => 'umum',
        ]);
        Kategori::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);
        Kategori::create([
            'name' => 'Prestasi Dan Inovasi',
            'slug' => 'prestasi-dan-inovasi',
        ]);
        Kategori::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi',
        ]);
        Kategori::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
        ]);
        Kategori::create([
            'name' => 'Kriminal',
            'slug' => 'kriminal',
        ]);
        Kategori::create([
            'name' => 'Sosial Kemasyarakatan',
            'slug' => 'sosial-kemasyarakatan',
        ]);
        Kategori::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
        ]);
        Kategori::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan',
        ]);
        Kategori::create([
            'name' => 'Bencana',
            'slug' => 'bencana',
        ]);
        Kategori::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan',
        ]);

        Pengumuman::factory(10)->create();

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Tentang SMAN 2 Batauga',
            'slug' => 'tentang-sman-2-batauga',
            'konten' => '<h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">1. Identitas Sekolah</strong></h3>
                        <div class="_tableContainer_80l1q_1">
                        <div class="_tableWrapper_80l1q_14 group flex w-fit flex-col-reverse" tabindex="-1">
                        <table style="border-collapse: collapse; width: 100%; border-width: 1px; border-spacing: 1.4px; border-style: solid; height: 447.812px;" border="1">
                        <thead>
                        <tr style="height: 22.3906px;">
                        <th style="border-width: 1px; padding: 10px; height: 22.3906px; text-align: left;">Keterangan</th>
                        <th style="border-width: 1px; padding: 10px; height: 22.3906px;">Informasi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Nama Sekolah</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">SMA Negeri 2 Batauga</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>NPSN</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Masukkan NPSN di sini]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>NSS</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Masukkan NSS jika tersedia]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Status Sekolah</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">Negeri</td>
                        </tr>
                        <tr style="height: 44.7812px;">
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;"><strong>Jenjang Pendidikan</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;">Sekolah Menengah Atas (SMA)</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Akreditasi</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[A/B/C &ndash; tuliskan hasil akreditasi terakhir]</td>
                        </tr>
                        <tr style="height: 44.7812px;">
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;"><strong>SK Pendirian Sekolah</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;">[Nomor dan tahun SK pendirian sekolah]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Tahun Berdiri</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Misalnya: 2008]</td>
                        </tr>
                        <tr style="height: 44.7812px;">
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;"><strong>Alamat</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 44.7812px;">Jl. Poros Batauga &ndash; Baubau, Kelurahan Lakambau, Kecamatan Batauga, Kabupaten Buton Selatan, Provinsi Sulawesi Tenggara</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Kode Pos</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">93763</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Telepon</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Isi nomor telepon resmi jika ada]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Email Resmi</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><a href="mailto:sman2batauga@gmail.com">sman2batauga@gmail.com</a></td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Website</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><a href="http://www.sman2batauga.sch.id/">www.sman2batauga.sch.id</a></td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Kepala Sekolah</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Nama Kepala Sekolah Saat Ini]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Jumlah Guru</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Misalnya: 32 orang]</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;"><strong>Jumlah Siswa</strong></td>
                        <td style="border-width: 1px; padding: 10px; height: 22.3906px;">[Misalnya: 420 siswa aktif]</td>
                        </tr>
                        </tbody>
                        </table>
                        <h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">2. Program Sekolah<br></strong></h3>
                        <ol data-start="3635" data-end="4103">
                        <li data-start="3635" data-end="3707">
                        <p data-start="3637" data-end="3707"><strong data-start="3637" data-end="3654">Kelas Digital</strong>: Pembelajaran berbasis digital dan media interaktif.</p>
                        </li>
                        <li data-start="3708" data-end="3755">
                        <p data-start="3710" data-end="3755"><strong data-start="3710" data-end="3723">Adiwiyata</strong>: Sekolah berwawasan lingkungan.</p>
                        </li>
                        <li data-start="3756" data-end="3831">
                        <p data-start="3758" data-end="3831"><strong data-start="3758" data-end="3784">Bina Prestasi Akademik</strong>: Persiapan OSN, KSN, dan lomba-lomba akademik.</p>
                        </li>
                        <li data-start="3832" data-end="3925">
                        <p data-start="3834" data-end="3925"><strong data-start="3834" data-end="3859">Ekstrakurikuler Aktif</strong>: Pramuka, Paskibra, PMR, Futsal, KIR, Seni Tari dan Musik Daerah.</p>
                        </li>
                        <li data-start="3926" data-end="4018">
                        <p data-start="3928" data-end="4018"><strong data-start="3928" data-end="3962">Pembinaan Karakter &amp; Keagamaan</strong>: Kajian rutin, tahfidz, dan pembiasaan salat berjamaah.</p>
                        </li>
                        <li data-start="4019" data-end="4103">
                        <p data-start="4021" data-end="4103"><strong data-start="4021" data-end="4046">Program Alumni Peduli</strong>: Kegiatan motivasi dan bimbingan masuk perguruan tinggi.</p>
                        </li>
                        </ol>
                        <h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">3. Ekstrakurikuler</strong></h3>
                        <table style="border-collapse: collapse; width: 100%; height: 223.906px; border-width: 1px; border-spacing: 1.4px; border-style: solid;" border="1">
                        <thead>
                        <tr style="height: 22.3906px;">
                        <th style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">No</th>
                        <th style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Nama Kegiatan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">1</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Pramuka</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">2</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Paskibra</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">3</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">PMR</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">4</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Kelompok Ilmiah Remaja (KIR)</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">5</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Futsal</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">6</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Seni Tari Tradisional</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">7</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Musik Daerah</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">8</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Rohani Islam</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="width: 5.18301%; height: 22.3906px; border-width: 1px; padding: 10px; text-align: center;">9</td>
                        <td style="width: 94.817%; height: 22.3906px; border-width: 1px; padding: 10px;">Bahasa Inggris (English Club)</td>
                        </tr>
                        </tbody>
                        </table>
                        <h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">4. Sarana &amp; Prasarana</strong></h3>
                        <ol>
                        <li data-start="4556" data-end="4605">
                        <p data-start="4558" data-end="4605">Ruang Kelas Representatif dan Ber-AC (sebagian)</p>
                        </li>
                        <li data-start="4606" data-end="4646">
                        <p data-start="4608" data-end="4646">Perpustakaan dengan koleksi buku aktif</p>
                        </li>
                        <li data-start="4647" data-end="4678">
                        <p data-start="4649" data-end="4678">Laboratorium Komputer dan IPA</p>
                        </li>
                        <li data-start="4679" data-end="4721">
                        <p data-start="4681" data-end="4721">Lapangan Olahraga (Futsal, Voli, Basket)</p>
                        </li>
                        <li data-start="4722" data-end="4749">
                        <p data-start="4724" data-end="4749">Ruang Guru dan Tata Usaha</p>
                        </li>
                        <li data-start="4750" data-end="4766">
                        <p data-start="4752" data-end="4766">Masjid Sekolah</p>
                        </li>
                        <li data-start="4767" data-end="4814">
                        <p data-start="4769" data-end="4814">Toilet bersih dan terpisah untuk siswa &amp; guru</p>
                        </li>
                        <li data-start="4815" data-end="4829">
                        <p data-start="4817" data-end="4829">Kantin Sehat</p>
                        </li>
                        <li data-start="4830" data-end="4855">
                        <p data-start="4832" data-end="4855">Kebun dan Taman Sekolah</p>
                        </li>
                        <li data-start="4856" data-end="4899">
                        <p data-start="4858" data-end="4899">Akses Internet (Wi-Fi) untuk pembelajaran</p>
                        </li>
                        </ol>
                        <h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">5. Prestasi Sekolah</strong></h3>
                        <table style="border-collapse: collapse; width: 100%; height: 111.953px; border-width: 1px; border-spacing: 1.4px; border-style: solid; margin-left: auto; margin-right: auto;" border="1">
                        <thead>
                        <tr style="height: 22.3906px;">
                        <th style="height: 22.3906px; width: 7.88321%; border-width: 1px; padding: 10px; text-align: center;">Tahun</th>
                        <th style="height: 22.3906px; width: 73.6478%; border-width: 1px; padding: 10px;">Prestasi</th>
                        <th style="height: 22.3906px; width: 18.469%; border-width: 1px; padding: 10px;">Tingkat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; width: 7.88321%; border-width: 1px; padding: 10px; text-align: center;">2023</td>
                        <td style="height: 22.3906px; width: 73.6478%; border-width: 1px; padding: 10px;">Juara 2 Lomba Cerdas Cermat Sains</td>
                        <td style="height: 22.3906px; width: 18.469%; border-width: 1px; padding: 10px;">Kabupaten</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; width: 7.88321%; border-width: 1px; padding: 10px; text-align: center;">2022</td>
                        <td style="height: 22.3906px; width: 73.6478%; border-width: 1px; padding: 10px;">Juara 1 Lomba Tari Kreasi</td>
                        <td style="height: 22.3906px; width: 18.469%; border-width: 1px; padding: 10px;">Provinsi</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; width: 7.88321%; border-width: 1px; padding: 10px; text-align: center;">2021</td>
                        <td style="height: 22.3906px; width: 73.6478%; border-width: 1px; padding: 10px;">Juara Harapan 1 KSN Matematika</td>
                        <td style="height: 22.3906px; width: 18.469%; border-width: 1px; padding: 10px;">Nasional</td>
                        </tr>
                        <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; width: 7.88321%; border-width: 1px; padding: 10px; text-align: center;">2021</td>
                        <td style="height: 22.3906px; width: 73.6478%; border-width: 1px; padding: 10px;">Sekolah Adiwiyata Tingkat Kabupaten</td>
                        <td style="height: 22.3906px; width: 18.469%; border-width: 1px; padding: 10px;">Kabupaten</td>
                        </tr>
                        </tbody>
                        </table>
                        <h3 data-start="324" data-end="352"><strong data-start="328" data-end="352">6. Sarana &amp; Prasarana</strong></h3>
                        <p>SMAN 2 Batauga berkomitmen menjadi lembaga pendidikan yang terbuka, jujur, dan profesional dalam memberikan pelayanan kepada seluruh peserta didik dan orang tua/wali murid, serta menjalin kemitraan aktif dengan masyarakat dan pemerintah.</p>
                        </div>
                        </div>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Visi Misi',
            'slug' => 'visi-misi',
            'konten' => '<h3 data-start="266" data-end="278"><strong>Visi</strong></h3>
                        <blockquote data-start="2100" data-end="2292">
                        <p data-start="2102" data-end="2292"><em data-start="2102" data-end="2292">"Mewujudkan peserta didik yang beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, berprestasi, berbudaya, serta peduli terhadap lingkungan dan mampu bersaing di era global.&rdquo;</em></p>
                        </blockquote>
                        <h3 data-start="934" data-end="946"><strong data-start="938" data-end="946">Misi</strong></h3>
                        <ol>
                        <li data-start="2323" data-end="2416">
                        <p data-start="2326" data-end="2416">Menanamkan nilai-nilai keimanan dan ketakwaan melalui kegiatan keagamaan yang terstruktur.</p>
                        </li>
                        <li data-start="2417" data-end="2545">
                        <p data-start="2420" data-end="2545">Mengembangkan pembelajaran yang aktif, kreatif, efektif, dan menyenangkan untuk mendorong prestasi akademik dan non-akademik.</p>
                        </li>
                        <li data-start="2546" data-end="2627">
                        <p data-start="2549" data-end="2627">Menanamkan nilai-nilai moral dan karakter melalui pembiasaan perilaku positif.</p>
                        </li>
                        <li data-start="2628" data-end="2722">
                        <p data-start="2631" data-end="2722">Meningkatkan kemampuan literasi digital dan teknologi informasi di kalangan siswa dan guru.</p>
                        </li>
                        <li data-start="2723" data-end="2805">
                        <p data-start="2726" data-end="2805">Menumbuhkan kepedulian terhadap lingkungan hidup melalui program sekolah hijau.</p>
                        </li>
                        <li data-start="2806" data-end="2901">
                        <p data-start="2809" data-end="2901">Mengembangkan budaya disiplin, kerja keras, dan tanggung jawab sebagai karakter utama siswa.</p>
                        </li>
                        </ol>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Tujuan Sekolah',
            'slug' => 'tujuan-sekolah',
            'konten' => '<h3 style="text-align: justify;" data-start="141" data-end="190"><strong data-start="145" data-end="190">Tujuan Sekolah</strong></h3>
                        <ol data-start="2934" data-end="3307">
                        <li data-start="2934" data-end="3028">
                        <p data-start="2936" data-end="3028">Menghasilkan lulusan yang memiliki kompetensi intelektual, emosional, sosial, dan spiritual.</p>
                        </li>
                        <li data-start="3029" data-end="3102">
                        <p data-start="3031" data-end="3102">Meningkatkan jumlah lulusan yang diterima di perguruan tinggi unggulan.</p>
                        </li>
                        <li data-start="3103" data-end="3177">
                        <p data-start="3105" data-end="3177">Menumbuhkan kebanggaan dan kecintaan terhadap budaya lokal dan nasional.</p>
                        </li>
                        <li data-start="3178" data-end="3248">
                        <p data-start="3180" data-end="3248">Meningkatkan kemampuan siswa dalam bidang sains, seni, dan olahraga.</p>
                        </li>
                        <li data-start="3249" data-end="3307">
                        <p data-start="3251" data-end="3307">Mewujudkan sekolah yang bersih, sehat, aman, dan nyaman.</p>
                        </li>
                        </ol>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Struktur Organisasi',
            'slug' => 'struktur-organisasi',
            'konten' => '<ol data-start="3353" data-end="3600">
                        <li data-start="3353" data-end="3371">
                        <p data-start="3355" data-end="3371">Kepala Sekolah</p>
                        </li>
                        <li data-start="3372" data-end="3435">
                        <p data-start="3374" data-end="3435">Wakil Kepala Sekolah (Kurikulum, Kesiswaan, Sarpras, Humas)</p>
                        </li>
                        <li data-start="3436" data-end="3461">
                        <p data-start="3438" data-end="3461">Koordinator Kurikulum</p>
                        </li>
                        <li data-start="3462" data-end="3476">
                        <p data-start="3464" data-end="3476">Wali Kelas</p>
                        </li>
                        <li data-start="3477" data-end="3500">
                        <p data-start="3479" data-end="3500">Guru Mata Pelajaran</p>
                        </li>
                        <li data-start="3501" data-end="3528">
                        <p data-start="3503" data-end="3528">Pembina Ekstrakurikuler</p>
                        </li>
                        <li data-start="3529" data-end="3543">
                        <p data-start="3531" data-end="3543">Tata Usaha</p>
                        </li>
                        <li data-start="3544" data-end="3568">
                        <p data-start="3546" data-end="3568">Pustakawan &amp; Laboran</p>
                        </li>
                        <li data-start="3569" data-end="3600">
                        <p data-start="3571" data-end="3600">Satpam dan Petugas Kebersihan</p>
                        </li>
                        </ol>',
            'status' => 1,
        ]);

        // Halaman::factory(20)->create();

        Menu::create([
            'name' => 'Profil',
            'slug' => 'profil',
            'type' => 'halaman',
            'target_id' => null,
            'parent_id' => null,
            'order' => 1,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Tentang',
            'slug' => 'tentang',
            'type' => 'halaman',
            'target_id' => 1,
            'parent_id' => 1,
            'order' => 1,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Visi Misi',
            'slug' => 'visi-misi',
            'type' => 'halaman',
            'target_id' => 2,
            'parent_id' => 1,
            'order' => 2,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Tujuan Sekolah',
            'slug' => 'tujuan-sekolah',
            'type' => 'halaman',
            'target_id' => 3,
            'parent_id' => 1,
            'order' => 3,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Struktur Organisasi',
            'slug' => 'struktur-organisasi',
            'type' => 'halaman',
            'target_id' => 4,
            'parent_id' => 1,
            'order' => 4,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Pengumuman',
            'slug' => 'pengumuman',
            'type' => 'pengumuman',
            'target_id' => null,
            'parent_id' => null,
            'order' => 2,
            'status' => 1,
        ]);

        $this->call([
            CalonSiswaSeeder::class,
            DokumenPendaftaranSeeder::class,
            LogSeeder::class,
            KartuUjianSeeder::class,
        ]);
    }
}
