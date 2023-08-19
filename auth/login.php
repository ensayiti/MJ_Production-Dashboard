<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | MJ Prod</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../dist/globals.css">

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <section class="bg-fuchsia-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <a href="../index.php" class="flex items-center mb-6 text-2xl text-fuchsia-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code-2 mr-2 w-8 h-8 text-fuchsia-900">
                    <path d="m18 16 4-4-4-4" />
                    <path d="m6 8-4 4 4 4" />
                    <path d="m14.5 4-5 16" />
                </svg>
                MJ Production
            </a>

            <div class="w-full bg-fuchsia-50 rounded-lg shadow-lg md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-fuchsia-900 md:text-2xl">Sign in to your account</h1>
                    <form action="login-check.php" class="space-y-4 md:space-y-6">
                        <div>
                            <label for="username" class="block text-sm font-medium text-fuchsia-900">Username</label>
                            <input type="text" name="username" id="username" class="bg-fuchsia-50 border-fuchsia-600 text-fuchsia-900 sm:text-sm rounded-lg focus:ring-fuchsia-600 focus:border-fuchsia-600 block w-full p-2.5 transition duration-300" placeholder="(e.g: admin)" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-fuchsia-900">Password</label>
                            <input type="password" name="password" id="password" class="bg-fuchsia-50 border-fuchsia-600 text-fuchsia-900 sm:text-sm rounded-lg focus:ring-fuchsia-600 focus:border-fuchsia-600 block w-full p-2.5 transition duration-300" placeholder="********" required>
                        </div>

                        <button type="submit" value="login" class="w-full text-fuchsia-50 bg-fuchsia-900 hover:bg-fuchsia-600 focus:ring-2 focus:outline-none focus:ring-fuchsia-950 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300">Sign In</button>
                        <a href="../index.php" class="block w-full text-fuchsia-900 bg-transparent outline outline-1 hover:bg-fuchsia-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>