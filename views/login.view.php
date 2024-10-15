<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-[#2f2f40]">
    <header class="w-full text-sm font-medium text-white">
        <div class="flex flex-row items-center justify-between px-16 py-12 pb-0">
            <div class="h-[48px]">
                <img class="h-full" src="<?= asset('images/logo.png') ?>" alt="">
            </div>
            <div>
                <p>Having trouble? <a href="" class="text-[#bb8b41]">Contact us</a></p>
            </div>
        </div>
    </header>
    <main class="w-full">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-semibold text-white">Welcome back</h1>
            <div class="mt-8 w-[477px] text-sm rounded-xl bg-white p-8">
                <form action="<?= route('login.store') ?>" method="post">
                    <div class>
                        <label for="username">Username <sup class="text-red-700">*</sup></label>
                        <input class="mt-2 h-10 w-full rounded-md border" name="username" type="text" value="<?= old('username') ?>">
                        <?php component('error', ['errors' => errors('username')]); ?>
                    </div>
                    <div class="mt-4">
                        <label for="password">Password <sup class="text-red-700">*</sup></label>
                        <input class="mt-2 h-10 w-full rounded-md border" name="password" type="password">
                        <?php component('error', ['errors' => errors('password')]); ?>
                    </div>

                    <button class="text-white rounded-md w-full mt-6 h-10 bg-[#bb8b41]" name="submit" type="submit">Sign in</button>
                </form>

                <hr class="my-8 w-full text-gray-100">
                <p class="text-center">Having trouble signing in?</p>
                <div class="mt-2 text-[#bb8b41] flex flex-row  justify-center space-x-2">
                    <a href="">Forgotten Username</a>
                    <span>|</span>
                    <a href="">Forgotten Password</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="pt-10">
        <p class="text-xs text-[#9ca3af] text-center">Regulated activities are carried out on behalf of the Capital International Group by its licensed member companies. Full details can be viewed here.</p>
    </footer>
</body>

</html>
