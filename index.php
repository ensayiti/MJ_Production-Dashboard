<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | MJ Prod</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./dist/globals.css">

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="antialiased bg-fuchsia-50">
        <nav class="bg-fuchsia-50 border-b border-fuchsia-950 px-4 py-2.5 fixed left-0 right-0 top-0 z-50">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation" class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>
                    <a href="https://flowbite.com" class="flex items-center justify-between mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code-2 mr-3 w-8 h-8 text-fuchsia-900">
                            <path d="m18 16 4-4-4-4" />
                            <path d="m6 8-4 4 4 4" />
                            <path d="m14.5 4-5 16" />
                        </svg>
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-fuchsia-900">MJ Production</span>
                    </a>
                </div>
                <div class="flex items-center lg:order-2">
                    <!-- <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo" />
                    </button> -->
                    <!-- Dropdown menu -->
                    <!-- <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow rounded-xl" id="dropdown">
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-900">Neil Sims</span>
                            <span class="block text-sm text-gray-900 truncate">name@flowbite.com</span>
                        </div>
                        <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">My profile</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Account settings</a>
                            </li>
                        </ul>
                        <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        </ul>
                        <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                            <li>
                                <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-100">Sign out</a>
                            </li>
                        </ul>
                    </div> -->

                    <!-- Sign In Button -->
                    <button class="px-5 py-2.5 text-sm font-medium text-fuchsia-50 bg-fuchsia-900 hover:bg-fuchsia-600 focus:ring-2 focus:outline-none focus:ring-fuchsia-950 rounded-lg text-center transition duration-300">
                        <a href="./auth/login.php">Sign In</a>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-fuchsia-50 border-r border-fuchsia-950 md:translate-x-0" aria-label="Sidenav" id="drawer-navigation">
            <div class="overflow-y-auto py-5 px-3 h-full bg-fuchsia-50">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-medium text-fuchsia-900 rounded-lg hover:text-fuchsia-50 hover:bg-fuchsia-950 group transition duration-300">
                            <svg aria-hidden="true" class="w-6 h-6 text-fuchsia-900 group-hover:text-fuchsia-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <!-- Customers Menu -->
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-medium text-fuchsia-900 rounded-lg hover:text-fuchsia-50 hover:bg-fuchsia-950 group transition duration-300" aria-controls="dropdown-customer" data-collapse-toggle="dropdown-customer">
                            <svg class="flex-shrink-0 w-6 h-6 text-fuchsia-900 group-hover:text-fuchsia-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Customers</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-customer" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">Add Customer</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">List Customer</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Orders Menu -->
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-medium text-fuchsia-900 rounded-lg hover:text-fuchsia-50 hover:bg-fuchsia-950 group transition duration-300" aria-controls="dropdown-order" data-collapse-toggle="dropdown-order">
                            <svg class="flex-shrink-0 w-6 h-6 text-fuchsia-900 group-hover:text-fuchsia-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Orders</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-order" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">Add Order</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">List Order</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">History Order</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Inventory Menu -->
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-medium text-fuchsia-900 rounded-lg hover:text-fuchsia-50 hover:bg-fuchsia-950 group transition duration-300" aria-controls="dropdown-inventory" data-collapse-toggle="dropdown-inventory">
                            <svg class="flex-shrink-0 w-6 h-6 text-fuchsia-900 group-hover:text-fuchsia-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Inventories</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-inventory" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">Add Item</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-medium text-fuchsia-900 rounded-lg transition duration-300 group hover:text-fuchsia-50 hover:bg-fuchsia-950">List Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200">
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-3">Docs</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-white z-20">
                <a href="#" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
                    </svg>
                </a>
                <a href="#" data-tooltip-target="tooltip-settings" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div id="tooltip-settings" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                    Settings page
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </aside>

        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="border-2 border-dashed border-gray-300 rounded-lg h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-32 md:h-64"></div>
            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 h-96 mb-4"></div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 h-96 mb-4"></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 h-48 md:h-72"></div>
            </div>
        </main>
    </div>

    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>