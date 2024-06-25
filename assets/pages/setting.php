<?php
    global $userProfile;
?>


<section class="pl-[17.5rem]">
    <div
        class="w-[800px] bg-[#09ada72e] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden flex justify-start items-center">
        <div class="cursor-pointer w-14 h-14 rounded-full overflow-hidden flex justify-center items-center">
            <img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>" alt="" class="object-cover w-full h-full">
        </div>
        <div class="mr-auto">
            <p class="pl-4 text-gray-800 font-bold  ">
                <?=$userProfile['name']?>
            </p>
            <p class="pl-4 text-gray-700 text-sm hover:text-green-800 hover:underline cursor-pointer">
                <?=$userProfile['username']?>
            </p>

        </div>
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="bg-[#09ada7d8] px-4 py-2 rounded-md text-white font-bold text-sm hover:bg-[#09ada777] cursor-pointer">
            Change photo
        </button>

    </div>
    <div class="w-[800px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateName" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Full name </p>
                <input type="" placeholder="<?=$userProfile['name']?>" value="" name="name" required=""
                    class="w-[500px] rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-[#09ada7d8] px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#09ada777] cursor-pointer"
                type="submit">Change</button>
        </form>

    </div>
    <div class="w-[800px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateUsername" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Username </p>
                <input type="" placeholder="<?=$userProfile['username']?>" value="" name="username" required=""
                    class="w-[500px] rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-[#09ada7d8] px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#09ada777] cursor-pointer"
                type="submit">Change</button>
        </form>

    </div>
    <div class="w-[800px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateGender" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Gender </p>
                <input type="" placeholder="<?=$userProfile['gender']?>" value="" name="gender" required=""
                    class="w-[500px] rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-[#09ada7d8] px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#09ada777] cursor-pointer"
                type="submit">Change</button>
        </form>

    </div>
    <div class="w-[800px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updatePassword" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Password </p>
                <input type="password" placeholder="password" value="" name="pswd" required=""
                    class="w-[500px] rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-[#09ada7d8] px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#09ada777] cursor-pointer"
                type="submit">Change</button>
        </form>
    </div>




    <!-- Modal toggle
    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button>
     -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold pl-5 text-[#22716e]">
                        Choose new profile picture.
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4">
                    <form method="post" action="assets/php/action.php?updateProfilePic" enctype="multipart/form-data">
                        <div class="p-2">

                            <label class=" my-5 block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                                file</label>
                            <input
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                                name="post_img" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 " id="select_post_img">PNG, JPG or JPEG.</p>

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-[#22716e] hover:bg-[#09ada7d8] font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>
    <button onclick="createFunc()" class="absolute right-0 bottom-0 p-2 rounded-full mb-8 mr-8 bg-sky-700 text-white hover:animate-pulse">
        <img src="/QUEUE/assets/image/chat (2).png" alt="add event" class="h-7 w-7">
    </button>
    <div id="createEvent"
        class="hidden absolute right-0 bottom-0 h-[600px] w-[450px] bg-teal-50 rounded-md mb-[70px] mr-[60px] shadow-lg">


        <!-- chat body -->
        <div class="" id="">
            <div class="w-[450px]">
                <div class="cursor-pointer h-[60px] bg-[#09ada7d8] pl-7 flex items-center ">
                    <!-- <div class="w-11 h-11 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png"
                            id="us_pic2" alt="" class="object-cover w-full h-full"></div> -->
                    <div class="pl-3 text-gray-700 font-medium">
                        <!-- <p class="text-gray-700 font-semibold text-xl" id="chatter_name"></p> -->

                        <p class="text-white font-semibold hover:underline cursor-pointer text-xl" id="">
                            To: Control center </p>

                    </div>
                    <button onclick="createFunc()" class="ml-auto mr-7">
                        <img src="/QUEUE/assets/image/close.png" alt="" class=" w-7 h-7">
                    </button>

                </div>
            </div>
            <div class="absolute w-[450px] max-h-[480px] px-4 flex flex-col-reverse grow overflow-y-auto bottom-0 mb-[60px]"
                id="drop_chat">

            </div>

            <div class="w-full fixed mb-[80px] ml-3 bottom-0 ">
                <div class="mx-auto">
                    <div class="flex h-11" id="msgsender">
                        <input type="text" class="w-[350px] h-full px-4 py-2 rounded-xl shadow-md focus:outline-none"
                            placeholder="Send message" id="dropmsginput">
                        <button id="sendDropmsg" data-user-id="0"
                            class="bg-[#09ada7d8] ml-3 px-3 rounded-2xl h-full shadow-md hover:bg-rose-400 text-white text-md font-semibold">Send</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script>
        function createFunc() {
            var a = document.getElementById("createEvent");
            if (a.style.display === "none") {
                a.style.display = "block";
            } else {
                a.style.display = "none";

            }
        }
    </script>

</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>