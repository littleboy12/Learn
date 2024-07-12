<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" href="/img/icon.png" />
    <title><?= $title; ?></title>
    <style>
        .p {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 300px;
            white-space: nowrap;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <div>
                        <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                            <span class="font-bold text-xl">LearnApp</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Home</a>
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Courses</a>
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">About</a>
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Contact</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-2">
                    <?php 
                    if ($name != NULL) {
                        ?>
                        <a href="/profile">
                            <div class="w-10 h-10 flex relative items-center justify-center bg-white-600 border cursor-pointer rounded-full" onclick="userMenu()" id="btnUser">
                                <i class="ri-user-2-fill"></i>
                            </div>
                        </a>
                        <?php
                    } else {
                        ?>
                        <a href="/auth" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">Sign in</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    
    <?= $this->renderSection('content'); ?>

    <footer class="bg-gray-800 py-8">
        <div class="max-w-6xl mx-auto px-4 text-center text-white">
            <p>&copy; 2024 LearnApp. Seluruh hak cipta.</p>
        </div>
    </footer>

</body>
</html>