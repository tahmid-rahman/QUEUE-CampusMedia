
<?php

require_once 'assets/php/function.php';
global $userProfile;
global $profilePosts;
global $allUser;

?>

<section class="flex pl-[17.5rem]">



<!-- post section -->
<div class="mx-auto pl-2 max-h-[91.8vh] overflow-auto">

    <?php
    if($profilePosts['0']['postid']){
        foreach($profilePosts as $post){
            $likes = getLike($post['postid']);
    ?>
    <!-- post -->
    <div class="w-[600px] bg-[#fcf5ef] h-fit rounded-lg shadow-lg my-4 px-5 pt-2 pb-3 overflow-hidden">
        <!-- post 1 -->
        <div class="h-20 p-2 flex items-center">
            <div class="cursor-pointer w-10 h-10 rounded-full overflow-hidden flex justify-center items-center">
                <img src="/QUEUE/assets/image/posts/<?=$post['ppic']?>" alt="" class="object-cover w-full h-full">
            </div>
            <div>
                <p class="pl-4 text-gray-700 font-semibold hover:text-green-800 hover:underline cursor-pointer">
                <?=$post['username']?></p>
                <p class="pl-4 text-gray-500 font-medium text-xs"><?=$post['time']?></p>
            </div>
        </div>
        <hr class="bg-[#ffff] mb-2 h-[1.5px]">
        <div class="p-2">
            <p class="text-gray-700"><?=$post['text']?></p>
        </div>
        <div class=" p-2">
            <img src="/QUEUE/assets/image/posts/<?=$post['ptpic']?>" alt="">
        </div>
        <div class="h-15 p-2 flex items-center  text-gray-700">
            <div class="mr-auto">
                <button onclick="likeBtn(<?=$post['postid']?>)" 
                    class="flex items-center hover:bg-[#c4c3de76] px-2 py-1 rounded-md"><img
                        src="/QUEUE/assets/image/7.png" alt="" class="w-5">
                    <p class="text-gray-700 p-1">Queue</p>
                </button>
            </div>
            <p class="pr-2">
                <span id="points<?=$post['postid']?>"><?=$likes?></span> 
            points</p>
        </div>

    </div>
    <?php
        }
    }else{
        ?>
        <div
        class="w-[600px] h-24 bg-[#fcf5ef] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden flex justify-center items-center">
        <h2>Nothing to show. You don't have any post.</h2>
        </div>
        <?php
    }
    ?>
</div>



</div>
<div>

    <div
        class="w-[400px] bg-[#fcf5ef] rounded-lg shadow-lg my-4 mx-4 px-8 py-5 overflowhidden flex justify-start items-center">
        <div class="cursor-pointer w-24 h-24 rounded-full overflow-hidden flex justify-center items-center">
            <img src="/QUEUE/assets/image/posts/<?=$profilePosts['0']['ppic']?>" alt="" class="object-cover w-full h-full">
        </div>
        <div>
            <p class="pl-4 text-gray-800 font-bold text-xl ">
            <?=$profilePosts['0']['name']?></p>
            <p class="pl-4 text-gray-700 font-medium hover:text-green-800 hover:underline cursor-pointer">
            <?=$profilePosts['0']['username']?></p>
<?php
        if($profilePosts['0']['userID'] !== $userProfile['userID']){ ?>
        <div class="flex">
            <a href="?chat"><button class="bg-[#e8882f] mt-2 ml-4 px-2 py-1 rounded-md text-white hover:bg-rose-400  shadow-lg"   
            onclick="createConversion(<?=$profilePosts['0']['userID']?>)" >Send message </button></a> 
            <a href="?mynote/note=<?=$_GET['profile']?>"><button class="bg-[#e8882f] mt-2 ml-1 px-2 py-1 rounded-md text-white hover:bg-rose-400 shadow-lg"   
             >See notes </button></a> 
        </div>
             <!-- data-bs-target="#chatbox" onclick="popchat()" >Send message</button> -->
<?php   }
            
?>
        </div>

    </div>

    <!--  section -->
    <div class="w-[400px] bg-[#fcf5ef] h-[540px] rounded-md my-4 mx-4 px-8 py-5 shadow-lg overflow-y-auto">
        <p class="pl-5 pt-2 text-xl font-medium">People you know may!</p>
        <hr class="m-2">
    <?php
        foreach($allUser as $user){
    ?>
        <div class="hover:bg-white hover:rounded-md mx-2 my-1 px-5 py-2 text-gray-700 flex items-center">
            <div class="w-9 h-9 rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/<?=$user['ppic']?>"
                    alt="" class="object-cover w-full h-full"></div>
            <div class="flex flex-col">
                <div class="pl-2 text-gray-700 text-base">
                <?=$user['name']?></div>
                <a href="?profile=<?=$user['userID']?>" class="pl-2 text-gray-700 text-sm hover:text-green-800 hover:underline cursor-pointer">
                <?=$user['username']?></a>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>

</section>



