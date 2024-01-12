<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>

  .search-bar {
    position: relative;
  }

  .search-bar input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    background-color: #f8f8f8;
  }

  .search-bar button {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    padding: 8px;
    border: none;
    border-radius: 5px;
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
  }
</style>
</head>

<body>

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>




                <div class="mt-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        <div class="w-full px-4 sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="flex items-center p-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">

                                    <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                    <div class="text-gray-500">New Users</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="flex items-center p-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">

                                    <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                    <div class="text-gray-500">New Users</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="flex items-center p-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">

                                    <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                    <div class="text-gray-500">New Users</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-4 sm:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="flex items-center p-6 shadow-sm rounded-md bg-white">
                                <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">

                                    <svg class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="ml-5">
                                    <h4 class="text-2xl font-semibold text-gray-700">8,282</h4>
                                    <div class="text-gray-500">New Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>