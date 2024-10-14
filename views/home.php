<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
        :root {
        --gold: #bb8b41;
        --white: #ffffff;
        }

        .bg-custom-gradient {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0) 69%, #1b1429),
                            radial-gradient(circle farthest-corner at 50% 70%, #2f2f40 32%, #1b1529 59%);
        }

    </style>
</head>

<body class="bg-[#1b1529]">
    <header class="h-[74px] flex justify-center text-base font-medium text-white">
        <div class="h-full pt-4 px-6 max-w-[1248px] w-full  flex flex-row items-center justify-between items-center">
            <div class="w-[135px]">
                <img class="h-full" src="<?php echo asset('images/logo.png'); ?>" alt="">
            </div>
            <div class="flex flex-row space-x-5 items-center h-full">
                <a href="">Investment Services</a>
                <a href="">Banking</a>
                <a href="">Company</a>
                <a href="" class="text-[color:--gold]">Login</a>
                <button class="bg-[color:--gold] rounded-3xl px-4 p-2">Get started</button>
                <img class="size-4" src="<?php echo asset('images/search.svg');?>" alt="">
            </div>
        </div>
    </header>

    <main class="text-white py-20 bg-custom-gradient font-['Lora']">
        <div class="max-w-[1248px] mx-auto">
            <div class="py-14 px-6 w-full">
                <div class="text-center max-w-[960px] flex flex-col mx-auto items-center w-full">
                    <h1 class="text-[70px] leading-[76px] font-medium">Invest with us. Bank with us.</h1>
                    <h2 class="text-[70px] leading-[76px] font-medium italic text-[color:--gold]">Grow with us.</h2>
                    <p class="mx-auto font-['proxima-nova'] font-normal text-center text-2xl leading-[30px] max-w-[75%]">Explore the ultimate suite of financial services designed to simplify asset and cash management for businesses, intermediaries and high net worth individuals</p>
                </div>
                <div class="mt-12 flex flex-row space-x-5 mx-auto">
                    <div class="w-1/3 p-7 rounded-2xl bg-white text-black">
                        <h3 class="text-2xl font-semibold">Investment Platform</h3>
                        <p class="text-base">Use of our international investment platform to place your own trades across an almost unlimited universe of assets</p>
                        <button class="font-semibold mt-2 bg-[color:--gold] text-white rounded-3xl px-3 px-4 py-2.5">Learn more</button>
                    </div>
                    <div class="w-1/3 p-7 rounded-2xl bg-white text-black">
                        <h3 class="text-2xl font-semibold">Investment Platform</h3>
                        <p class="text-base">Use of our international investment platform to place your own trades across an almost unlimited universe of assets</p>
                        <button class="font-semibold mt-2 bg-[color:--gold] text-white rounded-3xl px-3 px-4 py-2.5">Learn more</button>
                    </div>
                    <div class="w-1/3 p-7 rounded-2xl bg-white text-black">
                        <h3 class="text-2xl font-semibold">Investment Platform</h3>
                        <p class="text-base">Use of our international investment platform to place your own trades across an almost unlimited universe of assets</p>
                        <button class="font-medium text-base mt-2 bg-[color:--gold] text-white rounded-3xl px-4 py-2.5">Learn more</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-[#9ca3af] pb-14">
        <div class="flex flex-row mx-auto mb-24 max-w-[1248px] px-6 pt-14">
            <div>
                <div class="w-[135px]">
                    <img class="h-full" src="<?php echo asset('images/logo.png'); ?>" alt="">
                </div>
            </div>
            <div class="flex flex-1 space-x-12 justify-end text-base">
                <div class="max-w-24 text-wrap">
                    <h4 class="font-semibold text-white mb-4">Services</h4>
                    <ul class="list-none mb-4">
                        <li class="mt-2">Investment Platform</li>
                        <li class="mt-2">Investment Management</li>
                        <li class="mt-2">Investment Corporate Banking</li>
                    </ul>
                </div>
                <div class="max-w-24 text-wrap">
                    <h4 class="font-semibold text-white mb-4">Services</h4>
                    <ul class="list-none mb-4">
                        <li class="mt-2">Investment Platform</li>
                        <li class="mt-2">Investment Management</li>
                        <li class="mt-2">Investment Corporate Banking</li>
                    </ul>
                </div>
                <div class="max-w-24 text-wrap">
                    <h4 class="font-semibold text-white mb-4">Services</h4>
                    <ul class="list-none mb-4">
                        <li class="mt-2">Investment Platform</li>
                        <li class="mt-2">Investment Management</li>
                        <li class="mt-2">Investment Corporate Banking</li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="text-[rgb(255,255,255)] px-6 max-w-[1248px] mx-auto">
            <div class="flex justify-between">
                <div class="max-w-3xl">
                    <p class="">Regulated activities are carried out on behalf of the Capital International Group by its licensed member companies. Full company details, website terms and privacy & cookie notice can be viewed here.</p>
                </div>
                <p class="text-[color:--gold] font-semibold whitespace-nowrap">Cookie preferences</p>
            </div>

            <p class="mt-4">© Capital International Group, 2024</p>

        </div>
    </footer>
</body>

</html>
