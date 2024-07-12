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
    <form action="/updateKursus/<?= $nama ?>" method="POST">
        <div class="my-2 mx-5">
            <?php foreach(kursusAll() as  $kursus) : ?>
                <?php if ($kursus['id_kursus'] == $id_kursus) : ?>
                    <div class="border-b">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-[15px] text-ellipsis"><?= $kursus['jenis_kursus']; ?></span>
                                <div>
                                    <input type="text" name="namaKursus" class="font-semibold text-[25px] border-b focus:outline-none py-2" value="<?= $kursus['nama_kursus']; ?>">
                                </div>
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
                        <textarea name="caption" class="w-full h-full border px-1 py-1 focus:outline-none" id=""><?=  $kursus['keterangan']?></textarea>
                        <h1 class="font-bold mt-10 mb-3">Modul yang di dapat pada <?= $kursus['nama_kursus']; ?></h1>
                        <?php foreach(pembelajaran() as $modul) : ?>
                            <?php 
                            $paragraphs = explode("\n", $modul['modul_keterangan']);
                            ?>
                            <?php if($modul['id_kursus'] == $id_kursus) : ?>
                                <div class="mb-3 rounded-md border">
                                    <div class="px-2 py-2 flex justify-between cursor-pointer" onclick="cekDetail(<?= $modul['id_pembelajaran'] ?>)">
                                        <h3 class="font-semibold"><?= $modul['nama_pembelajaran']; ?></h3>
                                        <i class="ri-add-line mr-4 font-bold"></i>
                                    </div>
                                    <div class="hidden bg-slate-100 px-2 py-2 transition" id="<?= $modul['id_pembelajaran'] ?>">
                                    <?php foreach($paragraphs as $paragraph) : ?>
                                        <?php if(!empty(trim($paragraph))) : ?>
                                            <p><?= htmlspecialchars($paragraph); ?></p>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <button type="submit" name="save" class="fixed bottom-14 right-10 max-sm:bottom-10 max-sm:right-4 flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold w-16 h-16 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all">
            <i class="ri-edit-circle-line text-[25px]"></i>
        </button>
    </form>

    <script>
        function cekDetail(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

    </script>


<?= $this->endSection(); ?>