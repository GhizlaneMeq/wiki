<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Volkhov:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            transition: background-color 0.5s, color 0.5s;
        }

        .dark {
            background-color: #1a202c;
            color: #d1d5db;
        }

        h1 {
            font-family: 'Volkhov', serif;
        }
    </style>
</head>

<body class="dark:bg-gray-800 dark:text-white transition duration-500 ease-in-out">

    <nav class="bg-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">
                <h1 class="text-4xl">Wiki<span class="text-green-300">™</span></h1>
            </a>

            <button id="mobileMenuBtn" class="text-green-500 block lg:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <ul class="hidden lg:flex space-x-4">
                <li><a href="#" class="text-green-500 hover:underline">Home</a></li>
                <li><a href="#" class="text-green-500 hover:underline">About</a></li>
                <li><a href="#" class="text-green-500 hover:underline">Categories</a></li>
                <li><a href="#" class="text-green-500 hover:underline">Contact</a></li>
            </ul>

            <div class="flex items-center">
                <label for="darkModeToggle" class="mr-4 text-green-500">Dark Mode</label>
                <input type="checkbox" id="darkModeToggle" class="form-checkbox h-6 w-6 text-green-500" checked>
            </div>
        </div>

        <div id="mobileMenu" class="hidden lg:hidden">
            <ul class="flex flex-col space-y-2">
                <li><a href="#" class="text-green-500 hover:underline">Home</a></li>
                <li><a href="#" class="text-green-500 hover:underline">About</a></li>
                <li><a href="#" class="text-green-500 hover:underline">Categories</a></li>
                <li><a href="#" class="text-green-500 hover:underline">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-8 flex flex-col lg:flex-row">
        <div class="lg:w-1/2 mb-8 lg:mb-0 order-2 lg:order-1">
            <h1 class="text-4xl lg:text-6xl font-bold mb-4"><span class="text-green-300">Wiki:</span> Your Gateway to
                Knowledge Sharing</h1>
            <p class="text-gray-500 mb-4">Welcome to the Wiki platform, <span class="text-green-300">your ultimate
                    gateway to collaborative knowledge sharing.</span> Dive into a world where users explore, create,
                and share wikis on a diverse range of topics.</p>
            <div class="flex items-center space-x-4 mb-4">
                <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Search...">
                <button class="bg-orange-600 text-white px-4 py-2 rounded-full lg:inline-block hidden">Search</button>
            </div>
        </div>

        <div class="lg:w-1/2 order-1 lg:order-2 mt-4 lg:mt-0">
            <img src="./img/Screenshot_2024-01-07_184706-removebg-preview.png" alt="Home Image"
                class="w-full rounded-lg max-w-sm mx-auto">
        </div>

        <button class="bg-orange-600 text-white px-4 py-2 rounded-full lg:hidden block mx-auto mb-4">Search</button>
    </div>

    <div class="container mx-auto ">
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-4">Categories</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <div class="bg-green-500 rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 bg-cover bg-center relative"
                        style="background-image: url('./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg');">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <h4 class="text-lg font-semibold mb-2">Category 1</h4>
                            <p class="text-gray-300 mt-2">Wikis: <span class="font-bold">10</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-500 rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 bg-cover bg-center relative"
                        style="background-image: url('./img/light-bulb-with-tree-inside_1284-43062.jpg');">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <h4 class="text-lg font-semibold mb-2">Category 2</h4>
                            <p class="text-gray-300 mt-2">Wikis: <span class="font-bold">5</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-500 rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 bg-cover bg-center relative"
                        style="background-image: url('./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg');">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <h4 class="text-lg font-semibold mb-2">Category 1</h4>
                            <p class="text-gray-300 mt-2">Wikis: <span class="font-bold">10</span></p>
                        </div>
                    </div>
                </div>
                <div class="bg-green-500 rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 bg-cover bg-center relative"
                        style="background-image: url('./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg');">
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <h4 class="text-lg font-semibold mb-2">Category 1</h4>
                            <p class="text-gray-300 mt-2">Wikis: <span class="font-bold">10</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>



<section class="mb-8">
    <h3 class="text-xl font-semibold mb-4">Recent Wikis</h3>
    <div class="flex flex-wrap">

        <div class="w-full md:w-1/2 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 1" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 1</h4>
                    <p class="text-gray-500">Description of Recent Wiki 1.</p>
                </div>
            </div>
        </div>

        
        <div class="w-full md:w-1/4 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 2" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 2</h4>
                    <p class="text-gray-500">Description of Recent Wiki 2.</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/4 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 3" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 3</h4>
                    <p class="text-gray-500">Description of Recent Wiki 3.</p>
                </div>
            </div>
        </div>

        
        <div class="w-full md:w-1/2 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 4" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 4</h4>
                    <p class="text-gray-500">Description of Recent Wiki 4.</p>
                </div>
            </div>
        </div>


        <div class="w-full md:w-1/4 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 5" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 5</h4>
                    <p class="text-gray-500">Description of Recent Wiki 5.</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/4 p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="./img/cfb65b52ff1aa7038a89e25b1ce3b02f.jpg" alt="Recent Wiki 6" class="w-full h-32 object-cover">
                <div class="p-4">
                    <h4 class="text-lg font-semibold mb-2">Recent Wiki 6</h4>
                    <p class="text-gray-500">Description of Recent Wiki 6.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-8">
    <h3 class="text-xl font-semibold mb-4">Tags</h3>
    <div class="flex flex-wrap">

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag1</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag2</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag3</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag4</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag5</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag6</h4>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag5</h4>
                </div>
            </div>
        </div>

     
        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
            <div class="bg-cover bg-center h-40 relative"
                style="background-image: url('./img/1967ddeb64c46314f41e085beafd12a8.jpg');">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
                    <h4 class="text-lg font-semibold text-white">#Tag6</h4>
                </div>
            </div>
        </div>
    </div>
</section>





    </div>

<script src="../public/js/index.js"></script>
</body>

</html>