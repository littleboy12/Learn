<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="icon" href="/img/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <title><?= $title; ?></title>
</head>

<body class="text-slate-700 bg-slate-100">
    <div class="flex">
        <!-- SideBar -->
        <aside class="bg-[#3D6CB9] fixed sidebar h-screen sm:w-[12rem] w-20 md:shadow transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in text-white" id="menuSidebar">
            <div class="bg-[#4c85e2] py-4 px-3 h-[7rem] max-sm:hidden flex relative justify-center items-center text-white">
                <img src="/img/logo.png" alt="">
            </div>
            <div class="menu px-2 max-sm:py-4 flex flex-col relative items-center
            ">
                <div class="flex sm:w-full font-light">Main</div>
                <a href="/home" class="hover:bg-[#274b868d] w-full rounded-lg transition-all ease-in-out">
                    <div class="flex relative sm:justify-start max-sm:justify-center items-center px-3 py-2">
                        <i class="ri-home-5-line text-2xl max-sm:text-3xl"></i>
                        <span class="max-sm:hidden ml-3">Beranda</span>
                    </div>
                </a>
                <?php if(userLogin()->level == 'creator') : ?>
                    <a href="/dashboard" class="hover:bg-[#274b868d] w-full rounded-lg transition-all ease-in-out">
                        <div class="flex relative sm:justify-start max-sm:justify-center items-center px-3 py-2">
                            <i class="ri-dashboard-line text-2xl max-sm:text-3xl"></i>
                            <span class="max-sm:hidden ml-3">Dasboard</span>
                        </div>
                    </a>
                <?php endif?>
            </div>
            <div class="menu mt-2 px-2 flex flex-col relative items-center
            ">
                <div class="flex sm:w-full font-light">List</div>
                <a href="/jenis" class="hover:bg-[#274b868d] w-full rounded-lg transition-all ease-in-out">
                    <div class="flex relative sm:justify-start max-sm:justify-center items-center px-3 py-2">
                        <i class="ri-book-3-line text-2xl max-sm:text-3xl"></i>
                        <span class="max-sm:hidden ml-3">Jenis Kursus</span>
                    </div>
                </a>
                <a href="/kursus" class="hover:bg-[#274b868d] w-full rounded-lg transition-all ease-in-out">
                    <div class="flex relative sm:justify-start max-sm:justify-center items-center px-3 py-2">
                        <i class="ri-book-open-line text-2xl max-sm:text-3xl"></i>
                        <span class="max-sm:hidden ml-3">Kursus</span>
                    </div>
                </a>
                <a href="<?= base_url('/materi') ?>" class="hover:bg-[#274b868d] w-full rounded-lg transition-all ease-in-out">
                    <div class="flex relative sm:justify-start max-sm:justify-center items-center px-3 py-2">
                        <i class="ri-todo-line text-2xl max-sm:text-3xl"></i>
                        <span class="max-sm:hidden ml-3">Materi</span>
                    </div>
                </a>
            </div>
        </aside>

        <div class="flex flex-col w-full px-3 py-3 main md:ml-[200px] transition-all duration-150 ease-in" id="mainMenu">
            <header class="px-4 py-3 w-full border bg-white border-solid border-1 border-slate-300 rounded-lg transition-all duration-150 ease-in">
                <div class=" flex flex-3 justify-between items-center">
                    <button onclick="menuSideBar()" class="border-solid bg-[#3D6CB9] w-10 h-10 hover:bg-[#2c569a] text-white rounded-md transition-all ease-in-out sm:hidden"><i class="ri-menu-line text-[25px]"></i></button>
                    <div class=" h-8 flex relative items-center py-2 max-sm:hidden">
                        <h1 class="font-semiboldbold">Home</h1>
                    </div>

                    <div class="w-10 h-10 flex relative items-center justify-center bg-white-600 border cursor-pointer rounded-full" onclick="userMenu()" id="btnUser">
                        <i class="ri-user-2-fill"></i>
                    </div>
                    
                    <div id = "menuUser" class="hidden origin-top-right absolute border right-5 mt-[11rem] w-[200px] shadow-md bg-white transition-all ease-in-out rounded-md">
                        <div class="flex flex-col">
                            <a href="/profile" class="px-4 h-full py-1 bg-wh bg-slate-200 hover:bg-slate-100 transition">
                                <h3 class="font-semibold"><?= userLogin()->nama; ?></h3>
                                <span class="text-[15px] text-slate-500"><?= userLogin()->email; ?></span>
                            </a>
                            <a href="/out" class="px-4 h-full py-1 bg-wh hover:bg-slate-100 transition text-red-600">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>

                <div class=" mt-3 h-8 border-t flex relative items-center py-2 sm:hidden">
                    <p class="text-xs">Home</p>
                </div>
            </header>

            <main class="bg-white my-2 rounded-lg border">
                <?= $this->renderSection('content'); ?>
            </main>
        </div>
    </div>
    <script>
        function menuSideBar() {
            document.getElementById("menuSidebar").classList.toggle("translate-x-0");
            document.getElementById("mainMenu").classList.toggle("ml-20");
        }

        function userMenu() {
            document.getElementById("menuUser").classList.toggle('hidden');
        }
    </script>
</body>

</html>