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

            <section class="p-6 bg-indigo-600 rounded-md shadow-md text-white mt-20">
                <h1 class="text-2xl font-bold capitalize">Dashboard</h1>
            </section>

            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php
                    foreach ($wikis as $wiki) {
                        ?>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <a href="wiki-details?id=<?php echo $wiki->getId(); ?>" class="block">
                                <img src="<?php echo $wiki->getImage(); ?>" alt="Wiki Image"
                                    class="w-full h-32 object-cover mb-4">
                                <h3 class="text-lg font-semibold mb-2">
                                    <?php echo $wiki->getTitle(); ?>
                                </h3>
                                <p class="text-gray-600 text-sm mb-2">
                                    <?php echo $wiki->getDateCreation(); ?>
                                </p>
                                <p class="text-gray-700">
                                    <?php echo $wiki->getContent(); ?>
                                </p>
                                <p><strong>Category:</strong>
                                    <?php echo $wiki->getCategoryId(); ?>
                                </p>
                                <p><strong>Author:</strong>
                                    <?php echo $wiki->getUserId(); ?>
                                </p>
                                <p><strong>Tags:</strong>
                                    <?php echo implode(', ', $wiki->getTags()); ?>
                                </p>

                                
                            </a>
                            <?php if ($wiki->isArchived()): ?>
                                    <form action="disarchive-wiki" method="post" class="inline-block">
                                        <input type="hidden" name="wiki_id" value="<?php echo $wiki->getId(); ?>">
                                        <button type="submit" class="text-green-500">Disarchive Wiki</button>
                                    </form>
                                <?php else: ?>
                                    <form action="archive-wiki" method="post" class="inline-block">
                                        <input type="hidden" name="wiki_id" value="<?php echo $wiki->getId(); ?>">
                                        <button type="submit" class="text-red-500">Archive Wiki</button>
                                    </form>
                                <?php endif; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </section>

        </div>

    </div>

</body>

</html>