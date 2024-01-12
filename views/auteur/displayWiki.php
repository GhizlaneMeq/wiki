<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my wikis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<?php include '../../views/includes/nav.php' ?>

<a class="text-blue-800 me-11" href="add-wiki">Add Wiki</a>

<?php
                $message = isset($_GET['message']) ? urldecode($_GET['message']) : null;
                $error = isset($_GET['error']) ? urldecode($_GET['error']) : null;

                if ($message || $error) {
                    $messageClass = $message ? 'success-message' : 'error-message';
                    echo "<div class=\"{$messageClass} p-4 mb-4 rounded-md border bg-red-200 \">";
                    echo $message ?? $error;
                    echo '<span class="float-right cursor-pointer" onclick="closeMessage(this)">×</span>';
                    echo '</div>';
                }
                ?>

    <div class="flex">


        <div class='overflow-x-auto w-full mt-5 '>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($wikis as $wiki) : ?>
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <img src="<?= $wiki->getImage(); ?>" alt="Wiki Image" class="w-full h-32 object-cover mb-4">
                        <h3 class="text-lg font-semibold mb-2"><?= $wiki->getTitle(); ?></h3>
                        <p class="text-gray-600 text-sm mb-2"><?= $wiki->getDateCreation(); ?></p>
                        <p class="text-gray-700"><?= $wiki->getContent(); ?></p>
                        <div class="mt-4 flex justify-between">
                            <a href="update-wiki?id=<?= $wiki->getId(); ?>" class="text-blue-500">Update</a>
                            <a href="delete-wiki?id=<?= $wiki->getId(); ?>" class="text-red-500">Delete</a>
                            <a href="see-details-wiki?id=<?= $wiki->getId(); ?>" class="text-purple-500">See More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</body>

</html>
