<?= $this->extend('./layout/tamplate'); ?>
    <?= $this->section('content'); ?>

    <style>
        .modal {
            display: none;
        }
        .modal.active {
            display: flex;
        }
        .modal.block {
            display: block;
        }
    </style>
    <div class="bg-gray-100 flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg w-full p-8 flex flex-col items-center space-y-6">
            <div class="flex flex-col items-center space-y-4">
                <div class="bg-white rounded-full border w-[120px] h-[120px] flex justify-center items-center">
                    <i class="ri-user-2-fill text-[80px]"></i>
                </div>
                <div class="text-center">
                    <h2 class="text-3xl font-semibold text-gray-900"><?= userLogin()->nama ?></h2>
                    <p class="mt-2 text-gray-600"><?= userLogin()->level ?></p>
                </div>
            </div>
            <div class="w-full flex flex-col space-y-4">
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 18.364A8.962 8.962 0 015 15m0-6a9 9 0 019-9 9 9 0 110 18 8.962 8.962 0 01-3.364-.635M15 12h.01M12 15h.01M9 12h.01M12 9h.01M12 12h.01M3 21h18M3 3h18"></path>
                    </svg>
                    <span class="text-gray-700">-</span>
                </div>
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0v4m-2 4h-4m0 0v5m0-5a2 2 0 014 0v5m0-5H8m0 0a2 2 0 014 0v5"></path>
                    </svg>
                    <span class="text-gray-700"><?= userLogin()->email ?></span>
                </div>
                <div class="flex items-center space-x-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h9m-9 6h13M3 6h.01M3 12h.01M3 18h.01"></path>
                    </svg>
                    <span class="text-gray-700"><?= userLogin()->kontak; ?></span>
                </div>
            </div>
            <div class="w-full space-y-4">
                <h3 class="text-xl font-semibold text-gray-900">About Me</h3>
                <?php 
                    $paragraphs = explode("\n", userLogin()->about);
                ?>
                <?php foreach($paragraphs as $paragraph) : ?>
                    <?php if(!empty(trim($paragraph))) : ?>
                        <p class="text-gray-600"><?=  htmlspecialchars($paragraph) ?></p>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <?php if(userLogin()->level != 'creator') : ?>
                <div class="w-full space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900">Daftar Creator, <button class="text-blue-500 hover:text-blue-600 " onclick="daftar()">Daftar <i class="ri-edit-circle-line"></i></button></h3>
                </div>
            <?php endif ?>
        </div>
    </div>

    <div id="overlay" class="modal fixed  inset-0 bg-black bg-opacity-50 items-center justify-center">
        <!-- Form Input -->
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Ubah Profile</h2>
            <form action="<?= base_url('/daftarCreator') ?>" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="noHp">
                        No Hp
                    </label>
                    
                    <input id="noHp" name="noHp" type="text" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <span class="text-[12px] text-red-600">No Hp Wajib Di isi</span>
                    <?php endif ?>
                    <span class="text-[10px] mx-2 text-slate-400">Tambah No Hp</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="noHp">
                        Penjelasan Singkat Tentang Anda 
                    </label>
                    
                    <textarea name="about" id="about" class="flex h-28 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium"></textarea>
                    <span class="text-[10px] mx-2 text-slate-400">Berikan Keterangan</span>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm()">
                        Submit
                    </button>
                    <button class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="daftar()">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            alert('Anda Berhassil Menjadi Creator');
        </script>
    <?php endif ?>
    

    <script>
        function daftar() {
            const overlay = document.getElementById('overlay');
            overlay.classList.toggle('active');
        }
    </script>
<?= $this->endSection(); ?>