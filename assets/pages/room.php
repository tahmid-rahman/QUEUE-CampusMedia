<section class="flex ml-[17.5rem]  bg-indigo-50 text-gray-700 h-[91.7vh]">

    <!-- chat head -->
    <section class="w-[300px] border-r-[1px] border-indigo-200">
        <div class="border-b-[1px] w-[299px] border-indigo-200 fixed ">
            <p class=" mt-2 mx-3 text-indigo-400 font-bold text-2xl">
                Rooms
            </p>

            <input type="text" class="w-[285px] h-10 py-1 px-2 rounded-xl shadow-md focus:outline-none m-2"
                placeholder="Search" autocomplete="off" id="room_search">
            <button data-modal-target="createRoom-modal" data-modal-toggle="createRoom-modal"
                class="bg-indigo-400 text-white py-1 w-[285px] mx-2 mb-2 rounded-lg shadow-md hover:bg-rose-400 cursor-pointer">
                Create new room
            </button>

        </div>

        <div class="p-2 mt-[130px] w-[299px] h-[610px] fixed overflow-y-auto overflow-x-hidden" id="roomchatlist">

            <!-- <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-200 pl-3 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700">Room name</p>

            </div> -->


        </div>
        <div id="roomSearchResult"
            class="hidden sticky max-h-80 w-[285px] bg-white top-[155px] shadow-md rounded-lg mx-2 overflow-auto flex-col">


        </div>

    </section>
    <div class="w-[38rem] border-r-[1px] border-indigo-200">
        <div id="delete" hidden
            class="bg-white h-10 w-44 absolute top-[90px] right-[310px] items-center rounded-md shadow-lg overflow-hidden">
            <button id="leaveRoom" class="text-red-700 font-medium px-4 py-2 hover:text-red-400">Leave this room!</button>
        </div>

        <!-- chat body -->
        <div class="" id="roomchatbox">
            <div class="w-[607px]">
                <div class="cursor-pointer h-[80px] bg-indigo-200 pl-7 flex items-center ">
                    <div class="w-11 h-11 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png"
                            id="room_pic1" alt="" class="object-cover w-full h-full"></div>
                    <div class="pl-3 text-gray-700 font-medium">
                        <!-- <p class="text-gray-700 font-semibold text-xl" id="chatter_name"></p> -->
                        
                            <p class="text-gray-700 hover:underline cursor-pointer"
                                id="room_name1">
                                Discussion Topic:  </p>

                    </div>
                    <div onclick="chatDropfunc()" class="ml-auto mr-7">
                        <img src="/QUEUE/assets/image/menu.png" alt="" class=" w-5 h-5">
                    </div>

                </div>
            </div>
            <div class="absolute w-[38rem] max-h-[565px] px-4 flex flex-col-reverse grow overflow-y-auto bottom-0 mb-20"
                id="room_chat">
                <div
                    class="mx-auto">
                    <p class="">Select a Conversation room to see Chat!</p>
                </div>
                <!-- <div
                    class=" bg-blue-100 text-gray-800 w-fit rounded-full my-2 max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">hii every one how are you all hope every one doing well hh hh hh hh h h h </p>
                </div>
                <div
                    class=" bg-blue-500 text-white w-fit rounded-full my-2 ml-auto max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">i am fine but i don't know of others</p>
                </div>
                <div
                    class=" bg-blue-100 text-gray-800  w-fit rounded-full my-2 max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">ok see you </p>

                </div>
                <div
                    class=" bg-blue-500 text-white w-fit rounded-full my-2 ml-auto max-w-[33rem] py-3 px-5 overflow-x-hidden">
                    <p class="">bye</p>
                </div> -->

            </div>

            <div class="mt-[80px] w-full fixed ml-3 mb-3 bottom-0 ">
                <div class="mx-auto">
                    <div class="flex h-11" id="msgsender">
                        <input type="text" class="w-[31rem] h-full px-4 py-2 rounded-xl shadow-md focus:outline-none"
                            placeholder="Send message" id="roommsginput">
                        <button id="sendrooommsg" data-user-id="0"
                            class="bg-indigo-400 ml-3 px-[18px] rounded-2xl h-full shadow-md hover:bg-rose-400 text-white text-md font-semibold">Send</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="w-[252px] h-[91.7vh]" id="roomchatbox">
        <div class=" w-[252px] border-b-[1px] border-indigo-200">
            <div data-modal-target="change-modal" data-modal-toggle="change-modal"
                class=" w-28 h-28 rounded-full overflow-hidden mx-auto mt-10 cursor-pointer"><img
                    src="/QUEUE/assets/image/user.png" id="room_pic2" alt="" class="object-cover w-full h-full">
            </div>
            <p class="text-center my-2 text-gray-700 font-semibold" id="room_name2">
                Discussion Topic </p>
        </div>
        <p class="ml-5 text-xl font-semibold text-indigo-500 mt-2">
            Admin
        </p>
        <div class="h-[50px] w-[245px] mx-1" id="admin_id">

        </div>
        <!-- <div 
            class="cursor-pointer h-[50px] w-[245px] bg-transparent mt-1 mx-1 hover:rounded-md hover:bg-indigo-100 pl-2 flex items-center ">
            <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                    class="object-cover w-full h-full"></div>
            <p class="pl-4 text-gray-700 font-medium" id="admin_id">Username</p>

        </div> -->
        <p class="ml-5 text-xl font-semibold text-indigo-500 mt-2">
            Member
        </p>
        <div class="p-1 w-full overflow-y-auto overflow-auto h-96" id="room_member">

            <!-- <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700 font-medium">Username</p>

            </div>
            <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700 font-medium">Username</p>

            </div>
            <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700 font-medium">Username</p>

            </div>
            <div
                class="cursor-pointer h-[50px] w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/user.png" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-4 text-gray-700 font-medium">Username</p>

            </div> -->





        </div>
    </div>

    <div id="change-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-indigo-800 pl-5">
                        Choose new picture for your room.
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="change-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4" id="msgsender">
                    <form method="post" action="assets/php/action.php?setRoomProfilePic" enctype="multipart/form-data">
                        <div class="p-2">

                            <label class=" my-5 block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                                file</label>
                            <input type="text" class="hidden" id="input_romid" required="" name="roomid">
                            <input id="roompic_input" required="" name="post_img"
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                                  type="file">
                            <p class="mt-1 text-sm text-gray-500 " >PNG, JPG or JPEG. </p>

                        </div>
                        <button type="submit" id="roomPicBtn"
                            class="w-full text-white bg-indigo-700 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="createRoom-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-indigo-800 pl-5">
                        Create a discussion rooom!
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="createRoom-modal">
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
                    <form method="post" action="assets/php/action.php?createRoomAction" enctype="multipart/form-data">
                        <div class="p-2">

                            <label class=" my-2 block text-sm font-medium text-gray-500" for="file_input">
                                Enter room name.</label>
                            <input
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                                name="post_txt" id="file_input" type="text" placeholder="Enter discussion topic" required="">


                        </div>
                        <button type="submit"
                            class="w-full text-white bg-indigo-700 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Create Now!
                        </button>

                    </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>