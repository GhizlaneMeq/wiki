<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tags</title>
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
                <h1 class="text-2xl font-bold capitalize">Manage Tags</h1>
            </section>

            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                <form action="add-tag" method="post">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="newTag" class="text-gray-700">New Tag</label>
                            <input type="text" id="newTag" name="newTag" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Add Tag</button>
                        </div>
                    </div>
                </form>

                <table class="min-w-full mt-6 bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Label</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tags as $tag) {
                        ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $tag->getId(); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $tag->getLabel(); ?></td>
                                <td class="py-2 px-4 border-b">
                                    <a href="update-tag?id=<?php echo $tag->getId(); ?>" class="text-blue-500">Update</a>
                                    <a href="delete-tag?id=<?php echo $tag->getId(); ?>" class="text-red-500">Delete</a>
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
