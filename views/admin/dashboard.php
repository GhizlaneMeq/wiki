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

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>

        <div class="mt-4 max-w-4xl mx-auto">



            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?=$wikis?></span>
                            <h3 class="text-base font-normal text-gray-500">Wikis</h3>
                        </div>
                        
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?=$tags?></span>
                            <h3 class="text-base font-normal text-gray-500">Tags</h3>
                        </div>
                        
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?=$users?></span>
                            <h3 class="text-base font-normal text-gray-500">Users</h3>
                        </div>
                        
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?=$authorizedYsers?></span>
                            <h3 class="text-base font-normal text-gray-500">Authorized Users</h3>
                        </div>
                        
                    </div>

                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?=$notAuthorizedUsers?></span>
                            <h3 class="text-base font-normal text-gray-500">None Authorized Users</h3>
                        </div>
                        
                    </div>
                </div>


            </section>

        </div>

    </div>

</body>

</html>