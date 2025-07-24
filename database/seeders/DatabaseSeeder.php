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
        // User::factory(100)->create();

        Aplikasi::updateOrCreate([
            'nama_lembaga' => 'SMAN 2 Batauga',
            'telepon' => '0822-1690-1082',
            'fax' => '0822-1690-1082',
            'email' => 'sman2batauga@gmail.com',
            'alamat' => 'Jl. Gajah Mada, Kelurahan Masiri, Kecamatan Batauga, Kabupaten Buton, Sulawesi Tenggara',
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.3509091053234!2d122.61879689999998!3d-5.6622875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da46984f0ded0b3%3A0x26383f068b6f5583!2sSMAN%202%20BATAUGA!5e0!3m2!1sid!2sid!4v1753264995948!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'nama_ketua' => 'Hanaruddin, S.Sos., M.Si.',
            'sidebar_lg' => 'SMAN 2 Batauga',
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
            'judul' => 'Tentang Dinas Sosial',
            'slug' => 'tentang-dinas-sosial',
            'konten' => '<p style="text-align: justify;" data-start="140" data-end="524">Dinas Sosial Kota Baubau merupakan salah satu perangkat daerah yang menjalankan fungsi strategis dalam penyelenggaraan urusan pemerintahan daerah di bidang kesejahteraan sosial. Keberadaan Dinas Sosial menjadi sangat vital dalam upaya pembangunan manusia seutuhnya, khususnya dalam memberikan perlindungan dan pelayanan kepada masyarakat yang menghadapi berbagai permasalahan sosial.</p>
                        <p style="text-align: justify;" data-start="526" data-end="896">Dinas ini memiliki peran penting dalam memastikan terpenuhinya hak-hak sosial warga negara, terutama mereka yang tergolong dalam kelompok rentan dan membutuhkan perhatian khusus. Kelompok ini mencakup fakir miskin, lanjut usia, penyandang disabilitas, anak terlantar, korban penyalahgunaan narkoba, korban bencana sosial, korban kekerasan, serta kelompok rentan lainnya.</p>
                        <p style="text-align: justify;" data-start="898" data-end="1209">Dalam menjalankan tugas dan fungsinya, Dinas Sosial Kota Baubau mengedepankan prinsip keadilan sosial, pemberdayaan masyarakat, kesetaraan, serta partisipasi aktif dari berbagai elemen masyarakat. Visi dari dinas ini adalah terwujudnya masyarakat Kota Baubau yang sejahtera, berdaya, dan tangguh secara sosial.</p>
                        <p style="text-align: justify;" data-start="1211" data-end="1399">Melalui program-program yang terstruktur, terintegrasi, dan berkesinambungan, Dinas Sosial berkomitmen untuk meningkatkan kualitas hidup masyarakat dengan berbagai pendekatan, antara lain:</p>
                        <ul style="text-align: justify;">
                        <li data-start="1401" data-end="1568">
                        <p data-start="1403" data-end="1568"><strong data-start="1403" data-end="1431">Pemberian Bantuan Sosial</strong> yang tepat sasaran, baik dalam bentuk tunai maupun non-tunai, kepada masyarakat yang mengalami kesulitan ekonomi atau terdampak bencana;</p>
                        </li>
                        <li data-start="1569" data-end="1731">
                        <p data-start="1571" data-end="1731"><strong data-start="1571" data-end="1610">Penyelenggaraan Rehabilitasi Sosial</strong>, yang meliputi pemulihan, penguatan, dan reintegrasi sosial bagi individu atau kelompok yang mengalami disfungsi sosial;</p>
                        </li>
                        <li data-start="1732" data-end="1877">
                        <p data-start="1734" data-end="1877"><strong data-start="1734" data-end="1757">Pemberdayaan Sosial</strong>, untuk mendorong kemandirian masyarakat melalui pelatihan keterampilan, bantuan modal usaha, serta pendampingan sosial;</p>
                        </li>
                        <li data-start="1878" data-end="2084">
                        <p data-start="1880" data-end="2084"><strong data-start="1880" data-end="1909">Penanggulangan Kemiskinan</strong>, melalui berbagai bentuk intervensi, baik dalam bentuk program perlindungan sosial, peningkatan akses layanan dasar, maupun penguatan kelembagaan sosial di tingkat komunitas.</p>
                        </li>
                        </ul>
                        <p style="text-align: justify;" data-start="2086" data-end="2412">Dinas Sosial juga aktif menjalin kerja sama lintas sektor, baik dengan lembaga pemerintah lainnya, organisasi non-pemerintah, lembaga keagamaan, dunia usaha, maupun komunitas lokal. Kolaborasi ini dibangun dalam rangka memperkuat jejaring sosial dan menciptakan sinergi dalam pelaksanaan berbagai program kesejahteraan sosial.</p>
                        <p style="text-align: justify;" data-start="2414" data-end="2715">Selain itu, Dinas Sosial Kota Baubau terus mendorong pemanfaatan teknologi informasi dalam penyelenggaraan pelayanan sosial yang lebih cepat, transparan, dan akuntabel. Transformasi digital dalam sistem pelayanan memungkinkan masyarakat untuk lebih mudah mengakses informasi dan bantuan yang tersedia.</p>
                        <p style="text-align: justify;" data-start="2717" data-end="3051">Dengan semangat pelayanan yang humanis, profesional, dan responsif, Dinas Sosial Kota Baubau terus berupaya menjadi garda terdepan dalam membangun lingkungan sosial yang inklusif, harmonis, dan berkeadilan. Komitmen ini menjadi bagian dari upaya bersama menuju Kota Baubau yang lebih sejahtera dan berdaya secara sosial di masa depan.</p>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Visi Misi',
            'slug' => 'visi-misi',
            'konten' => '<h3 data-start="266" data-end="278"><strong>Visi</strong></h3>
                            <p data-start="280" data-end="390">&ldquo;Terwujudnya kesejahteraan sosial yang berkeadilan dan berkelanjutan bagi seluruh masyarakat Kota Baubau.&rdquo;</p>
                            <h3 data-start="934" data-end="946"><strong data-start="938" data-end="946">Misi</strong></h3>
                            <ol>
                            <li data-start="951" data-end="1059">Meningkatkan kualitas layanan dan perlindungan sosial bagi Penyandang Masalah Kesejahteraan Sosial (PMKS).</li>
                            <li data-start="1060" data-end="1165">
                            <p data-start="1063" data-end="1165">Mengembangkan program pemberdayaan sosial yang berkelanjutan untuk mendorong kemandirian masyarakat.</p>
                            </li>
                            <li data-start="1166" data-end="1278">
                            <p data-start="1169" data-end="1278">Menyediakan sistem data dan informasi kesejahteraan sosial yang akurat sebagai dasar pengambilan kebijakan.</p>
                            </li>
                            <li data-start="1279" data-end="1384">
                            <p data-start="1282" data-end="1384">Meningkatkan koordinasi dan kolaborasi dengan lembaga sosial, masyarakat, serta stakeholder terkait.</p>
                            </li>
                            <li data-start="1385" data-end="1502">
                            <p data-start="1388" data-end="1502">Meningkatkan kapasitas aparatur dan kelembagaan sosial melalui pendidikan, pelatihan, dan pembinaan berkelanjutan.</p>
                            </li>
                            </ol>
                            <h3 data-start="392" data-end="415"><strong data-start="396" data-end="415">Penjelasan Visi</strong></h3>
                            <p style="text-align: justify;" data-start="417" data-end="927">Visi ini mencerminkan tujuan utama Dinas Sosial Kota Baubau dalam membangun masyarakat yang sejahtera secara sosial, dengan menjunjung tinggi keadilan dan keberlanjutan. Kata <em data-start="594" data-end="609">&ldquo;berkeadilan&rdquo;</em> menegaskan bahwa pelayanan sosial harus diberikan tanpa diskriminasi, menyentuh seluruh lapisan masyarakat, terutama kelompok rentan. Sementara itu, <em data-start="759" data-end="776">&ldquo;berkelanjutan&rdquo; </em>berarti setiap program sosial harus dirancang agar dapat berlangsung dalam jangka panjang dan mampu menghadapi tantangan sosial yang terus berkembang.</p>
                            <h3 data-start="1509" data-end="1532"><strong data-start="1513" data-end="1532">Penjelasan Misi</strong></h3>
                            <p style="text-align: justify;" data-start="1534" data-end="1956"><strong data-start="1534" data-end="1646">1. Meningkatkan kualitas layanan dan perlindungan sosial bagi Penyandang Masalah Kesejahteraan Sosial (PMKS)</strong><br data-start="1646" data-end="1649">Misi ini menitikberatkan pada peningkatan mutu pelayanan sosial yang diberikan kepada kelompok rentan seperti anak terlantar, lansia, penyandang disabilitas, dan korban bencana sosial. Tujuannya adalah untuk memastikan mereka memperoleh hak sosial dasar serta perlindungan dari risiko sosial yang mengancam.</p>
                            <p style="text-align: justify;" data-start="1958" data-end="2348"><strong data-start="1958" data-end="2064">2. Mengembangkan program pemberdayaan sosial yang berkelanjutan untuk mendorong kemandirian masyarakat</strong><br data-start="2064" data-end="2067">Pemberdayaan sosial bertujuan untuk menciptakan masyarakat yang mandiri secara ekonomi dan sosial. Program seperti pelatihan keterampilan, pendampingan usaha kecil, dan bantuan modal merupakan bentuk intervensi yang berkelanjutan guna mengurangi ketergantungan pada bantuan sosial.</p>
                            <p style="text-align: justify;" data-start="2350" data-end="2738"><strong data-start="2350" data-end="2463">3. Menyediakan sistem data dan informasi kesejahteraan sosial yang akurat sebagai dasar pengambilan kebijakan</strong><br data-start="2463" data-end="2466">Data yang akurat dan terbarukan sangat penting untuk mendukung kebijakan dan program sosial yang tepat sasaran. Misi ini bertujuan membangun sistem informasi sosial yang terpadu, berbasis digital, dan dapat digunakan sebagai rujukan dalam perencanaan dan evaluasi program.</p>
                            <p style="text-align: justify;" data-start="2740" data-end="3119"><strong data-start="2740" data-end="2846">4. Meningkatkan koordinasi dan kolaborasi dengan lembaga sosial, masyarakat, serta stakeholder terkait</strong><br data-start="2846" data-end="2849">Dinas Sosial tidak dapat bekerja sendiri dalam menyelesaikan permasalahan sosial. Oleh karena itu, dibutuhkan kerja sama yang erat dengan berbagai pihak&mdash;baik dari sektor pemerintah, swasta, maupun masyarakat sipil&mdash;untuk memperkuat efektivitas dan cakupan layanan sosial.</p>
                            <p style="text-align: justify;" data-start="3121" data-end="3481"><strong data-start="3121" data-end="3241">5. Meningkatkan kapasitas aparatur dan kelembagaan sosial melalui pendidikan, pelatihan, dan pembinaan berkelanjutan</strong><br data-start="3241" data-end="3244">Pelayanan sosial yang berkualitas memerlukan sumber daya manusia yang profesional dan terlatih. Misi ini mencakup upaya peningkatan kemampuan teknis, manajerial, dan etika pelayanan bagi aparatur Dinas Sosial maupun lembaga sosial mitra.</p>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Tujuan Stategis',
            'slug' => 'tujuan-stategis',
            'konten' => '<h3 style="text-align: justify;" data-start="141" data-end="190"><strong data-start="145" data-end="190">Tujuan Strategis Dinas Sosial Kota Baubau</strong></h3>
                        <p style="text-align: justify;" data-start="849" data-end="1190"><strong data-start="849" data-end="946">1. Meningkatkan efektivitas pelayanan dan perlindungan sosial bagi masyarakat rentan dan PMKS</strong><br data-start="946" data-end="949">Tujuan ini diarahkan untuk memastikan bahwa seluruh bentuk bantuan dan layanan sosial dapat diterima secara tepat sasaran, responsif terhadap kebutuhan, serta mampu memberikan dampak nyata dalam melindungi kelompok rentan dari risiko sosial.</p>
                        <p style="text-align: justify;" data-start="1192" data-end="1547"><strong data-start="1192" data-end="1292">2. Mendorong terciptanya masyarakat yang mandiri dan berdaya melalui program pemberdayaan sosial</strong><br data-start="1292" data-end="1295">Melalui pelaksanaan program pemberdayaan seperti pelatihan keterampilan, bantuan usaha ekonomi produktif, dan pembinaan sosial, masyarakat diharapkan dapat mengembangkan potensi dirinya dan tidak bergantung secara terus-menerus pada bantuan pemerintah.</p>
                        <p style="text-align: justify;" data-start="1549" data-end="1902"><strong data-start="1549" data-end="1649">3. Mewujudkan sistem pendataan dan informasi sosial yang akurat, terintegrasi, dan dapat diakses</strong><br data-start="1649" data-end="1652">Tujuan ini berfokus pada pengembangan sistem data berbasis teknologi informasi, yang tidak hanya memudahkan proses verifikasi dan validasi penerima manfaat, tetapi juga sebagai alat pengambilan kebijakan yang berbasis bukti (<em data-start="1877" data-end="1900">evidence-based policy</em>).</p>
                        <p style="text-align: justify;" data-start="1904" data-end="2276"><strong data-start="1904" data-end="2000">4. Memperkuat sinergi dan kemitraan lintas sektor dalam penyelenggaraan kesejahteraan sosial</strong><br data-start="2000" data-end="2003">Dinas Sosial perlu menjalin kerja sama yang kuat dengan instansi pemerintah, organisasi non-pemerintah, lembaga keagamaan, dunia usaha, dan masyarakat untuk menciptakan jejaring sosial yang kuat, sehingga program yang dijalankan menjadi lebih komprehensif dan berdaya guna.</p>
                        <p style="text-align: justify;" data-start="2278" data-end="2601"><strong data-start="2278" data-end="2361">5. Meningkatkan kompetensi sumber daya manusia dan kapasitas kelembagaan sosial</strong><br data-start="2361" data-end="2364">Peningkatan kualitas SDM baik di internal Dinas Sosial maupun pada lembaga sosial masyarakat bertujuan menciptakan pelayanan yang lebih profesional, akuntabel, dan siap menghadapi tantangan sosial yang terus berkembang di masa mendatang.</p>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Tugas Pokok dan Fungsi',
            'slug' => 'tugas-pokok-dan-fungsi',
            'konten' => '<h3 style="text-align: justify;" data-start="1246" data-end="1268"><strong data-start="1250" data-end="1268">A. Tugas Pokok</strong></h3>
                        <p style="text-align: justify;" data-start="1270" data-end="1316">Dinas Sosial Kota Baubau memiliki tugas pokok:</p>
                        <blockquote data-start="1318" data-end="1429">
                        <p data-start="1320" data-end="1429"><strong data-start="1320" data-end="1429">"Melaksanakan urusan pemerintahan daerah di bidang sosial berdasarkan asas otonomi dan tugas pembantuan."</strong></p>
                        </blockquote>
                        <p style="text-align: justify;" data-start="1431" data-end="1608">Tugas ini meliputi perencanaan, pelaksanaan, pengawasan, dan evaluasi terhadap seluruh program yang berkaitan dengan penyelenggaraan kesejahteraan sosial di wilayah Kota Baubau.</p>
                        <h3 data-start="1615" data-end="1632"><strong data-start="1619" data-end="1632">B. Fungsi</strong></h3>
                        <p data-start="1634" data-end="1729">Dalam rangka melaksanakan tugas pokoknya, Dinas Sosial menyelenggarakan fungsi sebagai berikut:</p>
                        <ol data-start="1731" data-end="2869">
                        <li data-start="1731" data-end="1835">
                        <p data-start="1734" data-end="1835"><strong data-start="1734" data-end="1781">Perumusan kebijakan teknis di bidang sosial</strong> sesuai dengan ketentuan peraturan perundang-undangan.</p>
                        </li>
                        <li data-start="1836" data-end="1928">
                        <p data-start="1839" data-end="1928"><strong data-start="1839" data-end="1893">Pelaksanaan urusan pemerintahan dan pelayanan umum</strong> dalam bidang kesejahteraan sosial.</p>
                        </li>
                        <li data-start="1929" data-end="2087">
                        <p data-start="1932" data-end="2087"><strong data-start="1932" data-end="2007">Pelaksanaan pembinaan dan pengawasan terhadap lembaga sosial masyarakat</strong> seperti Karang Taruna, Lembaga Kesejahteraan Sosial (LKS), Tagana, dan lainnya.</p>
                        </li>
                        <li data-start="2088" data-end="2249">
                        <p data-start="2091" data-end="2249"><strong data-start="2091" data-end="2130">Penyelenggaraan rehabilitasi sosial</strong> bagi kelompok rentan seperti anak terlantar, lansia, penyandang disabilitas, korban kekerasan, dan penyalahguna napza.</p>
                        </li>
                        <li data-start="2250" data-end="2363">
                        <p data-start="2253" data-end="2363"><strong data-start="2253" data-end="2281">Pemberian bantuan sosial</strong> kepada masyarakat yang terdampak kemiskinan, bencana alam, maupun bencana sosial.</p>
                        </li>
                        <li data-start="2364" data-end="2459">
                        <p data-start="2367" data-end="2459"><strong data-start="2367" data-end="2401">Pemberdayaan sosial masyarakat</strong> melalui pelatihan, pendampingan, dan bantuan modal usaha.</p>
                        </li>
                        <li data-start="2460" data-end="2580">
                        <p data-start="2463" data-end="2580"><strong data-start="2463" data-end="2519">Pengelolaan Data Terpadu Kesejahteraan Sosial (DTKS)</strong> dan pemutakhiran basis data penerima manfaat program sosial.</p>
                        </li>
                        <li data-start="2581" data-end="2670">
                        <p data-start="2584" data-end="2670"><strong data-start="2584" data-end="2654">Penyusunan laporan dan evaluasi pelaksanaan kegiatan bidang sosial</strong> secara berkala.</p>
                        </li>
                        <li data-start="2671" data-end="2770">
                        <p data-start="2674" data-end="2770"><strong data-start="2674" data-end="2770">Koordinasi dengan instansi vertikal, lembaga non-pemerintah, dan mitra kerja sosial lainnya.</strong></p>
                        </li>
                        <li data-start="2771" data-end="2869">
                        <p data-start="2775" data-end="2869"><strong data-start="2775" data-end="2869">Pelaksanaan fungsi lain yang diberikan oleh Wali Kota sesuai peraturan perundang-undangan.</strong></p>
                        </li>
                        </ol>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Struktur Organisasi',
            'slug' => 'struktur-organisasi',
            'konten' => '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/storage/photos/1/ChatGPT Image 29 Jun 2025, 20.09.56.png" alt="" width="556" height="834"></p>
                        <h3 style="text-align: justify;" data-start="192" data-end="215">1. <strong data-start="199" data-end="215">Kepala Dinas</strong></h3>
                        <p style="text-align: justify;" data-start="216" data-end="226"><strong data-start="216" data-end="226">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="227" data-end="511">
                        <li data-start="227" data-end="282">
                        <p data-start="229" data-end="282">Memimpin dan mengoordinasikan seluruh kegiatan dinas.</p>
                        </li>
                        <li data-start="283" data-end="361">
                        <p data-start="285" data-end="361">Menyusun dan menetapkan kebijakan strategis bidang sosial di tingkat daerah.</p>
                        </li>
                        <li data-start="362" data-end="446">
                        <p data-start="364" data-end="446">Melakukan pengawasan dan evaluasi terhadap pelaksanaan program kerja seluruh unit.</p>
                        </li>
                        <li data-start="447" data-end="511">
                        <p data-start="449" data-end="511">Memberikan laporan kepada Wali Kota melalui Sekretaris Daerah.</p>
                        </li>
                        </ul>
                        <hr data-start="513" data-end="516">
                        <h3 style="text-align: justify;" data-start="518" data-end="540">2. <strong data-start="525" data-end="540">Sekretariat</strong></h3>
                        <p style="text-align: justify;" data-start="541" data-end="551"><strong data-start="541" data-end="551">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="552" data-end="749">
                        <li data-start="552" data-end="610">
                        <p data-start="554" data-end="610">Memberikan dukungan administratif kepada seluruh bidang.</p>
                        </li>
                        <li data-start="611" data-end="688">
                        <p data-start="613" data-end="688">Mengelola perencanaan, keuangan, kepegawaian, perlengkapan, dan tata usaha.</p>
                        </li>
                        <li data-start="689" data-end="749">
                        <p data-start="691" data-end="749">Menyusun laporan pelaksanaan kegiatan rutin dan non-rutin.</p>
                        </li>
                        </ul>
                        <h4 style="text-align: justify;" data-start="751" data-end="794">a. <strong data-start="759" data-end="794">Sub Bagian Umum dan Kepegawaian</strong></h4>
                        <p style="text-align: justify;" data-start="795" data-end="805"><strong data-start="795" data-end="805">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="806" data-end="975">
                        <li data-start="806" data-end="867">
                        <p data-start="808" data-end="867">Mengelola administrasi surat menyurat, arsip, dan logistik.</p>
                        </li>
                        <li data-start="868" data-end="931">
                        <p data-start="870" data-end="931">Mengelola data dan pengembangan sumber daya manusia aparatur.</p>
                        </li>
                        <li data-start="932" data-end="975">
                        <p data-start="934" data-end="975">Menyusun laporan kepegawaian dan absensi.</p>
                        </li>
                        </ul>
                        <h4 style="text-align: justify;" data-start="977" data-end="1008">b. <strong data-start="985" data-end="1008">Sub Bagian Keuangan</strong></h4>
                        <p style="text-align: justify;" data-start="1009" data-end="1019"><strong data-start="1009" data-end="1019">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="1020" data-end="1226">
                        <li data-start="1020" data-end="1060">
                        <p data-start="1022" data-end="1060">Menyusun dan mengelola anggaran dinas.</p>
                        </li>
                        <li data-start="1061" data-end="1144">
                        <p data-start="1063" data-end="1144">Menyusun laporan keuangan, pelaksanaan anggaran, dan pelaporan realisasi belanja.</p>
                        </li>
                        <li data-start="1145" data-end="1226">
                        <p data-start="1147" data-end="1226">Menjalankan pengelolaan keuangan sesuai prinsip transparansi dan akuntabilitas.</p>
                        </li>
                        </ul>
                        <hr data-start="1228" data-end="1231">
                        <h3 style="text-align: justify;" data-start="1233" data-end="1270">3. <strong data-start="1240" data-end="1270">Bidang Rehabilitasi Sosial</strong></h3>
                        <p style="text-align: justify;" data-start="1271" data-end="1281"><strong data-start="1271" data-end="1281">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="1282" data-end="1556">
                        <li data-start="1282" data-end="1406">
                        <p data-start="1284" data-end="1406">Menangani masalah sosial yang meliputi anak terlantar, lanjut usia, disabilitas, korban kekerasan, dan penyalahgunaan zat.</p>
                        </li>
                        <li data-start="1407" data-end="1474">
                        <p data-start="1409" data-end="1474">Merancang program pemulihan sosial dan reintegrasi ke masyarakat.</p>
                        </li>
                        <li data-start="1475" data-end="1556">
                        <p data-start="1477" data-end="1556">Menjalin kerja sama dengan panti sosial, LKS, dan lembaga layanan rehabilitasi.</p>
                        </li>
                        </ul>
                        <hr data-start="1558" data-end="1561">
                        <h3 style="text-align: justify;" data-start="1563" data-end="1612">4. <strong data-start="1570" data-end="1612">Bidang Perlindungan dan Jaminan Sosial</strong></h3>
                        <p style="text-align: justify;" data-start="1613" data-end="1623"><strong data-start="1613" data-end="1623">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="1624" data-end="1859">
                        <li data-start="1624" data-end="1706">
                        <p data-start="1626" data-end="1706">Menyelenggarakan perlindungan bagi masyarakat terdampak bencana alam dan sosial.</p>
                        </li>
                        <li data-start="1707" data-end="1797">
                        <p data-start="1709" data-end="1797">Menyalurkan bantuan sosial (bansos) kepada korban bencana, konflik sosial, atau musibah.</p>
                        </li>
                        <li data-start="1798" data-end="1859">
                        <p data-start="1800" data-end="1859">Mengelola program jaminan sosial daerah dan darurat sosial.</p>
                        </li>
                        </ul>
                        <hr data-start="1861" data-end="1864">
                        <h3 style="text-align: justify;" data-start="1866" data-end="1903">5. <strong data-start="1873" data-end="1903">Bidang Pemberdayaan Sosial</strong></h3>
                        <p style="text-align: justify;" data-start="1904" data-end="1914"><strong data-start="1904" data-end="1914">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="1915" data-end="2169">
                        <li data-start="1915" data-end="2002">
                        <p data-start="1917" data-end="2002">Meningkatkan kapasitas masyarakat melalui pelatihan dan program kewirausahaan sosial.</p>
                        </li>
                        <li data-start="2003" data-end="2095">
                        <p data-start="2005" data-end="2095">Membina dan mengembangkan potensi kelembagaan sosial seperti Karang Taruna, LKS, dan TKSK.</p>
                        </li>
                        <li data-start="2096" data-end="2169">
                        <p data-start="2098" data-end="2169">Mendorong partisipasi aktif masyarakat dalam penanganan masalah sosial.</p>
                        </li>
                        </ul>
                        <hr data-start="2171" data-end="2174">
                        <h3 style="text-align: justify;" data-start="2176" data-end="2217">6. <strong data-start="2183" data-end="2217">Bidang Penanganan Fakir Miskin</strong></h3>
                        <p style="text-align: justify;" data-start="2218" data-end="2228"><strong data-start="2218" data-end="2228">Tugas:</strong></p>
                        <ul style="text-align: justify;" data-start="2229" data-end="2499">
                        <li data-start="2229" data-end="2287">
                        <p data-start="2231" data-end="2287">Mengidentifikasi dan memverifikasi data keluarga miskin.</p>
                        </li>
                        <li data-start="2288" data-end="2357">
                        <p data-start="2290" data-end="2357">Menyusun dan melaksanakan program penanggulangan kemiskinan daerah.</p>
                        </li>
                        <li data-start="2358" data-end="2430">
                        <p data-start="2360" data-end="2430">Memutakhirkan DTKS (Data Terpadu Kesejahteraan Sosial) secara berkala.</p>
                        </li>
                        <li data-start="2431" data-end="2499">
                        <p data-start="2433" data-end="2499">Memonitor bantuan sosial bersyarat seperti PKH, BPNT, dan lainnya.</p>
                        </li>
                        </ul>
                        <hr data-start="2501" data-end="2504">
                        <h3 style="text-align: justify;" data-start="2506" data-end="2552">7. <strong data-start="2513" data-end="2552">UPTD (Unit Pelaksana Teknis Daerah)</strong></h3>
                        <p style="text-align: justify;" data-start="2553" data-end="2563"><strong data-start="2553" data-end="2563">Tugas:</strong></p>
                        <ul data-start="2564" data-end="2807">
                        <li style="text-align: justify;" data-start="2564" data-end="2692">
                        <p data-start="2566" data-end="2692">Menjalankan layanan teknis operasional di lapangan sesuai bidangnya (misalnya: panti, rumah singgah, atau balai rehabilitasi).</p>
                        </li>
                        <li style="text-align: justify;" data-start="2693" data-end="2752">
                        <p data-start="2695" data-end="2752">Melaksanakan program dan kegiatan langsung ke masyarakat.</p>
                        </li>
                        <li data-start="2753" data-end="2807">
                        <p style="text-align: justify;" data-start="2755" data-end="2807">Memberikan laporan kinerja ke Dinas secara periodik.</p>
                        </li>
                        </ul>',
            'status' => 1,
        ]);

        Halaman::create([
            'user_id' => 1,
            'judul' => 'Program',
            'slug' => 'program',
            'konten' => '<h3 style="text-align: justify;" data-start="270" data-end="319"><strong data-start="274" data-end="319">Program Unggulan Dinas Sosial Kota Baubau</strong></h3>
                        <p style="text-align: justify;" data-start="809" data-end="1172"><strong data-start="809" data-end="864">1. Program Bantuan Sosial Terpadu dan Tepat Sasaran</strong><br data-start="864" data-end="867">Program ini bertujuan memberikan bantuan sosial secara cepat, adil, dan sesuai dengan kondisi masyarakat yang membutuhkan, baik berupa bantuan tunai, sembako, alat bantu disabilitas, maupun bantuan darurat bagi korban bencana. Pelaksanaannya berbasis data terverifikasi untuk memastikan ketepatan sasaran.</p>
                        <p style="text-align: justify;" data-start="1174" data-end="1485"><strong data-start="1174" data-end="1218">2. Program Rehabilitasi Sosial bagi PMKS</strong><br data-start="1218" data-end="1221">Difokuskan pada pemulihan dan reintegrasi sosial bagi individu atau kelompok yang mengalami gangguan fungsi sosial. Sasaran program ini meliputi anak jalanan, lansia terlantar, penyandang disabilitas, korban kekerasan, korban trafficking, serta penyalahguna napza.</p>
                        <p style="text-align: justify;" data-start="1487" data-end="1807"><strong data-start="1487" data-end="1544">3. Program Pemberdayaan Ekonomi dan Sosial Masyarakat</strong><br data-start="1544" data-end="1547">Bertujuan untuk menciptakan masyarakat yang mandiri melalui pelatihan keterampilan kerja, bantuan usaha ekonomi produktif (UEP), dan pendampingan wirausaha sosial. Dinas Sosial mendorong transformasi dari penerima bantuan menjadi pelaku ekonomi yang produktif.</p>
                        <p style="text-align: justify;" data-start="1809" data-end="2163"><strong data-start="1809" data-end="1894">4. Program Penguatan Data dan Sistem Informasi Kesejahteraan Sosial (SIKS-DINSOS)</strong><br data-start="1894" data-end="1897">Mengembangkan sistem informasi sosial yang akurat, terintegrasi, dan real-time. Data ini digunakan untuk keperluan perencanaan, evaluasi program, serta pengambilan kebijakan berbasis bukti (<em data-start="2087" data-end="2110">evidence-based policy</em>), dan juga untuk menghindari tumpang tindih bantuan.</p>
                        <p style="text-align: justify;" data-start="2165" data-end="2495"><strong data-start="2165" data-end="2223">5. Program Kemitraan dan Jejaring Sosial Lintas Sektor</strong><br data-start="2223" data-end="2226">Dinas Sosial aktif menjalin kerja sama dengan lembaga swadaya masyarakat, instansi pemerintah lainnya, dunia usaha, komunitas lokal, serta lembaga keagamaan. Tujuannya adalah memperluas jangkauan program sosial dan memperkuat kolaborasi dalam penanganan masalah sosial.</p>
                        <p style="text-align: justify;" data-start="2497" data-end="2837"><strong data-start="2497" data-end="2561">6. Program Pengembangan Kapasitas SDM dan Kelembagaan Sosial</strong><br data-start="2561" data-end="2564">Fokus pada pelatihan dan pembinaan aparatur dinas serta lembaga-lembaga sosial masyarakat agar memiliki kompetensi, integritas, dan kemampuan dalam melayani masyarakat secara profesional. Termasuk pelatihan manajemen sosial, etika pelayanan publik, dan keterampilan teknis.</p>
                        <p style="text-align: justify;" data-start="2839" data-end="3156"><strong data-start="2839" data-end="2902">7. Program Penanggulangan Dampak Bencana Sosial dan Ekonomi</strong><br data-start="2902" data-end="2905">Menangani dampak yang ditimbulkan dari bencana alam, bencana sosial, atau krisis ekonomi terhadap kondisi kesejahteraan masyarakat. Termasuk penyaluran bantuan darurat, shelter sementara, pemulihan psikososial, hingga pemberdayaan korban pascabencana.</p>',
            'status' => 1,
        ]);

        Halaman::factory(20)->create();

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
            'name' => 'Tujuan Stategis',
            'slug' => 'tujuan-strategis',
            'type' => 'halaman',
            'target_id' => 3,
            'parent_id' => 1,
            'order' => 3,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Tugas Pokok & Fungsi',
            'slug' => 'tugas-pokok-&-fungsi',
            'type' => 'halaman',
            'target_id' => 4,
            'parent_id' => 1,
            'order' => 4,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Struktur Organisasi',
            'slug' => 'struktur-organisasi',
            'type' => 'halaman',
            'target_id' => 5,
            'parent_id' => 1,
            'order' => 5,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Program',
            'slug' => 'program',
            'type' => 'halaman',
            'target_id' => 6,
            'parent_id' => null,
            'order' => 2,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Kegiatan',
            'slug' => 'kegiatan',
            'type' => 'kegiatan',
            'target_id' => null,
            'parent_id' => null,
            'order' => 3,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Pengumuman',
            'slug' => 'pengumuman',
            'type' => 'pengumuman',
            'target_id' => null,
            'parent_id' => null,
            'order' => 4,
            'status' => 1,
        ]);
        Menu::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'type' => 'berita',
            'target_id' => null,
            'parent_id' => null,
            'order' => 5,
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
