<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
  /* Add some style to the search bar */
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

    <div class="flex">

        <?php include '../../views/includes/sidebar.php' ?>


        <div class='overflow-x-auto w-full'>
          <a class="text-green-500" href="add-wiki">add wiki</a>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

           
           <div class="bg-white p-4 rounded-lg shadow-md">
               <img src="public/img/istockphoto-1398794748-1024x1024.jpg" alt="Image 1" class="w-full h-32 object-cover mb-4">
               <h3 class="text-lg font-semibold mb-2">Introduction to Programming</h3>
               <p class="text-gray-600 text-sm mb-2">09/01/2024</p>
               <p class="text-gray-700"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, incidunt fugiat fugit quibusdam quam molestiae minima dolores cumque nostrum ea cupiditate min</p>
           </div>
           <div class="bg-white p-4 rounded-lg shadow-md">
               <img src="public/img/istockphoto-1398794748-1024x1024.jpg" alt="Image 1" class="w-full h-32 object-cover mb-4">
               <h3 class="text-lg font-semibold mb-2">Introduction to Programming</h3>
               <p class="text-gray-600 text-sm mb-2">09/01/2024</p>
               <p class="text-gray-700"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, incidunt fugiat fugit quibusdam quam molestiae minima dolores cumque nostrum ea cupiditate min</p>
           </div>
           <div class="bg-white p-4 rounded-lg shadow-md">
               <img src="public/img/istockphoto-1398794748-1024x1024.jpg" alt="Image 1" class="w-full h-32 object-cover mb-4">
               <h3 class="text-lg font-semibold mb-2">Introduction to Programming</h3>
               <p class="text-gray-600 text-sm mb-2">09/01/2024</p>
               <p class="text-gray-700"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, incidunt fugiat fugit quibusdam quam molestiae minima dolores cumque nostrum ea cupiditate min</p>
           </div>
           <div class="bg-white p-4 rounded-lg shadow-md">
               <img src="public/img/istockphoto-1398794748-1024x1024.jpg" alt="Image 1" class="w-full h-32 object-cover mb-4">
               <h3 class="text-lg font-semibold mb-2">Introduction to Programming</h3>
               <p class="text-gray-600 text-sm mb-2">09/01/2024</p>
               <p class="text-gray-700"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, incidunt fugiat fugit quibusdam quam molestiae minima dolores cumque nostrum ea cupiditate min</p>
           </div>
        </div>
   
    </div>

</body>
</html>