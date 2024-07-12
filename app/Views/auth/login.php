<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
    <style>
        .toggle-container {
            display: flex;
            height: 95vh;
            justify-content: center;
            align-items: center;
            transition: all 0.5s ease;
        }

        .register-active .image-container {
            order: 2;
        }

        .register-active .form-container {
            order: 1;
        }
    </style>
</head>

<body class="p-5 ">
    <div class="toggle-container flex justify-center items-center">
        <div class="shadow-lg flex max-sm:w-full max-sm:mx-5">
            <div class="image-container flex bg-cover max-sm:hidden w-[30rem] justify-center items-center bg-[url('/img/bg-login.jpg')]">
                <!-- ini image -->
            </div>
            <div class="form-container max-w-md relative w-[21rem] py-2 max-sm:w-full flex flex-col p-4 rounded-md rounded-l-none max-sm:rounded-l-md text-black bg-white">
                <div class="login-form mb-[5rem]">
                    <div class="text-2xl font-bold mb-2 text-[#1e0e4b] text-center">Selamat Datang di <span class="text-[#7747ff]"><br>LearnApp</span></div>
                    <div class="text-sm font-normal mb-4 text-center text-[#1e0e4b]">Masuk ke akun Anda</div>
                    <form action="/auth/processLogin" method="POST" class="flex flex-col gap-3">
                        <div class="block relative">
                            <label for="email" class="block text-gray-600 cursor-text text-sm leading-[140%] font-normal mb-2">Email</label>
                            <input type="email" name="email" id="email" class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:outline-none focus:ring-1 focus:ring-blue-500 ring-offset-2 ring-gray-900 outline-0">
                            <?php if (session()->getFlashdata('wrongEmail')) : ?>
                                <span class="text-[12px] text-red-600">Email Yang Anda Masukan Salah !!</span>
                            <?php endif ?>
                            <?php if (session()->getFlashdata('error')) : ?>
                                <span class="text-[12px] text-red-600">Email Tidak Boleh Kosong</span>
                            <?php endif ?>
                        </div>
                        <div class="block relative">
                            <label for="password" class="block text-gray-600 cursor-text text-sm leading-[140%] font-normal mb-2">Password</label>
                            <input type="password" id="password" name="password" class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:outline-none focus:ring-1 focus:ring-blue-500 ring-offset-2 ring-gray-900 outline-0">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <span class="text-[12px] text-red-600">Password Tidak Boleh Kosong</span>
                            <?php endif ?>
                        </div>
                        <div class="mt-3">
                            <button type="submit" name="login" class="bg-[#7747ff] w-max m-auto px-6 py-2 rounded text-white text-sm font-normal hover:bg-[#683dde] transition-all">Masuk</button>
                        </div>
                    </form>
                    <div class="text-sm text-center mt-[1.6rem]">Belum punya akun? <a class="text-sm text-[#7747ff]" href="#" id="register-link">Daftar sekarang!</a></div>
                </div>
                <div class="register-form hidden">
                    <div class="text-2xl font-bold mb-2 text-[#1e0e4b] text-center">Selamat Datang di <span class="text-[#7747ff]"><br>LearnApp</span></div>
                    <div class="text-sm font-normal mb-4 text-center text-[#1e0e4b]">Buat akun baru Anda</div>
                    <form action="/auth/processRegister" method="POST" class="flex flex-col gap-3">
                        <div class="block relative">
                            <label for="register-nama" class="block text-gray-600 cursor-text text-sm leading-[140%] font-normal mb-2">Nama</label>
                            <input type="text" name="register-nama" id="register-nama" class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:outline-none focus:ring-1 focus:ring-blue-500 ring-offset-2 ring-gray-900 outline-0">
                            <?php if (session()->getFlashdata('nama')) : ?>
                                <span class="text-[12px] text-red-600">Nama Tidak Boleh Kosong</span>
                            <?php endif ?>
                        </div>
                        <div class="block relative">
                            <label for="register-email" class="block text-gray-600 cursor-text text-sm leading-[140%] font-normal mb-2">Email</label>
                            <input type="email" name="register-email" id="register-email" class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:outline-none focus:ring-1 focus:ring-blue-500 ring-offset-2 ring-gray-900 outline-0">
                            <?php if (session()->getFlashdata('nama')) : ?>
                                <span class="text-[12px] text-red-600">Email Tidak Boleh Kosong</span>
                            <?php endif ?>
                            <?php if (session()->getFlashdata('sudahTerdaftar')) : ?>
                                <span class="text-[12px] text-red-600">Email Sudah Terdaftar</span>
                            <?php endif ?>
                        </div>
                        <div class="block relative">
                            <label for="register-password" class="block text-gray-600 cursor-text text-sm leading-[140%] font-normal mb-2">Password</label>
                            <input type="password" id="register-password" name="register-password" class="rounded border border-gray-200 text-sm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:outline-none focus:ring-1 focus:ring-blue-500 ring-offset-2 ring-gray-900 outline-0">
                            <?php if (session()->getFlashdata('nama')) : ?>
                                <span class="text-[12px] text-red-600">Password Tidak Boleh Kosong</span>
                            <?php endif ?>
                        </div>
                        <div>
                            <button type="submit" name="register" class="bg-[#7747ff] w-max m-auto px-6 py-2 rounded text-white text-sm font-normal hover:bg-[#683dde] transition-all">Daftar</button>
                        </div>
                    </form>
                    <div class="text-sm text-center mt-[1.6rem]">Sudah punya akun? <a class="text-sm text-[#7747ff]" href="#" id="login-link">Masuk sekarang!</a></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('register-link').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('.toggle-container').classList.add('register-active');
            document.querySelector('.login-form').classList.add('hidden');
            document.querySelector('.register-form').classList.remove('hidden');
        });

        document.getElementById('login-link').addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('.toggle-container').classList.remove('register-active');
            document.querySelector('.login-form').classList.remove('hidden');
            document.querySelector('.register-form').classList.add('hidden');
        });
    </script>
</body>

</html>
