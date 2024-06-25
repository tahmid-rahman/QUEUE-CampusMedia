<?php
    global $auth;
    global $allnotes;
    $thumbnailUrl = $allnotes['0']['noteThumbnail'];
?>



<section class="flex pl-[17.5rem]">

    <div class="h-[91.8vh] overflow-auto w-[1160px] bg-cyan-50">
        <div class=" bg-cover h-[300px] w-full p-10"
            style="background-image: url('/QUEUE/assets/image/posts/<?=$allnotes['0']['noteThumbnail']?>');background-repeat: no-repeat; background-position: center;">
            <div class=" flex items-center mt-32">
                <div class="w-[50px] h-[50px] m-2 border border-cyan-100 rounded">
                    <img src="/QUEUE/assets/image/posts/<?=$allnotes[0]['noteThumbnail']?>" alt=""
                        class="w-full h-full object-cover rounded">
                </div>
                <p class="text-2xl font-bold text-cyan-100 drop-shadow backdrop-blur-sm px-2 ">
                    <?=$allnotes[0]['note_name']?>
                </p>

            </div>
            <div class="flex items-center ml-4">
                <!-- <P class="text-2xl text-cyan-100 mr-1">Author: </P> -->
                <div
                    class="cursor-pointer w-8 h-8 border border-cyan-100 rounded-full overflow-hidden flex justify-center items-center">
                    <img src="/QUEUE/assets/image/posts/<?=$auth['ppic']?>" alt="" class="object-cover w-full h-full">
                </div>
                <a href="?profile=<?=$auth['userID']?>" class="text-lg font-base text-cyan-100 drop-shadow-lg ml-1 backdrop-blur-sm px-1 hover:text-cyan-300">
                    <?=$auth['name']?>
                </a>
                <?php if($auth['userID'] == $_SESSION['userdata']['userID']){ ?>
                <button data-modal-target="uploadnotefile" data-modal-toggle="uploadnotefile"
                    class="ml-auto bg-cyan-600 px-3 py-1 rounded-md text-cyan-50 hover:bg-cyan-700 hover:text-[16.6px]">
                    Add new page</button>
                <?php }?>
            </div>
            
        </div>
        <div class=" w-[800px]  mx-auto" id="notefileHolder">
        <?php
        if (!empty($allnotes)) {
        foreach($allnotes as $not){
        ?>
            <div class="w-[800px] my-1">
                <img src="/QUEUE/assets/image/posts/<?=$not['note_file']?>" alt="" class="w-full">
            </div>
            <?php } 
        }else{
        ?>
            <div class="mx-auto mt-20 w-[400px]">
                <p class="">Nothing is showing.</p>
            </div>
            <?php } 
        ?>

        </div>
    </div>
    <div id="uploadnotefile" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-md">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold pl-5 text-cyan-600">
                        Add new page.
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="uploadnotefile">
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
                    <form method="post" action="assets/php/action.php?newNotePage" enctype="multipart/form-data">
                        <div class="p-2">
                            <input
                                class="block w-full text-md px-2 py-2 text-gray-600 border border-gray-300 rounded-md bg-white focus:outline-none hidden"
                                name="post_id" type="text" required="" placeholder="Enter file name"
                                value="<?= $_GET['notefile'] ?>">
                            <label class="py-2 block text-sm font-medium text-gray-500" for="">Choose a jpg or png or
                                jpeg file.</label>
                            <input
                                class="block w-full text-md px-2 py-2 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                                name="post_file" type="file" required="" placeholder="Choose file.">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-cyan-600 hover:bg-cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mt-5 mb-2 cursor-pointer ">
                            Upload
                        </button>


                    </form>
                </div>

            </div>
        </div>
    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>