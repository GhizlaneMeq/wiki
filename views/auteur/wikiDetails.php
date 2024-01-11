<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Details</title>
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
    <?php include '../../views/includes/navbar.php' ?>

    <div class="flex">


        <div class="mt-4 max-w-4xl mx-auto">

            <section class="p-6 bg-indigo-600 rounded-md shadow-md text-white mt-20">
                <h1 class="text-2xl font-bold capitalize">Wiki Details</h1>



                <?php
                if ($wiki) {
                    ?>

                    <div class="mt-4 bg-white p-6 rounded-md shadow-md">
                        <img src="<?php echo $wiki->getImage(); ?>" alt="Wiki Image" class="w-full h-32 object-cover mb-4">
                        <h2 class="text-xl font-semibold mb-2">
                            <?php echo $wiki->getTitle(); ?>
                        </h2>
                        <p class="text-gray-600 text-sm mb-2">
                            <?php echo $wiki->getDateCreation(); ?>
                        </p>
                        <p class="text-gray-700">
                            <?php echo $wiki->getContent(); ?>
                        </p>


                        <div class="mt-4">
                            <label class="text-gray-600">Category:</label>
                            <p class="text-gray-700">
                                <?php echo $wiki->getCategoryId(); ?>
                            </p>
                        </div>

                        <div class="mt-4">
                            <label class="text-gray-600">Tags:</label>
                            <ul class="list-disc list-inside">
                                <?php foreach ($wiki->getTags() as $tag): ?>
                                    <li class="text-gray-700">
                                        <?php echo $tag; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        



                    </div>

                <?php } else {
                    echo "<p class='text-red-500'>Wiki not found.</p>";
                }
                ?>
            </section>

        </div>

    </div>

</body>

</html>