<?php
global $userProfile;

?>

<body class=" bg-gray-200">
    
    <!-- upper navber -->
    <section class="pb-[65px] flex-col">
        <nav
            class="bg-gradient-to-tr from-teal-50 via-sky-50 to-purple-50 py-4 px-10 shadow-md flex items-center backdrop-blur-sm bg-transparent w-full fixed">
            <div class="text-white text-2xl mr-auto w-28 cursor-pointer"><a href="?home"><img
                        src="/QUEUE/assets/image/logo.png" alt="QUEUE"
                        class="text-[#d72f5b] items-center font-bold"></a>
            </div>
            <div onclick="msgFunc()" class="cursor-pointer mx-3 w-7"><img src="/QUEUE/assets/image/chat.png" alt="message"
                    class="text-[8px]">
                    <div id="msgdown"
                        class="bg-teal-50 h-[550px] w-[400px] absolute top-[60px] right-10 rounded-md shadow-lg pt-5 hidden overflow-scroll">
                        <p class="pl-5 text-xl font-bold">Message</p>
                        <hr class="mx-2 my-2">
                        <div id="chatlist1" class="px-3 py-2">
                    
                        </div>
                    </div>
            </div>
            <div>
                <div onclick="noteFunc()" class="cursor-pointer mx-3 w-7"><img
                        src="/QUEUE/assets/image/notification.png" alt="chat" class="text-[8px]">
                    <div id="notedown"
                        class="bg-rose-50 h-[550px] w-[400px] absolute top-[60px] right-10 rounded-md shadow-lg pt-7 hidden overflow-scroll">
                        <p class="pl-7 text-2xl font-bold">Notification</p>
                        <hr class="mx-2 my-2">
                        <div id="notifications1" class=" max-h-[450px] overflow-auto ">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div onclick="dropFunc()"
                    class="cursor-pointer mx-3 w-8 h-8 rounded-full overflow-hidden flex justify-center items-center">
                    <img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>" alt="" class="object-cover w-full h-full">

                </div>
                <div id="dropdown" hidden
                    class="bg-white h-72 w-72 absolute top-[60px] right-10 rounded-md shadow-lg px-1 pt-5 overflow-hidden">
                    <a href="?profile=<?=$userProfile['userID']?>"
                        class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#d5eceb] pl-7 flex items-center ">
                        <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>"
                                alt="" class="object-cover w-full h-full"></div>
                        <p class="pl-4 text-gray-700 font-medium"><?=$userProfile['name']?></p>
                    </a>
                    <button
                        class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#d5eceb] pl-7 flex items-center"><img
                            src="/QUEUE/assets/image/moon.png" alt="" class="w-7">
                        <p class="pl-4 text-gray-700 font-medium">Switch Appearance</p>
                    </button>
                    <a href="?setting"
                        class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#d5eceb] pl-7 flex items-center"><img
                            src="/QUEUE/assets/image/settings.png" alt="" class="w-7">
                        <p class="pl-4 text-gray-700 font-medium">Settings</p>
                    </a>
                    <a href="assets/php/action.php?logout" 
                        class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#d5eceb] pl-7 flex items-center"><img
                            src="/QUEUE/assets/image/logout.png" alt="" class="w-7">
                        <p class="pl-4 text-gray-700 font-medium">Log Out</p>
                    </a>
                </div>
            </div>

        </nav>

    </section>

    <!-- side navbar -->
    <section class="flex">

        <nav
            class="w-[280px] h-full bg-gradient-to-tr from-teal-50 via-sky-50 to-purple-50 fixed shadow-md flex flex-col px-2 pt-28">
        <?php if(isset($_GET['home'])){ ?>
            <a href="?home"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?home"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] hover:rounded-md pl-10 flex items-center">
        <?php } ?>  
                <img src="/QUEUE/assets/image/home.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-[#d72f5b] font-bold">Home</p>
            </a>
        <?php if(isset($_GET['help'])){ ?>
            <a href="?help"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?help"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>
                <img src="/QUEUE/assets/image/help.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-[#7c6092] font-bold">Help</p>
            </a>
        <?php if(isset($_GET['chat'])){ ?>
            <a href="?chat"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?chat"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>      
                <img src="/QUEUE/assets/image/chat (1).png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-[#09ada8] font-bold">Chat</p>
            </a>
        <?php if(isset($_GET['room'])){ ?>
            <a href="?room"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?room"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>
                <img src="/QUEUE/assets/image/meeting.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-indigo-500 font-bold">Rooms</p>
            </a>
        <?php if(isset($_GET['profile'])){ ?>
            <a href="?profile=<?=$userProfile['userID']?>"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?profile=<?=$userProfile['userID']?>"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>
                <img src="/QUEUE/assets/image/profile.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-[#e8882f] font-bold">Profile</p>
            </a>
        <?php if(isset($_GET['mynote/note']) || isset($_GET['mynote/Question']) || isset($_GET['mynote/privateFile'])){ ?>
            <a href="?mynote/note=<?=$userProfile['userID']?>"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?mynote/note=<?=$userProfile['userID']?>"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>
                <img src="/QUEUE/assets/image/note.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-emerald-500 font-bold">My Note</p>
            </a>
        <?php if(isset($_GET['schedule'])){ ?>
            <a href="?schedule"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?schedule"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>            
                <img src="/QUEUE/assets/image/calendar.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-sky-700 font-bold">Schedule</p>
            </a>
        <?php if(isset($_GET['setting'])){ ?>
            <a href="?setting"
                class="cursor-pointer h-[50px] w-full bg-[#c1e3e2] rounded-md mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php }else{?>
            <a href="?setting"
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 active:bg-red-200 hover:bg-[#c1e3e2] pl-10 flex hover:rounded-md items-center">
        <?php } ?>            
                <img src="/QUEUE/assets/image/settings.png" alt="" class="w-7 hover:animate-bounce ">
                <p class="pl-4 text-[#6fb0be] font-bold">Setting</p>
            </a>
            <!-- <button
                class="cursor-pointer h-[50px] w-full bg-transparent mt-52 hover:bg-[#d5eceb] pl-10 flex items-center"><img
                    src="static/image/reorder-option.png" alt="" class="w-6 hover:animate-bounce ">
                <p class="pl-4 text-[#71BE6F] font-bold">Menu</p>
            </button> -->
        </nav>
        <!-- post section -->
    </section>
    <script>
        var x = document.getElementById("notedown");
        var y = document.getElementById("dropdown");
        var z = document.getElementById("msgdown");
        function noteFunc() {
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
        function dropFunc() {
            if (y.style.display === "none") {
                x.style.display = "none";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                y.style.display = "none";
            }
        }
        function msgFunc() {
            if (z.style.display === "none") {
                x.style.display = "none";
                y.style.display = "none";
                z.style.display = "block";
            } else {
                z.style.display = "none";
            }
        }
    </script>