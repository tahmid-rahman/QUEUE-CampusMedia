<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="/QUEUE/assets/image/Q.png" type="image/icon type">
    <title>Admin-Login </title>
</head>
<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <p class="flex items-center mb-6 text-2xl font-semibold text-[#15685c] ">
                <img class="w-8 h-8 mr-2" src="/QUEUE/assets/image/3 (1).png" alt="logo">
                Login to Control center   
            </p>
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="assets/php/action.php?adminLogin" enctype="multipart/form-data" method="POST">
                        <div>
                            <label for="Username" class="block mb-2 text-sm font-medium text-gray-900">Your username</label>
                            <input type="text" name="uname"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" placeholder="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#15685c] hover:bg-[#15685c]/80 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
      </section>
</body>
</html>