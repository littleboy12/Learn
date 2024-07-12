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
    <div class="my-5 mx-5">
        <?php foreach(myKursus() as $my) : ?>
            <?php if($my['id_userMy'] == userLogin()->id_user) :?>
                <div class="flex justify-between border-b my-2 p-3">
                    <h3 class="font-semibold"><?= $my['nama_kursus']; ?></h3>
                    <div class="right-20">
                        <i class="ri-arrow-down-s-line"></i>    
                    </div>
                </div>
                <div class="mx-3">
                    <?php foreach(materi() as $materi) : ?>
                        <?php if($materi['id_kursus'] == $my['id_kursus']) : ?>
                            <div class="flex justify-between border mt-2 p-3 cursor-pointer" onclick="materiDetail(<?= $materi['id_materi']; ?>)">
                                <h2 class="font-semibold"><?= $materi['nama_materi']; ?></h2>
                                <div class="right-20">
                                    <i class="ri-arrow-down-s-line"></i>    
                                </div>
                            </div>
                            <div class="hidden border" id="<?= $materi['id_materi']; ?>">
                                <div class="relative pb-16/9">
                                    <video controls class="w-full h-[30rem] max-sm:h-[10rem]"  src="/video/<?= $materi['nama_file']?>">
                                        <source src="/video/<?= $materi['nama_file']?>" type="video/mp4">
                                        Your browser does not support the video tag. Please upgrade to a modern browser.
                                    </video>
                                </div>
                                <div class="mt-4 px-1">
                                    <div class="border-b pb-3">
                                        <h3 class="font-semibold"><?= $materi['nama_materi']; ?> - <?= $materi['nama_kursus']; ?></h3>
                                    </div>
                                    <div class="border-b pb-4" id="2<?= $materi['id_materi'] ?>">
                                        <?php 
                                        $paragraphs = explode("\n", $materi['materi_keterangan']);
                                        ?>
                                        <?php foreach($paragraphs as $paragraph) : ?>
                                            <?php if(!empty(trim($paragraph))) : ?>
                                                <p class="mt-2 text-gray-600"><?= htmlspecialchars($paragraph) ?></p>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>

                                    <div class="modal border-b pb-4" id="1<?= $materi['id_materi'] ?>">
                                        <form action="/updateCaption/<?= $materi['id_materi'] ?>" method="POST">
                                            <textarea name="caption" class="w-full h-auto border px-1 py-1 focus:outline-none" id="caption"><?= $materi['materi_keterangan']; ?></textarea>
                                            
                                            <button type="submit">Save</button>
                                        </form>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <h3 class="font-semibold">Modul <?= $materi['nama_materi']; ?></h3>
                                        <a href="/file/<?= $materi['modul'] ?>">
                                            <div class="px-10 py-2 mt-10">
                                                <div class="bg-slate-200 flex justify-center items-center p-10 rounded-lg rounded-b-none">
                                                    <div class="opacity-20">
                                                        <div class="flex justify-center">
                                                            <i class="ri-file-3-line text-[6rem] max-sm:text-[4rem]"></i>
                                                        </div>
                                                        <div class="flex justify-center">
                                                            <h3 class="text-[25px] max-sm:text-[15px]"><?= $materi['nama_materi'] ?>.pdf</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full bg-slate-300 rounded-lg rounded-t-none flex justify-center items-center h-14 max-sm:h-12">download</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="h-14 relative flex items-center">
                                        <a href="/updateStatusMateri/<?= $materi['id_materi'] ?>" class="absolute right-6 max-sm:right-1 flex justify-center items-center bg-green-500 w-10 h-10 rounded-md hover:bg-green-600 transition-all"><i class="ri-check-line text-[20px] text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                    <div class="mt-3">
                        <h3 class="text-[15px]">Menyelesaikan <?= jmlKomplit($my['id_kursus']); ?>  dari <?= jmlModul($my['id_kursus']) ?> Modul</h3>
                    </div>
                    <?php if (jmlModul($my['id_kursus']) <= jmlKomplit($my['id_kursus'])) : ?>
                        <div class="flex justify-between border mt-2 p-3 cursor-pointer" onclick="getSertif('sertif<?= $my['id_kursus'] ?>')">
                            <h2 class="font-semibold">Ambil Sertif</h2>
                            <div class="right-20">
                                <i class="ri-arrow-down-s-line"></i>    
                            </div>
                        </div>
                        <div class="border">
                            <div class="mt-2" id="sertif<?= $my['id_kursus'] ?>">
                                <a href="/sertif/<?= $my['id_kursus'] ?>">
                                    <div class="px-10 py-2 mt-10">
                                        <div class="bg-slate-200 flex justify-center items-center p-10 rounded-lg rounded-b-none">
                                            <div class="opacity-20">
                                                <div class="flex justify-center">
                                                    <i class="ri-file-3-line text-[6rem] max-sm:text-[4rem]"></i>
                                                </div>
                                                <div class="flex justify-center">
                                                    <h3 class="text-[25px] max-sm:text-[15px]">Serifikat - <?= $my['nama_kursus'] ?>.pdf</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full bg-slate-300 rounded-lg rounded-t-none flex justify-center items-center h-14 max-sm:h-12">download</div>
                                    </div>
                                </a>
                            </div>              
                        </div>
                    <?php endif ?>
                </div>
            <?php endif ?>
        <?php endforeach?>
        
        <?php foreach(kursusAll() as $kursus) : ?>
            <?php if($kursus['id_user'] == userLogin()->id_user) :?>
                <div class="flex justify-between border-b my-2 p-3">
                    <h3 class="font-semibold"><?= $kursus['nama_kursus']; ?></h3>
                    <div class="right-20">
                        <i class="ri-arrow-down-s-line"></i>    
                    </div>
                </div>
                <div class="mx-3">
                    <?php foreach(materi() as $materi) : ?>
                        <?php if($materi['id_kursus'] == $kursus['id_kursus']) : ?>
                            <div class="flex justify-between border mt-2 p-3 cursor-pointer" onclick="materiDetail(<?= $materi['id_materi']; ?>)">
                                <h2 class="font-semibold"><?= $materi['nama_materi']; ?></h2>
                                <div class="right-20">
                                    <i class="ri-arrow-down-s-line"></i>    
                                </div>
                            </div>
                            <div class="hidden border" id="<?= $materi['id_materi']; ?>">
                                <div class="relative pb-16/9">
                                    <video controls class="w-full h-[30rem] max-sm:h-[10rem]"  src="/video/<?= $materi['nama_file']?>">
                                        <source src="/video/<?= $materi['nama_file']?>" type="video/mp4">
                                        Your browser does not support the video tag. Please upgrade to a modern browser.
                                    </video>
                                </div>
                                <div class="mt-4 px-1">
                                    <div class="border-b pb-3">
                                        <h3 class="font-semibold"><?= $materi['nama_materi']; ?> - <?= $materi['nama_kursus']; ?></h3>
                                    </div>
                                    <div class="border-b pb-4" id="2<?= $materi['id_materi'] ?>">
                                        <?php 
                                        $paragraphs = explode("\n", $materi['materi_keterangan']);
                                        ?>
                                        <?php foreach($paragraphs as $paragraph) : ?>
                                            <?php if(!empty(trim($paragraph))) : ?>
                                                <p class="mt-2 text-gray-600"><?= htmlspecialchars($paragraph) ?></p>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>

                                    <div class="modal border-b pb-4" id="1<?= $materi['id_materi'] ?>">
                                        <form action="/updateCaption/<?= $materi['id_materi'] ?>" method="POST">
                                            <textarea name="caption" class="w-full h-auto border px-1 py-1 focus:outline-none" id="caption"><?= $materi['materi_keterangan']; ?></textarea>
                                            
                                            <button type="submit">Save</button>
                                        </form>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <h3 class="font-semibold">Modul <?= $materi['nama_materi']; ?></h3>
                                        <a href="/file/<?= $materi['modul'] ?>">
                                            <div class="px-10 py-2 mt-10">
                                                <div class="bg-slate-200 flex justify-center items-center p-10 rounded-lg rounded-b-none">
                                                    <div class="opacity-20">
                                                        <div class="flex justify-center">
                                                            <i class="ri-file-3-line text-[6rem] max-sm:text-[4rem]"></i>
                                                        </div>
                                                        <div class="flex justify-center">
                                                            <h3 class="text-[25px] max-sm:text-[15px]"><?= $materi['nama_materi'] ?>.pdf</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full bg-slate-300 rounded-lg rounded-t-none flex justify-center items-center h-14 max-sm:h-12">download</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <?php if(userLogin()->level == 'creator' or kursusUser()->id_user == userLogin()->id_user) : ?>
                                        <div class="h-14 relative flex items-center">
                                            <button class="absolute right-6 max-sm:right-1 bg-blue-500 w-10 h-10 rounded-md hover:bg-blue-600 transition-all"><i class="ri-pencil-line text-[20px] text-white" onclick="editCap(1<?= $materi['id_materi'] ?>, 2<?= $materi['id_materi'] ?>)"></i></button>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

    <?php if(userLogin()->level == 'creator') : ?>
        <button onclick="pilih()" class="fixed bottom-14 right-10 max-sm:bottom-10 max-sm:right-4 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-edit-circle-line text-[25px]"></i>
        </button>
        <button onclick="addMateri()" id="button" class="modal fixed bottom-14 right-32 max-sm:bottom-10 max-sm:right-24 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-add-line text-[25px]"></i>
        </button>
        <a href="#" id="button1" class="modal fixed bottom-14 right-52 max-sm:bottom-10 max-sm:right-44 flex justify-center items-center bg-blue-500 hover:bg-blue-600 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-edit-2-line text-[25px]"></i>
        </a>
    <?php endif ?>

    <div id="overlay" class="modal fixed  inset-0 bg-black bg-opacity-50 items-center justify-center">
        <!-- Form Input -->
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">Tambah Materi</h2>
            <form action="<?= base_url('/saveMateri') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="materi">
                        Materi
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="materi" id="materi" type="text" placeholder="Masukkan materi">
                    <span class="text-[10px] mx-2 text-slate-400">Masukan Jenis Yang Sesuai</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">
                        Kursus
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="kursus" id="kursus" type="text" placeholder="Masukkan kursus" >
                        <?php foreach(kursusAll() as $kursus) : ?>
                            <?php if($kursus['id_user'] == userLogin()->id_user) : ?>
                                <option value="<?= $kursus['id_kursus'] ?>"><?= $kursus['nama_kursus']; ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                    <span class="text-[10px] mx-2 text-slate-400">Pilih Kursus yang sesuai</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="video">
                        File Video
                    </label>
                    <input id="video" name="video" type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                    <span class="text-[10px] mx-2 text-slate-400">Pilih Video Materi <b>mp4, mov, dsb</b></span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fileModul">
                        File Modul
                    </label>
                    
                    <input id="fileModul" name="fileModul" type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                    <span class="text-[10px] mx-2 text-slate-400">Upload File Modul <b>PDF</b></span>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm()">
                        Submit
                    </button>
                    <button class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="addMateri()">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function materiDetail(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function getSertif(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function pilih() {
            const button = document.getElementById('button');
            const button1 = document.getElementById('button1');
            button.classList.toggle('active');
            button1.classList.toggle('active');
        
        }
        function editCap(id, id2) {
            document.getElementById(id).classList.toggle('block');
            document.getElementById(id2).classList.toggle('hidden');
        }

        function addMateri() {
            const overlay = document.getElementById('overlay');
            overlay.classList.toggle('active');
        }
    </script>
<?= $this->endSection(); ?>