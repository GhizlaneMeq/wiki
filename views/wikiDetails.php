<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lainding page</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!--  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script> -->
</head>

<body class="bg-white font-family-karla">

    <?php include 'includes/nav.php' ?>

    <div class="container mx-auto flex flex-wrap py-6">

        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

           
                <article class="flex flex-col shadow my-4">

                    <img style="width: 800px; height:300px;" class="hover:opacity-75"
                        src="<?php echo $wiki->getImage(); ?>">

                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                            <?php echo $wiki->getCategoryId(); ?>
                        </a>
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                            <?php echo $wiki->getTitle(); ?>
                        </a>
                        <p href="#" class="text-sm pb-3">
                            By <a href="#" class="font-semibold hover:text-gray-800">
                                <?php echo $wiki->getUserId(); ?>
                            </a>, Published on
                            <?php echo $wiki->getDateCreation(); ?>
                        </p>
                        <a href="#" class="pb-6">
                            <?php echo $wiki->getContent(); ?>
                        </a>
                        <a href="display-wiki?id=<?php echo $wiki->getId(); ?>"
                            class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
        </section>

        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <?php foreach($wikis as $wiki): ?>
            <article class="flex flex-col shadow my-4">
                
                    <img style="width: 800px; height:300px;" class="hover:opacity-75"  src="<?php echo $wiki->getImage(); ?>">
                
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4"><?php echo $wiki->getCategoryId(); ?></a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4"><?php echo $wiki->getTitle(); ?></a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800"><?php echo $wiki->getUserId(); ?></a>, Published on  <?php echo $wiki->getDateCreation(); ?>
                    </p>
                    <a href="#" class="pb-6"><?php echo implode(' ', array_slice(explode(' ', $wiki->getContent()), 0, 30)); ?>...</a>
                    <a href="see-details-wiki?id=<?php echo $wiki->getId(); ?>" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        <?php endforeach ?>
            </div>

            

        </aside>

    </div>
</body>

</html>