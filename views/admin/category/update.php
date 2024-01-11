<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>

        <div class="mt-24 max-w-4xl mx-auto">

            
            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                <?php
                if ($category) {
                ?>
                    <form action="submit-update-category" method="post">
                    <input type="hidden" name="id" value="<?php echo $category->getId(); ?>">
                        <label for="updatedCategory" class="text-gray-700">Updated Category Name</label>
                        <input type="text" id="name" name="name" value="<?php echo $category->getName(); ?>" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md mt-4">Update Category</button>
                    </form>
                <?php
                } else {
                    echo "Category not found!";
                }
                ?>

            </section>

        </div>

    </div>

</body>

</html>
