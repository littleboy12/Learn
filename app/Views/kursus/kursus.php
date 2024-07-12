<?= $this->extend('./layout/tamplate'); ?>
    <?= $this->section('content'); ?>
    <style>
        .modal {
            display: none;
        }
        .modal.active {
            display: flex;
        }
    </style>
    <div class="mt-2 flex flex-col min-sm:flex-row mx-2">
        <?php if(userLogin()->level == 'creator') : ?>
            <div class="mx-2 my-3 font-semibold">
                <h1>Kursus Yang Anda Kelola</h1>
            </div>
            <div class="sm:grid grid-cols-3 max-sm:space-y-4 max-sm:flex-row max-sm:items-center">
                <?php foreach(kursusAll() as $kursus) : ?>
                    <?php 
                    $name = str_replace(' ', '_', $kursus['nama_kursus']);
                    ?>
                    <?php if($id_jenis == NULL) : ?>
                        <?php if($kursus['id_user'] == userLogin()->id_user) : ?>
                            <div>
                                <a href="/detailKursus/<?= $name ?>">
                                    <div class="jumlah border-2 w-[25rem] max-sm:w-[22rem] px-3 rounded-sm mt-3" style="border-color: #<?= $kursus['warna'];?>">
                                        <div class="flex flex-3 justify-between items-center">
                                            <div>
                                                <h1 class="font-semibold"><?= $kursus['nama_kursus']; ?></h1>
                                                <span><?= $kursus['jenis_kursus']; ?></span>
                                            </div>
                                            <div class=" text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center" style="background-color: #<?= $kursus['warna'] ?>;">
                                                <i class="<?= $kursus['icon'] ?> text-[25px]"></i>
                                            </div>
                                        </div>
                                        <div class="-mt-2 mb-2">
                                        </div>
                                        <div class="flex flex-row space-x-3 mb-3">
                                            <div class=" px-2 py-1 rounded-lg text-white" style="background-color: #<?= $kursus['warna']?>;">
                                                <h3 class="text-[12px]"><?= $kursus['level_kursus']; ?></h3>
                                            </div>
                                        </div>
                                    </div> 
                                </a>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if($kursus['id_jenis'] == $id_jenis) :?>
                        <?php if($kursus['id_user'] == userLogin()->id_user) : ?>
                            <div>
                                <a href="/detailKursus/<?= $name ?>">
                                    <div class="jumlah border-2 w-[25rem] max-sm:w-[22rem] px-3 rounded-sm mt-3" style="border-color: #<?= $kursus['warna'];?>">
                                        <div class="flex flex-3 justify-between items-center">
                                            <div>
                                                <h1 class="font-semibold"><?= $kursus['nama_kursus']; ?></h1>
                                                <span><?= $kursus['jenis_kursus']; ?></span>
                                            </div>
                                            <div class=" text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center" style="background-color: #<?= $kursus['warna'] ?>;">
                                                <i class="<?= $kursus['icon'] ?> text-[25px]"></i>
                                            </div>
                                        </div>
                                        <div class="-mt-2 mb-2">
                                        </div>
                                        <div class="flex flex-row space-x-3 mb-3">
                                            <div class=" px-2 py-1 rounded-lg text-white" style="background-color: #<?= $kursus['warna']?>;">
                                                <h3 class="text-[12px]"><?= $kursus['level_kursus']; ?></h3>
                                            </div>
                                        </div>
                                    </div> 
                                </a>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="mx-2 my-3 font-semibold">
            <h1>Semua Kursus</h1>
        </div>
        <div class="sm:grid grid-cols-3 max-sm:space-y-4 max-sm:flex-row max-sm:items-center mb-5">
            <?php foreach(kursusAll() as $kursus) : ?>
                <?php 
                $name = str_replace(' ', '_', $kursus['nama_kursus']);
                $id = $kursus['id_user'];
                ?>
                <?php if($id_jenis == NULL) : ?>
                    <div>
                        <a href="/detailKursus/<?= $name ?>">
                            <div class="jumlah border-2 w-[25rem] max-sm:w-[22rem] px-3 rounded-sm mt-3" style="border-color: #<?= $kursus['warna'];?>">
                                <div class="flex flex-3 justify-between items-center">
                                    <div>
                                        <h1 class="font-semibold"><?= $kursus['nama_kursus']; ?></h1>
                                        <span><?= $kursus['jenis_kursus']; ?></span>
                                    </div>
                                    <div class=" text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center" style="background-color: #<?= $kursus['warna'] ?>;">
                                        <i class="<?= $kursus['icon'] ?> text-[25px]"></i>
                                    </div>
                                </div>
                                <div class="-mt-2 mb-2">
                                </div>
                                <div class="flex flex-row space-x-3 mb-3">
                                    <div class=" px-2 py-1 rounded-lg text-white" style="background-color: #<?= $kursus['warna']?>;">
                                        <h3 class="text-[12px]"><?= $kursus['level_kursus']; ?></h3>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                <?php endif?>
                <?php if($kursus['id_jenis'] == $id_jenis) :?>
                    <div>
                        <a href="/detailKursus/<?= $name ?>">
                            <div class="jumlah border-2 w-[25rem] max-sm:w-[22rem] px-3 rounded-sm mt-3" style="border-color: #<?= $kursus['warna'];?>">
                                <div class="flex flex-3 justify-between items-center">
                                    <div>
                                        <h1 class="font-semibold"><?= $kursus['nama_kursus']; ?></h1>
                                        <span><?= $kursus['jenis_kursus']; ?></span>
                                    </div>
                                    <div class=" text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center" style="background-color: #<?= $kursus['warna'] ?>;">
                                        <i class="<?= $kursus['icon'] ?> text-[25px]"></i>
                                    </div>
                                </div>
                                <div class="-mt-2 mb-2">
                                </div>
                                <div class="flex flex-row space-x-3 mb-3">
                                    <div class=" px-2 py-1 rounded-lg text-white" style="background-color: #<?= $kursus['warna']?>;">
                                        <h3 class="text-[12px]"><?= $kursus['level_kursus']; ?></h3>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                <?php endif?>
            <?php endforeach ?>
        </div>
    </div>
    <?php if(userLogin()->level == 'creator') : ?>
        <button onclick="addJenis()" class="fixed bottom-14 right-10 max-sm:bottom-10 max-sm:right-4 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-add-line text-[35px]"></i>
        </button>
    <?php endif ?>

    <div id="overlay" class="modal fixed  inset-0 bg-black bg-opacity-50 items-center justify-center">
        <!-- Form Input -->
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Tambah Jenis</h2>
            <form action="<?= base_url('/tambahKursus') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                        Nama Kursus
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="kursus" id="kursus" type="text" placeholder="Masukkan Nama">
                    <span class="text-[10px] mx-2 text-slate-400">Masukan Nama Kursus</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                        Kategori
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="jenis" id="jenis" type="text" placeholder="Masukkan Jenis" >
                        <?php foreach(jenisKursus() as $jenis) : ?>
                            <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['jenis_kursus']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="text-[10px] mx-2 text-slate-400">Pilih Kategori yang sesuai</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="icon">
                        Level
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="level" id="level" type="text" placeholder="Masukkan Jenis" >
                            <option value="Beginer">Beginer</option>
                            <option value="Expert">Expert</option>
                    </select>
                    <span class="text-[10px] mx-2 text-slate-400">Pilih Level Sesuai</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="icon">
                        Caption
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="keterangan" id="kursus" type="text" placeholder="Masukkan Jenis"></textarea>
                    
                    <span class="text-[10px] mx-2 text-slate-400">Beri Caption</span>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm()">
                        Submit
                    </button>
                    <button class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="addJenis()">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addJenis() {
            const overlay = document.getElementById('overlay');
            overlay.classList.toggle('active');
        }
    </script>
<?= $this->endSection(); ?>