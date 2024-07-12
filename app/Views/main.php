<?= $this->extend('./layout/user_tamplate'); ?>
    <?= $this->section('content'); ?>

    <!-- Hero Section -->
    <div class="bg-white">
        <div class="max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl font-bold text-gray-900">Belajar Kapan Saja, Dimana Saja</h1>
            <p class="mt-4 text-gray-600">Akses berbagai kursus dan tingkatkan keterampilan Anda dengan platform kami.</p>
            <a href="/dashboard" class="mt-6 inline-block bg-blue-500 text-white py-3 px-6 rounded-lg text-lg hover:bg-blue-600">Memulai</a>
        </div>
    </div>

    <!-- Courses Section -->
    <div class="bg-gray-100 py-20">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Kursus Populer</h2>
            <p class="mt-4 text-gray-600">Pilih dari beragam kursus yang sesuai dengan kebutuhan dan minat Anda.</p>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Course Card -->
                <?php $i=0; foreach (kursusAll() as $view) : ?>
                    <?php 
                    $name = str_replace(' ', '_', $view['nama_kursus']);
                    ?>
                    <?php $i++; if ( $i <= 3) : ?>
                        <div class="bg-white flex flex-col items-center rounded-lg shadow-lg overflow-hidden">
                            <div class="flex justify-center items-center w-full bg-gradient-to-r from-violet-500 to-fuchsia-500 h-48 object-cover">
                                <i class="<?= $view['icon'] ?> text-[60px] text-white"></i>
                            </div>
                            <!-- <img class="w-full h-48 object-cover" src="https://via.placeholder.com/400x200" alt="Course"> -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900"><?= $view['nama_kursus']; ?></h3>
                                <p class="mt-2 text-gray-600 w-[20rem] overflow-hidden whitespace-nowrap text-ellipsis" ><?= $view['keterangan']; ?></p>
                                <a href="/detailKursus/<?= $name ?>" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-blue-600">Daftar sekarang</a>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Tentang kami</h2>
            <p class="mt-4 text-gray-600">Kami berkomitmen untuk memberikan sarana belajar kepada semua orang.</p>
            <div class="mt-10 flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-gray-100 h-[12rem] rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900">Misi kita</h3>
                        <p class="mt-2 text-gray-600">untuk mendemokratisasi pendidikan dan membuatnya dapat diakses oleh semua orang.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-gray-100 h-[12rem] rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900">Visi kami</h3>
                        <p class="mt-2 text-gray-600">Menjadi platform terkemuka untuk pendidikan online secara global.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-gray-100 h-[12rem] rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900">Nilai kita</h3>
                        <p class="mt-2 text-gray-600">Integritas, Keunggulan, Inovasi, dan Inklusivitas.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/4 p-4">
                    <div class="bg-gray-100 h-[12rem] rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900">Hubungi kami</h3>
                        <p class="mt-2 text-gray-600">Hubungi kami untuk pertanyaan atau dukungan apa pun.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<!-- <body class="p-4">
    <h1>Hallo User</h1>
    <a href="/auth" class="border-2">Login</a>
</body> -->