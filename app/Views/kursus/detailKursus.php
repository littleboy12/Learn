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
    <div class="my-2 mx-5">
        <?php foreach(kursusAll() as  $kursus) : ?>
            <?php if ($kursus['id_kursus'] == $id_kursus) : ?>
                <?php 
                $name = str_replace(' ', '_', $kursus['nama_kursus']);
                $id = $kursus['id_user'];
                ?>
                <div class="border-b">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-[15px] text-ellipsis"><?= $kursus['jenis_kursus']; ?></span>
                            <h1 class="font-semibold text-[25px]"><?= $kursus['nama_kursus']; ?></h1>
                        </div>
                        <div class="text-white w-12 h-12 max-sm:hidden rounded-full flex justify-center items-center mr-10" style="background-color: #<?= $kursus['warna']; ?>">
                            <i class="<?= $kursus['icon'];?> text-[30px]"></i>
                        </div>
                    </div>
                    <div class="my-3 space-x-5">
                        <span class="text-[13px] text-ellipsis"><i class="ri-stairs-line"></i> <?= $kursus['level_kursus']; ?></span>
                        <span class="text-[13px] text-ellipsis"><i class="ri-group-line"></i> <?= $kursus['jumlah_peserta']; ?></span>
                    </div>
                </div>
                <div class="my-3 border-b">
                    <?php 
                    $paragraphs = explode("\n", $kursus['keterangan']);
                    ?>
                    <?php foreach($paragraphs as $paragraph) : ?>
                        <?php if(!empty(trim($paragraph))) : ?>
                            <p class="mb-3"><?=  htmlspecialchars($paragraph) ?></p>
                        <?php endif ?>
                    <?php endforeach ?>
                    
                    <h1 class="font-bold mt-10 mb-3">Modul yang di dapat pada <?= $kursus['nama_kursus']; ?></h1>
                    <?php foreach(pembelajaran() as $modul) : ?>
                        <?php if($modul['id_kursus'] == $id_kursus) : ?>
                            <div class="mb-3 rounded-md border">
                                <div class="px-2 py-2 flex justify-between cursor-pointer" onclick="cekDetail(<?= $modul['id_pembelajaran'] ?>)">
                                    <h3 class="font-semibold"><?= $modul['nama_pembelajaran']; ?></h3>
                                    <i class="ri-add-line mr-4 font-bold"></i>
                                </div>
                                <div class="hidden bg-slate-100 px-2 py-2 transition" id="<?= $modul['id_pembelajaran'] ?>">
                                    <p><?= $modul['modul_keterangan']; ?></p>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <?php if(userLogin()->level == 'user') : ?>
                    <div class="my-3">
                        <a href="/daftarKursus/<?= $kursus['id_kursus'] ?>">
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-sm hover:bg-blue-600 transition-all">Daftar</button>
                        </a>
                    </div>
                <?php  endif ?>
            <?php endif ?>
        <?php endforeach ?>
    </div>
    
    <?php if(userLogin()->level == 'creator' AND $id == userLogin()->id_user) : ?>
        <button onclick="pilih()" class="fixed bottom-14 right-10 max-sm:bottom-10 max-sm:right-4 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-edit-circle-line text-[25px]"></i>
        </button>
        <button onclick="addModul()" id="button" class="modal fixed bottom-14 right-32 max-sm:bottom-10 max-sm:right-24 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-add-line text-[25px]"></i>
        </button>
        <a href="/editKursus/<?= $name ?>" id="button1" class="modal fixed bottom-14 right-52 max-sm:bottom-10 max-sm:right-44 flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-edit-2-line text-[25px]"></i>
        </a>

    <?php endif ?>

    <div id="overlay" class="modal fixed  inset-0 bg-black bg-opacity-50 items-center justify-center">
        <!-- Form Input -->
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Tambah Modul</h2>
            <form action="<?= base_url('/tambahModul') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="text" name="id" value="<?= $id_kursus ?>" hidden>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="modul">
                        Nama Modul
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="modul" id="kursus" type="text" placeholder="Masukkan Nama">
                    <span class="text-[10px] mx-2 text-slate-400">Masukan Nama Modul</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">
                        Keterangan
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="keterangan" id="kursus" type="text" placeholder="Masukkan Jenis"></textarea>
                    
                    <span class="text-[10px] mx-2 text-slate-400">Beri Keterangan</span>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm()">
                        Submit
                    </button>
                    <button class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="addModul()">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function cekDetail(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function pilih() {
            const button = document.getElementById('button');
            const button1 = document.getElementById('button1');
            button.classList.toggle('active');
            button1.classList.toggle('active');
        }

        function addModul() {
            const overlay = document.getElementById('overlay');
            overlay.classList.toggle('active');
        }
    </script>
<?= $this->endSection(); ?>