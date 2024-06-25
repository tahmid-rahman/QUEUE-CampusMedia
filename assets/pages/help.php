<?php
require_once 'assets/php/function.php';
global $help_posts;
global $helpPostById;
global $userProfile;
global $help_post_id;
?>


<section class="flex pl-[17.5rem]">



    <!-- post section -->
    <div class="mx-auto pl-2 max-h-[91.8vh] overflow-auto">

        <form action="" class="flex h-11 mt-5">
            <input type="text" class="w-[500px] px-4 py-2 rounded-xl shadow-md focus:outline-none bg-[#fcf6ff]"
                placeholder="Search by topic name!" autocomplete="off" id="help_search">
            <button
                class="bg-[#7c6092] ml-3 px-[18px] rounded-xl h-full shadow-md text-white hover:bg-[#ff5353] text-md font-semibold">Search</button>
        </form>
        <div id="helpSearchResult"
            class=" max-h-[500px] w-[600px] bg-white shadow-md rounded-lg mt-1 overflow-auto flex-col p-3 hidden">
        </div>
        <div
            class="w-[600px] bg-[#fcf6ff] h-20 rounded-lg shadow-lg my-4 px-5 pt-2 pb-3 overflowhidden flex justify-center items-center">
            <div class="cursor-pointer w-9 h-9 rounded-full overflow-hidden flex justify-center items-center">
                <img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>" alt=""
                    class="object-cover w-full h-full">
            </div>

            <button data-modal-target="default-modal1" data-modal-toggle="default-modal1" class="flex h-11 pl-3"><input
                    class="w-[500px] px-4 py-2 rounded-xl shadow-inner focus:outline-none cursor-pointer bg-gray-50"
                    placeholder="Ask for help!"></button>

        </div>


        <!-- post -->

        <?php
        foreach($help_posts as $post){
        ?>
        <div class="w-[600px] bg-[#fcf6ff] h-fit rounded-lg shadow-lg my-4 px-5 pt-2 pb-3 overflowhidden">

            <div class="h-fit mt-4 mb-2  px-2 flex items-center">
                <div>
                    <div class="flex items-start">
                        <p class="text-gray-700 font-semibold">Topic: </p>
                        <a href="?viewAnswer=<?=$post['helpID']?>"
                            class="pl-2 text-gray-700 font-light hover:text-blue-800  hover:underline cursor-pointer">
                            <?=$post['topic']?>
                        </a>
                    </div>
                    <p class="text-xs text-gray-600">
                    [<?=gettime($post['time'])?>
                    <time class="timeago" datetime="<?=$post['time']?>"></time>]
                    </p>
                </div>
            </div>

            <div class="p-2">
                <p class="text-gray-700 px-2">
                    <?=$post['helpTxt']?>
                </p>
            </div>
            <div class=" p-2">
                <img src="/QUEUE/assets/image/posts/<?=$post['helpPic']?>" alt="">
            </div>
            <hr class="bg-[#000000] mb-2 h-[1.5px]">
            <div class="h-15 p-2 flex items-center  text-gray-700">
                <a href="?viewAnswer=<?=$post['helpID']?>"
                    class=" bg-[#7c6092] px-1 py-[2px] rounded-md hover:bg-[#7c6092c9] cursor-pointer">
                    <p class="text-white p-1 text-sm">See answers</p>
                </a>
               
                <p class="ml-auto pr-2 text-sm">
                    <?=$post['answer_count']?> answers
                </p>
            </div>
        </div>
        <?php }
        ?>



        <!-- post outline -->
        <!-- <div class="w-[600px] bg-white h-fit rounded-lg shadow-lg my-4 py-3 px-5">
        <div class="h-20 bg-green-500 p-2">
            <div class="bg-white w-full h-full"> username</div>
        </div>
        <div class="h-48 bg-blue-500 p-2">
            <div class="bg-white w-full h-full"> caption</div>
        </div>
        <div class="h-96 bg-yellow-500 p-2">
            <div class="bg-white w-full h-full"> photos</div>
        </div>
        <div class="h-10 bg-red-500 p-2">
            <div class="bg-white w-full h-full"> reaction</div>
        </div>
    </div> -->
    </div>



    </div>
    <div>



        <!-- noitification section -->
        <div class="w-[400px] bg-[#fcf6ff] h-[600px] rounded-md my-4 mx-4 px-2 py-5 shadow-lg overflow-y-scroll">
            <p class="px-8 pt-2 text-xl font-medium">Your help posts.</p>
            <hr class="bg-[#000000] m-3 h-[1.5px]">
            <?php
        if($helpPostById['0']['helpID']){
        foreach($helpPostById as $post){
    ?>
            <div class="hover:bg-white hover:rounded-md mx-2 my-1 px-5 py-2 text-gray-700">
                <a href="?viewAnswer=<?=$post['helpID']?>" class="hover:underline hover:text-green-700 cursor-pointer">
                    <?=$post['topic']?>
                </a>
                <p class="text-xs text-blue-700">
                [<?=gettime($post['time'])?>
                <time class="timeago" datetime="<?=$post['time']?>"></time>]
                </p>
            </div>

            <?php
        }
        }else{
            ?>
            <div class="w-full my-4 overflowhidden flex justify-center items-center ">
                <h2>You don't have any solve request!</h2>
            </div>
            <?php
        }

    ?>
        </div>
    </div>
    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 pl-5">
                        Create post.
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="default-modal1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form method="post" action="assets/php/action.php?addHelpPost" enctype="multipart/form-data">
                        <div class="p-2">
                            <label class="my-2 block text-sm font-medium text-gray-500 pl-1">Topic name :</label>
                            <input type="text" name="post_topic" required="" placeholder="Enter topic name!"
                                class="px-2 py-1 w-full focus:outline-none border border-gray-300 rounded">
                            <label class=" block my-2 text-sm font-medium text-gray-500 pl-1">Discrive the problem
                                :</label>
                            <textarea name="post_text"
                                class="bg-transparent items-start w-full h-svh max-h-40 p-2 focus:outline-none break-words border border-gray-300 rounded-lg"
                                placeholder="Discrive the problem!"></textarea>
                            <label class=" block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                                file</label>
                            <input
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                                name="post_img" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 " id="select_post_img">PNG, JPG or JPEG.</p>

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-[#7c6092] hover:bg-[#7c6092]/80 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>
<!-- 
    <div id="default-modal2" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            
            <div class="relative bg-white rounded-lg shadow-md">
                
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 pl-5">
                        Submit your answer.
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="default-modal2">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <div class="p-4 md:p-5 space-y-4">
                    
                    <form method="post" action="assets/php/action.php?" enctype="multipart/form-data">
                        <div class="p-2">
                            <div class="flex items-start">
                                <p class="text-gray-700 font-semibold">Topic: </p>
                                <p class="pl-2 text-gray-700 font-light">

                                </p>
                            </div>
                            <label class=" block my-2 text-sm font-medium text-gray-500 pl-1">Discrive the problem
                                :</label>
                            <textarea name="post_text"
                                class="bg-transparent items-start w-full h-svh max-h-40 p-2 focus:outline-none break-words border border-gray-300 rounded-lg"
                                placeholder="Discrive the problem!"></textarea>
                            <label class=" block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                                file</label>
                            <input
                                class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                                name="post_img" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 " id="select_post_img">PNG, JPG or JPEG.</p>

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-[#7c6092] hover:bg-[#7c6092]/80 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="myModal"
        class="hidden bg-black/50 fixed inset-0 z-50 overflow-y-auto overflow-x-hidden flex justify-center items-center">
        
        <div class="relative bg-white rounded-lg shadow-lg w-full max-w-2xl">
           
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Submit your answer.
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center close">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">close</span>
                </button>
            </div>
            
            <div class="p-4 md:p-5 space-y-4">
                <p id="modalContent"></p>
                <form method="post" action="assets/php/action.php?" enctype="multipart/form-data">
                    <div class="p-2">
                        <div class="flex items-start">
                            <p class="text-gray-700 font-semibold">Topic:</p>
                            <p class="pl-2 text-gray-700 font-light"></p>
                        </div>
                        <label class="block my-2 text-sm font-medium text-gray-500 pl-1">Describe the problem:</label>
                        <textarea name="post_text"
                            class="bg-transparent w-full h-[200px] max-h-40 p-2 focus:outline-none break-words border border-gray-300 rounded-lg"
                            placeholder="Describe the problem!"></textarea>
                        <label class="block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                            file</label>
                        <input
                            class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                            name="post_img" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500" id="select_post_img">PNG, JPG, or JPEG.</p>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-[#7c6092] hover:bg-[#7c6092]/80 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex justify-center items-center cursor-pointer">
                        Upload
                    </button>
                </form>
            </div>
        </div>
    </div> 
-->

</section>
<!-- 
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById('myModal');
        var btn = document.getElementById("myButton");
        var closeBtn = document.querySelector(".close");

        btn.onclick = function () {
            var buttonId = this.getAttribute('data-id');
            var modalTarget = this.getAttribute('data-target');
            var modalContent = document.getElementById(modalTarget).querySelector("#modalContent");
            modalContent.textContent = buttonId;
            modal.classList.remove("hidden");
        }

        closeBtn.onclick = function () {
            modal.classList.add("hidden");
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        }
    });
</script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>