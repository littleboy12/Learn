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
        <div class="mx-2 my-3 font-semibold">
            <h1>Jenis Kursus</h1>
        </div>
        <div class="sm:grid grid-cols-3 max-sm:space-y-4 max-sm:flex-row max-sm:items-center">
            <?php foreach(jenisKursus() as $jenis) : ?>
                <?php 
                $warna = $jenis['warna'];
                ?>
                <a href="/detailJenis/<?=$jenis['id_jenis']?>">
                    <div class="border rounded py-2 px-3 my-2 text-white flex justify-between items-center" style="background-color: #<?= $warna; ?>;">
                        <div>
                            <h1><?= $jenis['jenis_kursus']; ?></h1>
                            <span class="text-[13px] text-slate-300">Jumlah Kursus : <?= $jenis['jumlah_kursus']; ?></span>
                        </div>
                        <div class="bg-white w-10 h-10 rounded-full flex justify-center items-center mr-10" style="color: #<?= $warna; ?>">
                            <i class="<?= $jenis['icon'];?> text-[25px]"></i>
                        </div>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
    
    
    <?php if(userLogin()->level == 'creator' AND kursusUser()->id_user == userLogin()->id_user) : ?>
        <button onclick="addJenis()" class="fixed bottom-14 right-10 max-sm:bottom-10 max-sm:right-4 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-add-line text-[35px]"></i>
        </button>
    <?php endif ?>

    <div id="overlay" class="modal fixed  inset-0 bg-black bg-opacity-50 items-center justify-center">
        <!-- Form Input -->
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Tambah Jenis</h2>
            <form action="<?= base_url('/tambahJenis') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                        Jenis
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="jenis" id="jenis" type="text" placeholder="Masukkan Jenis">
                    <span class="text-[10px] mx-2 text-slate-400">Masukan Jenis Yang Sesuai</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="warna">
                        Kode Warna
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="warna" id="warna" type="color" placeholder="Masukkan Warna">
                    <span class="text-[10px] mx-2 text-slate-400">Pilih warna Yang Sesuai Ubah ke Mode <b>HEXA</b></span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="icon">
                        Icon
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="icon" id="icon" type="text" placeholder="Masukkan Icon">
                    <span class="text-[10px] mx-2 text-slate-400">Pilih Icon Dari <a class="text-blue-400" href="#" onClick="window.open('https://remixicon.com/', '_blank')">Sini</a>, isi dengan format <b>ri-add-line</b></span>
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

        function submitForm() {
            // Logic untuk submit form
            toggleModal();
            alert('Form submitted!');
        }
    </script>
<?= $this->endSection(); ?>