<?php
    global $adminDetail;
?>



<div
        class="w-[1000px] bg-slate-300 rounded-lg shadow-lg my-4 mx-4 px-8 py-16 overflowhidden flex justify-start items-center">
        <div class="cursor-pointer w-32 h-32 rounded-full overflow-hidden flex justify-center items-center">
            <img src="/QUEUE/assets/image/posts/<?=$adminDetail['pic']?>" alt="" class="object-cover w-full h-full">
        </div>
        <div class="mr-auto">
            <p class="pl-4 text-gray-800 font-bold text-2xl ">
            <?=$adminDetail['name']?>
            </p>
            <p class="pl-4 text-gray-700 hover:text-green-800 hover:underline cursor-pointer">
            <?=$adminDetail['username']?>
            </p>

        </div>
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="bg-slate-700 px-4 py-2 rounded-md text-white font-bold text-sm hover:bg-[#22716e] cursor-pointer">
            Change photo
        </button>

    </div>
    <div class="w-[1000px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateAdminName" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Full name </p>
                <input type="" placeholder="<?=$adminDetail['name']?>" value="" name="name" required=""
                    class="w-[700px] bg-slate-50 rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-slate-700 px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#22716e] cursor-pointer"
                type="submit">Change</button>
        </form>

    </div>
    <div class="w-[1000px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateAdminUserame" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Username </p>
                <input type="" placeholder="<?=$adminDetail['username']?>" value="" name="username" required=""
                    class="w-[700px] bg-slate-50 rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-slate-700 px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#22716e] cursor-pointer"
                type="submit">Change</button>
        </form>

    </div>
    
    <div class="w-[1000px] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden">
        <form action="assets/php/action.php?updateAdminPass" method="POST" class="flex items-center"
            enctype="multipart/form-data">
            <div class="mr-auto">
                <p class="font-bold text-[#22716e] my-2 ">Password </p>
                <input type="password" placeholder="password" value="" name="pswd" required=""
                    class="w-[700px] bg-slate-50 rounded-md my-2 h-9 py-1 px-2 focus:outline-none shadow-inner text-gray-800 overflow-hidden">
            </div>
            <button
                class="bg-slate-700 px-4 py-2 h-10 rounded-md text-white font-bold text-sm hover:bg-[#22716e] cursor-pointer"
                type="submit">Change</button>
        </form>
    </div>
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold pl-5 text-slate-700">
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
                    <form method="post" action="assets/php/action.php?updateAdminProfilePic" enctype="multipart/form-data">
                        <div class="p-2">
                            
                            <label class=" my-7 block text-sm font-medium text-gray-500" for="file_input">Attach a file</label>
                            <input
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                                name="post_img" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 " id="select_post_img">PNG, JPG or JPEG.</p>
            
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-slate-700 hover:bg-[#22716e] font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
