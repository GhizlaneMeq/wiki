<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lainding page</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <?php include 'includes/nav.php' ?>


    <header class="w-full container mx-auto flex flex-col lg:flex-row mt-24 mb-11">
        <div class="lg:w-1/2 mb-8 lg:mb-0 order-2 lg:order-1">
            <h1 class="text-4xl lg:text-6xl font-bold mb-6"><span class="text-blue-800">Wiki:</span> Your Gateway to
                Knowledge Sharing</h1>
            <p class="text-gray-500 mb-4">Welcome to the Wiki platform, <span class="text-blue-800">your ultimate
                    gateway to collaborative knowledge sharing.</span> Dive into a world where users explore, create,
                and share wikis on a diverse range of topics.</p>
            <div class="flex items-center space-x-4 mb-4">

                <input type="text" name="searchInput" id="searchInput" class="w-full p-2 border border-gray-300 rounded"
                    placeholder="Search...">
                <button type="submit"
                    class="bg-blue-800 text-white px-4 py-2 rounded-full lg:inline-block hidden">Search</button>


            </div>
        </div>


        <div class="lg:w-1/2 order-1 lg:order-2 mt-4 lg:mt-0 ">
            <img src="public/img/home.jpg" alt="Home Image" class="w-full rounded-lg max-w-sm mx-auto"
                style="height: 250px;">
        </div>
    </header>


    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <?php foreach ($Recentcategories as $recentCategory): ?>
                    <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">
                        <?= $recentCategory->getName() ?>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6" id="wikis">

        <section id="searchResults" class="w-full md:w-2/3 flex flex-col items-center px-3">






            <?php foreach ($wikis as $wiki): ?>
                <article class="flex flex-col shadow my-4">

                    <img style="width: 800px; height:300px;" class="hover:opacity-75"
                        src="<?php echo $wiki->getImage(); ?>">

                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                            <?php echo $wiki->getCategoryId(); ?>
                        </a>
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                            <?php echo $wiki->getTitle(); ?>
                        </a>
                        <p href="#" class="text-sm pb-3">
                            By <a href="#" class="font-semibold hover:text-gray-800">
                                <?php echo $wiki->getUserId(); ?>
                            </a>, Published on
                            <?php echo $wiki->getDateCreation(); ?>
                        </p>
                        <a href="#" class="pb-6">
                            <?php echo implode(' ', array_slice(explode(' ', $wiki->getContent()), 0, 30)); ?>...
                        </a>
                        <a href="see-details-wiki?id=<?php echo $wiki->getId(); ?>"
                            class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            <?php endforeach ?>


            <div class="flex items-center py-8">
                <a href="#"
                    class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next
                    <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Categories</p>

                <div class="flex flex-wrap">
                    <?php foreach ($Recentcategories as $recentCategory): ?>
                        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2 mb-2">
                            <?= $recentCategory->getName() ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>

           


            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Tags</p>
                <div class="grid grid-cols-3 gap-3">

                    <?php foreach ($Recentcategories as $recentCategory): ?>
                        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2 mb-2">
                            <?= $recentCategory->getName() ?>
                        </a>
                    <?php endforeach ?>
                </div>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    see more
                </a>
            </div>

        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="relative w-full flex items-center invisible md:visible md:pb-12" x-data="getCarouselData()">
            <button
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">About Us</a>
                <a href="#" class="uppercase px-3">Privacy Policy</a>
                <a href="#" class="uppercase px-3">Terms & Conditions</a>
                <a href="#" class="uppercase px-3">Contact Us</a>
            </div>
            <div class="uppercase pb-6">&copy; myblog.com</div>
        </div>
    </footer>


    <script>
        const searchInput = document.getElementById("searchInput");
        const searchResults = document.getElementById("searchResults");


        searchInput.addEventListener("input", handleSearch);

        async function handleSearch(e) {
            try {
                const query = e.target.value;
                const data = await fetchData(query);
                updateResults(data);
            } catch (error) {
                console.log(error);
            }
        }

        async function fetchData(query) {
            const response = await fetch("search?q=" + encodeURIComponent(query));
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.text();
            console.log(data);
            return data;
        }

        function updateResults(data) {
            const results = JSON.parse(data);


            searchResults.innerHTML = "";


            results.forEach((wiki) => {
                const article = document.createElement("article");
                article.className = "flex flex-col shadow my-4";

                const img = document.createElement("img");
                img.style.width = "800px";
                img.style.height = "300px";
                img.className = "hover:opacity-75";
                img.src = wiki.image;

                const div = document.createElement("div");
                div.className = "bg-white flex flex-col justify-start p-6";

                const categoryLink = document.createElement("a");
                categoryLink.className = "text-blue-700 text-sm font-bold uppercase pb-4";
                categoryLink.href = "#";
                categoryLink.textContent = wiki.category_name;

                const titleLink = document.createElement("a");
                titleLink.className = "text-3xl font-bold hover:text-gray-700 pb-4";
                titleLink.href = "#";
                titleLink.textContent = wiki.title;

                const authorLink = document.createElement("a");
                authorLink.className = "text-sm pb-3";
                authorLink.href = "#";
                authorLink.innerHTML = `By <a href="#" class="font-semibold hover:text-gray-800">${wiki.user_name}</a>, Published on ${wiki.date_creation}`;

                const contentParagraph = document.createElement("p");
                contentParagraph.href = "#";
                contentParagraph.textContent = wiki.content.slice(0, 30) + "...";

                const continueReadingLink = document.createElement("a");
                continueReadingLink.className = "uppercase text-gray-800 hover:text-black";
                continueReadingLink.href = `see-details-wiki?id=${wiki.id}`;
                continueReadingLink.innerHTML = `Continue Reading <i class="fas fa-arrow-right"></i>`;

                div.appendChild(categoryLink);
                div.appendChild(titleLink);
                div.appendChild(authorLink);
                div.appendChild(contentParagraph);
                div.appendChild(continueReadingLink);

                article.appendChild(img);
                article.appendChild(div);

                searchResults.appendChild(article);
            });
        }



    </script>

</body>


</html>