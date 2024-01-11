
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="home">Home</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="#">Categories</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="#wikis">Wikis</a></li>
            <?php if ($userData != null) { ?>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="my-wikis">My Wikis</a></li>

            </ul>
        </nav>


        <div class="flex items-center text-lg no-underline text-white pr-6">
                <li class="relative group" id="userDropdown">
                    <span class="text-sm text-gray-400 hover:text-gray-500 cursor-pointer">
                        <?= $userData->getName(); ?>
                    </span>
                    <ul class="absolute hidden space-y-2 mt-2 bg-blue-800 border border-gray-200 p-2 rounded-lg"
                        id="dropdownMenu">
                        <li><a href="my-profile">Profile</a></li>
                        <li><a href="logout">Logout</a></li>
                    </ul>
                </li>
            <?php } else { ?>

                </ul>
        </nav>

                <div class="flex items-center">
                    <a class=" lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-white hover:bg-gray-100 text-sm text-blue-800 font-bold  rounded-xl transition duration-200"
                        href="login">Login </a>
                    <a class=" lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-white hover:bg-gray-100 text-sm text-blue-800 font-bold  rounded-xl transition duration-200"
                        href="register">Register</a>
                <?php } ?>
            </div>
        </div>

</nav>


<script>
        const userDropdown = document.getElementById('userDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        if (userDropdown && dropdownMenu) {
            userDropdown.addEventListener('mouseenter', () => {
                dropdownMenu.classList.remove('hidden');
            });
            userDropdown.addEventListener('mouseleave', () => {
                dropdownMenu.classList.remove('hidden');
            });



            document.addEventListener('click', (event) => {
                if (!userDropdown.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        }
    </script>