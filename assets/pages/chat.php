
<section class="flex ml-[17.5rem]  bg-[#f5ffff] text-gray-700 h-[91.5vh]">

    <!-- chat head -->
    <section class="w-[300px] border-r-[1px] border-[#09ada759]">
        <div class="border-b-[1px] w-[299px] border-[#09ada759] fixed ">
            <p class=" mt-2 mx-3 text-[#09ada8] font-bold text-2xl">
                Chats
            </p>
            
            <input type="text" class="w-[285px] h-10 py-1 px-2 rounded-xl shadow-md focus:outline-none m-2"
                placeholder="Search" autocomplete="off" id="chat_search">
                

        </div>
       
        <div class="p-2 mt-[100px] w-[299px] h-[610px] fixed overflow-y-auto overflow-x-hidden" id="chatlist">

            <!-- <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-green-200 pl-7 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/static/image/background.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700 font-medium">Username</p>

            </div> -->

        </div>
        <div id="chatSearchResult"
            class="sticky max-h-80 w-[285px] bg-white top-[155px] shadow-md rounded-lg mx-2 overflow-auto flex-col">
            
            
        </div>

    </section>
    
    <div id="delete" hidden
        class="bg-white h-10 w-48 absolute top-[90px] right-20 items-center rounded-md shadow-lg overflow-hidden">
       <button onclick="deleteConversation()" class="text-red-700 font-medium px-4 py-2 hover:text-red-400">Delete Conversation</button>
    </div>

    <!-- chat body -->
    <div class="" id="chatbox">
        <div class="w-[53rem]">
            <div class="cursor-pointer h-[80px] bg-[#09ada8]/40 pl-7 flex items-center ">
                <div class="w-11 h-11 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png"
                        id="chatter_pic" alt="" class="object-cover w-full h-full"></div>
                <div class="pl-3 text-gray-700 font-medium">
                    <p class="text-gray-700 font-semibold text-xl" id="chatter_name"></p>
                    <a href="" id="cplink">
                        <p class="text-gray-700 font-normal text-sm hover:text-green-700 hover:underline cursor-pointer"
                            id="chatter_username">
                            Username </p>
                    </a>
                </div>
                <div onclick="chatDropfunc()" class="ml-auto mr-7">
                    <img src="/QUEUE/assets/image/menu.png" alt="" class=" w-5 h-5">
                </div>

            </div>
        </div>
        <!-- <div class=" w-full my-2 mt-20 overflow-y-auto"> -->
        <!-- <div class="absolute bottom-0 left-0">
                <p>hello form the other side</p>
            </div> -->
        <div class="absolute w-[53rem] max-h-[565px] px-10 flex flex-col-reverse grow overflow-y-auto bottom-0 mb-20"
            id="user_chat">

            <!-- <div class=" bg-blue-100 text-gray-800 w-fit rounded-full my-2 max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">hii every one how are you all hope every one doing well </p>
                </div>
                <div
                    class=" bg-blue-500 text-white w-fit rounded-full my-2 ml-auto max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">i am fine but i don't know of others</p>
                </div>
                <div class=" bg-blue-100 text-gray-800  w-fit rounded-full my-2 max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">ok see you </p>
            
                </div>
                <div
                    class=" bg-blue-500 text-white w-fit rounded-full my-2 ml-auto max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">bye</p>
                </div> -->

        </div>

        <!-- </div> -->
        <div class="mt-[80px] w-full fixed ml-7 mb-3 bottom-0 ">
            <div class="mx-auto">
                <div class="flex h-11" id="msgsender">
                    <input type="text" class="w-[700px] px-4 py-2 rounded-xl shadow-md focus:outline-none"
                        placeholder="Send message" id="msginput">
                    <button id="sendmsg" data-user-id="0"
                        class="bg-[#09ada8] ml-3 px-[18px] rounded-2xl h-full shadow-md  text-white text-md font-semibold">send</button>
                </div>

            </div>

        </div>

    </div>

</section>



<script>
    function chatDropfunc() {
        var x = document.getElementById("delete");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";

        }
    }

</script>