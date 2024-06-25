<?php
    global $userProfile;
    global $allnote;

?>








<section class="flex">
    <!-- notes container -->
    <div class="grid grid-cols-2 w-[840px] max-h-[75.3vh] overflow-y-auto">

        <?php
            if (!empty($allnote)) {
            foreach($allnote as $not){
            ?>
        <div class="w-[380px] m-5 p-5 flex flex-col items-center">
            <div class="bg-red-500 rounded-lg w-[380px] h-[210px] overflow-hidden">
                <img src="/QUEUE/assets/image/posts/<?=$not['noteThumbnail']?>" alt=""
                    class="object-cover h-full w-full">
            </div>
            <a href="?notefile=<?=$not['noteID']?>" class="">
                <p class="p-5 text-xl font-bold hover:text-emerald-700 hover:text-[20.5px] cursor-pointer">
                    <?=$not['note_name']?>
                </p>
            </a>
        </div>

        <?php } 
            }else{
            ?>
        <div class="ml-60 mt-5 w-[400px]">
            <p class="">You have not note. Please 'Add new notes'</p>
        </div>
        <?php } 
            ?>

    </div>
    <!-- side container -->
    <div class="w-[310px] h-[500px] bg-emerald-100 mt-9 rounded-md shadow-lg">

        <div class="">
            <p class="text-[22px] font-bold pt-4 pl-5 text-emerald-800">List of the ntoes</p>
        </div>
        <input type="text" class="w-[290px] mx-2.5 my-3 h-10 py-1 px-2 rounded-xl shadow-md focus:outline-none"
            placeholder="Search" autocomplete="off" id="note_search">
        <div class="p-2 w-[310px] h-[360px] overflow-y-auto" id="noteShow">

        <!-- <a href=""
                class="cursor-pointer w-full bg-transparent mt-1 hover:rounded-md hover:bg-emerald-200 p-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden ml-2"><img
                        src="/QUEUE/assets/image/posts/" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-2 text-gray-700 max-w-[240px]">

                </p>
            </a> -->

        </div>


    </div>



</section>

<div id="createNote" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold pl-5 text-emerald-700">
                    Create new notes.
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="createNote">
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
                <form method="post" action="assets/php/action.php?createNewNote" enctype="multipart/form-data">
                    <div class="p-2">
                        <label class="py-2 block text-sm font-medium text-gray-500" for="">Give a name for the
                            note.</label>
                        <input
                            class="block w-full text-md px-2 py-2 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                            name="post_name" type="text" required="" placeholder="Enter note name.">
                        <label class="py-2 block text-sm font-medium text-gray-500" for="file_input">Attach a file for
                            the thumbnail..</label>
                        <input
                            class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                            name="post_img" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 ">PNG, JPG or JPEG.</p>

                    </div>
                    <button type="submit"
                        class="w-full text-white bg-emerald-700 hover:bg-emerald-600 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                        Upload
                    </button>


                </form>
            </div>

        </div>
    </div>
</div>


</section>