<?= $this->extend('./layout/tamplate'); ?>
    <?= $this->section('content'); ?>
    <div class="bg-blue-500 rounded-lg rounded-b-none py-3 px-3 container">
        <div class="mx-2 my-3 text-white font-semibold">
            <h1>Kursus Saya</h1>
        </div>
        <div class="flex flex-col justify-center items-center sm:flex-row md:space-x-3 max-sm:space-y-3 mt-2 mb-4">
            <div class="jumlah bg-white w-[25rem] max-sm:w-[22rem] px-3 rounded-sm">
                <div class="flex flex-3 justify-between items-center">
                    <h1 class="font-semibold">Semua Kursus</h1>
                    <div class="bg-red-600 text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center">
                        <i class="ri-code-s-slash-line text-[25px]"></i>
                    </div>
                </div>
                <div class="mx-3 -mt-5 mb-5">
                    <h1 class="text-[60px] font-semibold"> <?= jmlKursus(userLogin()->id_user) ?> <span class="text-[20px] font-normal text-slate-500">Kursus</span></h1>
                </div>
            </div>
            <div class="jumlah bg-white w-[25rem] max-sm:w-[22rem] px-3 rounded-sm">
                <div class="flex flex-3 justify-between items-center">
                    <h1 class="font-semibold">Materi & Tugas</h1>
                    <div class="bg-yellow-500 text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center">
                        <i class="ri-book-open-fill text-[25px]"></i>
                    </div>
                </div>
                <div class="mx-3 -mt-5 mb-5">
                    <h1 class="text-[60px] font-semibold"> <?= jmlMateri(userLogin()->id_user); ?> <span class="text-[20px] font-normal text-slate-500">Jenis</span></h1>
                </div>
            </div>
            <div class="jumlah bg-white w-[25rem] max-sm:w-[22rem] px-3 rounded-sm">
                <div class="flex flex-3 justify-between items-center">
                    <h1 class="font-semibold">Peserta</h1>
                    <div class="bg-blue-600 text-white mx-5 mt-7 w-14 h-14 rounded-full flex justify-center items-center">
                        <i class="ri-group-line text-[25px]"></i>
                    </div>
                </div>
                <div class="mx-3 -mt-5 mb-5">
                    <?php 
                        // if(kursusUser()->id_user == userLogin()->id_user) {
                        //     $jumlah = kursusUser()->jumlah_peserta;
                        // }
                    ?>
                    <h1 class="text-[60px] font-semibold"> <?= jmlPeserta(userLogin()->id_user); ?> <span class="text-[20px] font-normal text-slate-500">Peserta</span></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 flex flex-col min-sm:flex-row mx-2">
        <div class="mx-2 my-3 font-semibold">
            <h1>Kursus Yang Anda Kelola</h1>
        </div>
        <div class="sm:grid grid-cols-3 max-sm:space-y-4 max-sm:flex-row max-sm:items-center">
            <?php foreach(kursusAll() as $kursus) : ?>
                <?php 
                $name = str_replace(' ', '_', $kursus['nama_kursus']);
                ?>
                <?php if($kursus['id_user'] == userLogin()->id_user) : ?>
                    <div>
                        <a href="/detailKursus/<?= $name ?>">
                                <div class="jumlah border-2 w-[25rem] max-sm:w-[22rem] px-3 rounded-sm" style="border-color: #<?= $kursus['warna'];?>">
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
            <?php endforeach ?>
        </div>
        <div>
            <div class="mx-2 my-3 font-semibold">
                <h1>Cari Kursus</h1>
            </div>
            <?php foreach(jenisKursus() as $jenis) : ?>
                <?php 
                $warna = $jenis['warna'];
                ?>  
                <?php if ($jenis['jumlah_kursus'] > 0) : ?>
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
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
<?= $this->endSection(); ?>