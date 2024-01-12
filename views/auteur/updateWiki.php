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
    <?php include '../../views/includes/nav.php' ?>


    <div class="flex">


        <div class="mt-4">
            <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
                <h1 class="text-xl font-bold text-white capitalize dark:text-white">Update Wiki</h1>
                <form action="submit-update-wiki" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($wiki->getId()); ?>">
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-white dark:text-gray-200" for="title">Title</label>
                            <input id="title" type="text" name="title"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                value="<?php echo htmlspecialchars($wiki->getTitle()); ?>">
                        </div>
                        <div>
                            <label class="text-white dark:text-gray-200" for="category">Select Category</label>
                            <select name="category"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->getId(); ?>" <?php echo ($category->getId() == $defaultCategoryId) ? 'selected' : ''; ?>>
                                        <?php echo $category->getName(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>



                        </div>

                        <div>
                            <label class="text-white dark:text-gray-200" for="tag">Select Tags</label>
                            <select name="tags[]" multiple
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <?php foreach ($tags as $tag): ?>
                                    <option value="<?php echo $tag->getId(); ?>" <?php echo (in_array($tag->getId(), $defaultTagIds)) ? 'selected' : ''; ?>>
                                        <?php echo $tag->getLabel(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <div>
                            <label class="text-white dark:text-gray-200" for="passwordConfirmation">Text Area</label>
                            <textarea id="textarea" type="textarea" name="content"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"><?php echo htmlspecialchars($wiki->getContent()); ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-white">
                                Image
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="">Upload a file</span>
                                        <input name="image" id="file-upload" name="file-upload" type="file"
                                            class="sr-only">
                                    </label>
                                    <p class="pl-1 text-white">or drag and drop</p>
                                    <p class="text-xs text-white">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="text-white dark:text-gray-200" for="uploaded-image">Uploaded Image</label>
                            <img id="uploaded-image" src="<?php echo htmlspecialchars($wiki->getImage()); ?>"
                                alt="Uploaded Image" class="mt-2 w-60 h-36">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Update</button>
                    </div>
                </form>
            </section>

            <script>
                const fileInput = document.getElementById('file-upload');
                const uploadedImage = document.getElementById('uploaded-image');

                fileInput.addEventListener('change', function () {
                    const file = fileInput.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            uploadedImage.src = e.target.result;
                        };

                        reader.readAsDataURL(file);
                    }
                });
            </script>
        </div>

</body>

</html>