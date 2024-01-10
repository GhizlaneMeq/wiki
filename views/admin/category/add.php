<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>

        <div class="mt-4 max-w-4xl mx-auto">

            <section class="p-6 bg-indigo-600 rounded-md shadow-md text-white mt-20">
                <h1 class="text-2xl font-bold capitalize">Manage Categories</h1>
            </section>

            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                
                <form action="add-category" method="post">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="newCategory" class="text-gray-700">New Category</label>
                            <input type="text" id="newCategory" name="newCategory" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Add Category</button>
                        </div>
                    </div>
                </form>

                
                <table class="min-w-full mt-6 bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $category) {
                        ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $category->getId(); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $category->getName(); ?></td>
                                <td class="py-2 px-4 border-b">
                                <a href="update-category?id=<?php echo $category->getId(); ?>" class="text-blue-500">Update</a>
                                    <a href="delete-category?id=<?=$category->getId(); ?>" class="text-red-500">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </section>

        </div>

    </div>

</body>

</html>
