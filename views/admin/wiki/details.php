<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>

        <div class="mt-4 max-w-4xl mx-auto">

            <section class="p-6 bg-indigo-600 rounded-md shadow-md text-white mt-20">
                <h1 class="text-2xl font-bold capitalize">Wiki Details</h1>
            </section>

            <section class="mt-8 p-6 bg-white rounded-md shadow-md">

            <img src="<?php echo $wikiDetails->getImage(); ?>" alt="Wiki Image" class="w-full h-32 object-cover mb-4">


                <h3 class="text-lg font-semibold mb-2">
                    <?php echo $wikiDetails->getTitle(); ?>
                </h3>
                <p class="text-gray-600 text-sm mb-2">
                    <?php echo $wikiDetails->getDateCreation(); ?>
                </p>
                <p class="text-gray-700">
                    <?php echo $wikiDetails->getContent(); ?>
                </p>

                <div class="mt-4">
                    <p><strong>Category:</strong>
                        <?php echo $wikiDetails->getCategoryId(); ?>
                    </p>
                    <p><strong>Author:</strong>
                        <?php echo $wikiDetails->getUserId(); ?>
                    </p>
                    <p><strong>Tags:</strong>
                        <?php echo implode(', ', $wikiDetails->getTags()); ?>
                    </p>
                    <form action="block-user" method="post" class="inline-block">
                            <input type="hidden" name="userID" value="<?php echo $wikiDetails->getUserId(); ?>">
                            <button type="submit" class="text-green-500">Block Author</button>
                        </form>

                    <?php if ($wikiDetails->isArchived()): ?>
                        <form action="disarchive-wiki" method="post" class="inline-block">
                            <input type="hidden" name="wiki_id" value="<?php echo $wikiDetails->getId(); ?>">
                            <button type="submit" class="text-green-500">Disarchive Wiki</button>
                        </form>
                    <?php else: ?>
                        <form action="archive-wiki" method="post" class="inline-block">
                            <input type="hidden" name="wiki_id" value="<?php echo $wikiDetails->getId(); ?>">
                            <button type="submit" class="text-red-500">Archive Wiki</button>
                        </form>
                    <?php endif; ?>
                </div>
            </section>

        </div>

    </div>

</body>

</html>


