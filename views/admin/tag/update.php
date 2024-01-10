<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tag</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>

        <div class="mt-4 max-w-4xl mx-auto">

            <section class="p-6 bg-indigo-600 rounded-md shadow-md text-white mt-20">
                <h1 class="text-2xl font-bold capitalize">Update Tag</h1>
            </section>

            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                <?php
                if ($tag) {
                ?>
                    <form action="submit-update-tag" method="post">
                        <input type="hidden" name="id" value="<?php echo $tag->getId(); ?>">
                        <label for="updatedTag" class="text-gray-700">Updated Tag Name</label>
                        <input type="text" id="label" name="label" value="<?php echo $tag->getLabel(); ?>" class="mt-2 p-2 border border-gray-300 rounded-md w-full">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md mt-4">Update Tag</button>
                    </form>
                <?php
                } else {
                    echo "Tag not found!";
                }
                ?>

            </section>

        </div>

    </div>

</body>

</html>
