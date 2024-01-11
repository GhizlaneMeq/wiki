<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>

    <?php include '../../views/includes/sidebar.php' ?>

    <div class="flex">
        <div class="mt-9 max-w-4xl mx-auto">
            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                <div class="mb-1 w-full mb-5">
                    <div class="mt-4">
                        <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Authors</h1>
                    </div>
                    <div class="block sm:flex items-center md:divide-x md:divide-gray-100">
                        <form class="sm:pr-3 mb-4 sm:mb-0" action="#" method="GET">
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="mt-1 relative sm:w-64 xl:w-96">
                                <input type="text" name="email" id="products-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Search for products">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="align-middle inline-block min-w-full">
                        <div class="shadow overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                            Image
                                        </th>
                                        <th scope="col" class="p-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                <div class="text-base font-semibold text-gray-900"><?= $user->getName() ?>
                                                </div>
                                            </td>
                                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                <?= $user->getEmail() ?></td>
                                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                <?= $user->getStatus() ?></td>
                                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                                <img src="<?= $user->getImage() ?>" alt="Author Image"
                                                    class="h-12 w-auto">
                                            </td>
                                            <td class="p-4 whitespace-nowrap space-x-2">
                                                <?php if ($user->getStatus() == 'authorized') { ?>
                                                    <form action="block-user" method="post">
                                                        <input type="hidden" name="URL" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                                        <input type="hidden" name="user" value="<?= $user->getId() ?>">
                                                        <button type="submit"
                                                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                                            Authorization
                                                        </button>
                                                    </form>
                                                <?php } else { ?>
                                                    <form action="authorize-user" method="post">
                                                        <input type="hidden" name="URL" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                                        <input type="hidden" name="user" value="<?= $user->getId() ?>">
                                                        <button type="submit" data-modal-toggle="delete-product-modal"
                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                                            Deauthorization
                                                        </button>
                                                    </form>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                id="delete-product-modal">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="bg-white rounded-lg shadow relative">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="delete-product-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this
                                product?</h3>
                            <a href="#"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </a>
                            <a href="#"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                data-modal-toggle="delete-product-modal">
                                No, cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
