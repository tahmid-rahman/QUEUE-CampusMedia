<section class="flex">
    <!-- chat head -->
    <section class="w-[300px] border-r-[1px] border-indigo-200">
        <div class="border-b-[1px] w-[299px] border-indigo-200">
            <p class=" mt-5 mx-3 text-violet-500 font-bold text-2xl">
                Conversations
            </p>
            <input type="text"
                class="w-[285px] h-10 py-1 px-2 rounded-xl shadow-inner bg-gray-50 focus:outline-none m-2"
                placeholder="Search" autocomplete="off" id="adminchat_search">

        </div>

        <div class="p-2 w-[299px] h-[610px] overflow-y-auto overflow-x-hidden" id="adminChatlist">

            <!-- <div data-bs-target="#" onclick=""
                class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#09ada8]/20 pl-2 py-2 flex justify-start items-start ">
                <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img
                        src="/QUEUE/assets/image/posts/background.png" alt="" class="object-cover w-full h-full">
                </div>
                <div class="max-w-[200px]">
                    <p class="pl-2 text-gray-800 font-medium">'.$ch_user['name'].'</p>
                    <p class="pl-2 text-gray-400 text-sm overflow-hidden max-w-[200px]">'.$chat['messages'][0]['msg'].'
                    </p>
                    <p class="pl-2 text-gray-600 text-xs">
                        '.timeAgoOwn($chat['messages'][0]['created_at']).'
                    </p>

                </div>
            </div> -->

        </div>

    </section>
    <div class="w-[38rem] border-r-[1px] border-indigo-200">
        <div id="delete" hidden
            class="bg-white h-10 w-44 absolute top-[90px] right-[310px] items-center rounded-md shadow-lg overflow-hidden">
            <button id="leaveRoom" class="text-red-700 font-medium px-4 py-2 hover:text-red-400">Leave this
                room!</button>
        </div>

        <!-- chat body -->
        <div class="" id="">
            <div class="w-[607px]">
                <div class="cursor-pointer h-[80px] bg-violet-300 pl-7 flex items-center ">
                    <div class="w-11 h-11 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png"
                            id="us_pic2" alt="" class="object-cover w-full h-full"></div>
                    <div class="pl-3 text-gray-700 font-medium">
                        <!-- <p class="text-gray-700 font-semibold text-xl" id="chatter_name"></p> -->

                        <p class="text-gray-700 hover:underline cursor-pointer" id="us_name1">
                            Name: </p>

                    </div>
                    <div onclick="" class="ml-auto mr-7">
                        <img src="/QUEUE/assets/image/menu.png" alt="" class=" w-5 h-5">
                    </div>

                </div>
            </div>
            <div class="absolute w-[38rem] max-h-[565px] px-4 flex flex-col-reverse grow overflow-y-auto bottom-0 mb-20"
                id="admin_chat">
                <div class="mx-auto">
                    <p class="">Select a Conversation room to see Chat!</p>
                </div>
                
            </div>

            <div class="mt-[80px] w-full fixed ml-3 mb-3 bottom-0 ">
                <div class="mx-auto">
                    <div class="flex h-11" id="msgsender">
                        <input type="text" class="w-[31rem] h-full px-4 py-2 rounded-xl shadow-md focus:outline-none"
                            placeholder="Send message" id="adminmsginput">
                        <button id="sendadminmsg" data-user-id="0"
                            class="bg-violet-500 ml-3 px-[18px] rounded-2xl h-full shadow-md hover:bg-rose-400 text-white text-md font-semibold">Send</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="w-[252px] h-[91.7vh]" id="">
        <div class=" w-[252px] border-b-[1px] border-indigo-200">
            <div
                class=" w-28 h-28 rounded-full overflow-hidden mx-auto mt-10 cursor-pointer"><img
                    src="/QUEUE/assets/image/user.png" id="us_pic1" alt="" class="object-cover w-full h-full">
            </div>
            <p class="text-center my-2 text-gray-700 font-semibold" id="us_name2">
                Abdur Rahman Tahmid </p>
        </div>
        <p class="ml-5  text-sm my-2 text-gray-700 mt-2" id="us_username">
            username : 
        </p>
        <p class="ml-5  text-sm my-2 text-gray-700 mt-2" id="us_userid">
            User id : 
        </p>
        <p class="ml-5  text-sm my-2 text-gray-700 mt-2" id="us_email">
            Email : 
        </p>
        
    </div>




</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</section>