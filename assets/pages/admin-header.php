<?php
    global $adminDetail;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/QUEUE/assets/image/Q.png" type="image/icon type">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Control center</title>
</head>
<body>
    <!-- uppar nab -->
    <section class="fixed w-full">
    <nav class="bg-violet-200 border-gray-200 shadow-md">
        <div class="flex flex-wrap items-center justify-between mx-auto py-4 px-20">
        <a href="?admin-dashboard" class="flex items-center rtl:space-x-reverse">
            <img src="/QUEUE/assets/image/7.png" class="h-8" alt="Logo" />
            <p class="self-center text-2xl font-bold text-[#515070] font-sans">UEUE</p>
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="/QUEUE/assets/image/posts/<?=$adminDetail['pic']?>" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-slate-200 divide-y divide-gray-100 rounded-lg shadow p-2" id="user-dropdown">
                <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 "><?=$adminDetail['username']?></span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <a href="?admin-dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:rounded-md hover:bg-white">Dashboard</a>
                </li>
                <li>
                    <a href="?admin-profile" class="block px-4 py-2 text-sm text-gray-700 hover:rounded-md hover:bg-white">Profile</a>
                </li>
                <li>
                    <a href="assets/php/action.php?logout" class="block px-4 py-2 text-sm text-gray-700 hover:rounded-md hover:bg-white">Sign out</a>
                </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        </div>
    </nav>

    </section>
    <!-- sidenav -->
    <section class="pr-[300px]">
        
        <aside class="fixed top-[64px] left-0 z-40 w-64 h-full" aria-label="Sidebar">
            <div class="h-full px-3 py-24 overflow-y-auto bg-purple-100 ">
            <ul class="space-y-2 font-medium">
                <li>
                <?php if(isset($_GET['admin-dashboard'])){ ?>
                    <a href="?admin-dashboard" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100 ">
                <?php }else{?>
                    <a href="?admin-dashboard" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 ">
                <?php } ?>  
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-post'])){ ?>
                    <a href="?admin-post" class="flex items-center p-2 text-gray-600 rounded-lg  bg-gray-100">
                <?php }else{?>  
                    <a href="?admin-post" class="flex items-center p-2 text-gray-600 rounded-lg  hover:bg-gray-100">
                <?php } ?>             
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Post control</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-help'])){ ?>
                    <a href="?admin-help" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                <?php }else{?>
                    <a href="?admin-help" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                <?php } ?>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">HelpPost control</span>
                        
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-answer'])){ ?>
                    <a href="?admin-answer" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                    <?php }else{?>
                    <a href="?admin-answer" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                    <?php } ?>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Answers control</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-user'])){ ?>
                    <a href="?admin-user" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                    <?php }else{?>
                    <a href="?admin-user" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                    <?php } ?>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users control</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-room'])){ ?>
                    <a href="?admin-room" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                    <?php }else{?>
                    <a href="?admin-room" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                    <?php } ?>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Room control</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-chat'])){ ?>
                    <a href="?admin-chat" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                    <?php }else{?>
                    <a href="?admin-chat" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                    <?php } ?>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                      <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    </a>
                </li>
                <li>
                <?php if(isset($_GET['admin-profile'])){ ?>
                    <a href="?admin-profile" class="flex items-center p-2 text-gray-600 rounded-lg bg-gray-100">
                    <?php }else{?>
                    <a href="?admin-profile" class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                    <?php } ?>
                    <div class="h-5 w-5">
                            <img src="/QUEUE/assets/image/user (4).png" alt="" class="object-cover">
                        </div>
                        <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                    </a>
                </li>

            </ul>
            </div>
        </aside>
        
    
        
    </section>
    <section class="pt-[64px] pl-[256px] bg-purple-50 h-[100vh] overflow-auto">
