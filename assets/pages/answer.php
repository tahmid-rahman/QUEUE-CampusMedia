<?php
global $ansrs;
global $help_posts;
?>




<section class="ml-[300px] bg-white w-[800px] rounded-lg">

    <div class="w-[800px] bg-[#fcf6ff] rounded-lg shadow-lg my-4   overflowhidden flex-col justify-start items-center">
        <!-- help post -->
        <div class="px-8 py-5">
            <div class="h-fit mt-4 mb-2  px-2 flex items-center">
                <div>
                    <div class="flex items-start">
                        <p class="text-gray-700 font-semibold">Topic: </p>
                        <a class="pl-2 text-gray-700 font-light hover:text-blue-800  hover:underline cursor-pointer">
                            <?=$ansrs['0']['topic']?>
                        </a>
                    </div>
                    <p class="pl-1 text-gray-500 text-xs my-1">
                        <?=$ansrs['0']['time']?>
                    </p>
                </div>
            </div>
            <hr class="bg-[#000000] mb-2 h-[1.5px]">
            <div class="p-2">
                <p class="text-gray-700"><?=$ansrs['0']['helpTxt']?> </p>
            </div>
            <div class=" p-2">
                <img src="/QUEUE/assets/image/posts/<?=$ansrs['0']['helpPic']?>" alt="">
            </div>
            <button data-modal-target="default-modal2" data-modal-toggle="default-modal2"
                    class=" bg-[#7c6092] w-full px-1 py-[2px] mx-2 my-3 rounded-md hover:bg-[#7c6092c9] cursor-pointer">
                    <p class="text-white p-1 text-sm">Submit a Answer</p>

                </button>

        </div>
    </div>
    <!-- <p class="text-2xl px-7 pt-5">Answers</p>
        <hr class="bg-[#310e3e] my-2 h-[1.5px]"> -->
    <!-- answers -->
    <?php
        if($ansrs['0']['ansID']){
        foreach($ansrs as $post){
    ?>
    <div class="w-[800px] p-5 px-10  shadow-md my-4   overflowhidden flex-col justify-start items-center">

        <div class="h-20 flex items-center">
            <div>
                <p class="pl-2 text-gray-700 font-semibold">
                    Answer <?=$post['row_number']?></p>
                <p class="pl-2 text-gray-500 text-xs"><?=$post['ans_time']?></p>
            </div>
        </div>
        <hr class="bg-[#000000] mb-2 h-[1.5px]">
        <div class="p-2">
            <p class="text-gray-700"><?=$post['ansTxt']?>
        </div>
        <div class=" p-2">
            <img src="/QUEUE/assets/image/posts/<?=$post['ansPic']?>" alt="">
        </div>
    </div>
    <?php
        }
        }else{
            ?>
            <div
            class="w-[800px] p-5 px-10  shadow-md my-4 overflowhidden flex justify-center items-center">
            <h2>Nothing to show. No answer is submitted yet.</h2>
            </div>
            <?php
        }

    ?>
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
                    
                    <form method="post" action="assets/php/action.php?addAnswer=<?=$_GET['viewAnswer']?>" enctype="multipart/form-data">
                        <div class="p-2">
                            <div class="flex items-start">
                                <p class="text-gray-700 font-semibold">Topic: </p>
                                <p class="pl-2 text-gray-700 font-light">
                                <?=$ansrs['0']['topic']?>
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
    

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>