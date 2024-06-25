<?php
    global $userProfile;
    global $allnote;
    global $selecteduser;
    if(isset($_GET['mynote/note'])){
        $link = $_GET['mynote/note'];
    }else if(isset($_GET['mynote/Question'])){
        $link = $_GET['mynote/Question'];
    }else{
        $link = $_SESSION['userdata']['userID'];
    }
?>

<section class="ml-[17.5rem]  bg-emerald-50 text-gray-700 min-h-[91.7vh]">
        <!-- header -->
        <section class="w-[1159px]">
            <div class="h-[80px] bg-emerald-100 pl-16 flex items-center ">
                <div class="w-[55px] h-[55px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/<?=$selecteduser['ppic']?>"
                         alt="" class="object-cover w-full h-full"></div>
                <div class="pl-3 text-gray-700 font-medium">
                    <!-- <p class="text-gray-700 font-bold text-xl" id="chatter_name"></p> -->
                    <a href="" id="cplink">
                        <p class="text-emerald-900 font-semibold text-2xl hover:underline cursor-pointer"
                            id="chatter_username">
                            <?=$selecteduser['name']?>'s note </p>
                    </a>
                </div>
        <?php if(isset($_GET['mynote/note']) && $selecteduser['userID'] == $_SESSION['userdata']['userID']){ ?>
                <div class="ml-auto mr-5">
                    <button data-modal-target="createNote" data-modal-toggle="createNote"
                        class=" bg-emerald-500 px-4 py-2 rounded-xl text-lg text-white shadow-lg hover:bg-rose-400 hover:px-[18px] hover:py-[10px]">
                        Add new notes</button>
                </div>
        <?php } ?>
                <!-- <div onclick="chatDropfunc()" class="ml-auto mr-7">
                    <img src="/QUEUE/assets/image/menu.png" alt="" class=" w-5 h-5">
                </div> -->
            </div>
            <div class=" h-[50px] bg-emerald-100 pl-7 flex justify-center items-center text-emerald-800">
                <a href="?mynote/note=<?= htmlspecialchars($link, ENT_QUOTES, 'UTF-8') ?>" class="cursor-pointer ml-0 hover:text-rose-600 text-base hover:text-lg font-semibold">Notes
                </a>
                <a href="?mynote/Question=<?= htmlspecialchars($link, ENT_QUOTES, 'UTF-8') ?>" class="cursor-pointer ml-10 hover:text-rose-600 text-base hover:text-lg font-semibold">Questions
                </a>
                <?php 
                 if($link == $_SESSION['userdata']['userID']){
                    ?>
                <a href="?mynote/privateFile" class="cursor-pointer ml-10  hover:text-rose-600 text-base hover:text-lg font-semibold">Private
                    files</a>
                <?php }else{?>
                    <a href="?mynote/privateFile" class="cursor-pointer ml-10  hover:text-rose-600 text-base hover:text-lg font-semibold hidden">Private
                    files</a>
                <?php } ?>
            </div>
        </section>
        <!-- button section -->
        


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script type="text/javascript">
        var userIdofQ = <?= json_encode($link) ?>;
        //console.log(userIdofQ);
    </script>