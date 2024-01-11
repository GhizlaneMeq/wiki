<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen flex items-center justify-center">

    <div class="flex flex-col md:flex-row ">
      <img src="public/img/home.jpg" class="md:ml-4 mb-4 md:mb-0" alt="Image" style="width: 400px; height:700px ">

      <div class="bg-white shadow rounded-lg md:ml-4 md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
        <div class="p-6 sm:p-8 lg:p-16 space-y-8">
          <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
            Create a Free Account
          </h2>
          <form class="mt-8 space-y-6" action="submit-register" method="post">
            <div>
              <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Your name</label>
              <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                placeholder="name" required>
            </div>
            <div>
              <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Your email</label>
              <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                placeholder="name@gmail.com" required>
            </div>
            <div>
              <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Your password</label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                required>
            </div>
            <div>
              <label for="confirm-password" class="text-sm font-medium text-gray-900 block mb-2">Confirm
                password</label>
              <input type="password" name="cpassword" id="confirm-password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                required>
            </div>
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                  class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" required>
              </div>
              <div class="text-sm ml-3">
                <label for="remember" class="font-medium text-gray-900">I accept the <a href="#"
                    class="text-teal-500 hover:underline">Terms and Conditions</a></label>
              </div>
            </div>
            <button type="submit"
              class="bg-blue-800 text-white p-2 rounded w-full hover:bg-white hover:text-blue-800 focus:outline-none focus:ring focus:ring-green-200">register</button>
            <div class="text-sm font-medium text-gray-500">
              Already have an account? <a href="login" class="text-teal-500 hover:underline">Login here</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;

      if (name === "" || email === "" || password === "") {
        alert("All fields are required.");
        return false;
      }

      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("Invalid email format.");
        return false;
      }

      return true;
    }
  </script>

</body>

</html>