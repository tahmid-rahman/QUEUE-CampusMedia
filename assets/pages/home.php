<?php
require_once 'assets/php/function.php';
global $userProfile;
global $posts;
// $alert = "<script>alert($userProfile);</script>";
    //         echo $alert;
?>
<section class="flex pl-[17.5rem]">
    <!-- create post section -->
    <div id="createPostMenu"
        class="hidden absolute top-32 left-[25rem] h-[500px] w-[500px] bg-gradient-to-tr from-teal-50 via-sky-50 to-purple-50 px-5 py-5 rounded-md shadow-2xl">
        <div class="flex justify-center items-center ">
            <p class="text-xl font-bold mx-auto">Create post</p>
            <button onclick="showCreatePost(true)"><img src="/QUEUE/assets/image/multiply.png" alt="*"
                    class="w-8 pr-2"></button>
        </div>
        <hr class="my-3">
        <div class="flex items-center">
            <a href="#" class="cursor-pointer w-9 h-9 rounded-full overflow-hidden flex justify-center items-center">
                <img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>" alt=""
                    class="object-cover w-full h-full">
            </a>
            <div>
                <a href="#" class="pl-2 text-gray-700 hover:text-green-800 hover:underline cursor-pointer">
                    <?=$userProfile['username']?>
                </a>
                <p class="pl-2 text-gray-500 font-medium text-xs">
                    <?=date('m/d/Y h:i:s a', time());?>
                </p>
            </div>
        </div>
        <form method="post" action="assets/php/action.php?addpost" enctype="multipart/form-data">
            <div class="p-2 max-h-[26rem] overflow-hidden">
                <textarea name="post_text"
                    class="bg-transparent items-start w-full h-svh max-h-40 px-3 focus:outline-none break-words"
                    placeholder="What's on your mind?"></textarea>

                <label class=" my-5 block my-2 text-sm font-medium text-gray-500" for="file_input">Attach a
                    file</label>
                <input
                    class="block w-full text-sm px-1 py-1 text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                    name="post_img" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 " id="select_post_img">PNG, JPG or JPEG.</p>

            </div>
            <button type="submit"
                class="bg-[#d72f5b] text-white order-last my-3 w-full rounded-md hover:bg-transparent border-transparent hover:border-[#d72f5b] border-2 hover:text-[#d72f5b] active:bg-teal-500 py-1 text-lg font-bold">Post</button>
        </form>

    </div>


    <!-- post section -->
    <div class="mx-auto pt-4 pl-2 max-h-[91.8vh] overflow-auto">
        <!-- search -->
        <form action="" class="flex h-11">
            <input type="text" class="w-[500px] bg-rose-50 px-4 py-2 rounded-xl shadow-md focus:outline-none" autocomplete="off"
                placeholder="Search" id="home_search">
            <button
                class="bg-[#d72f5b] ml-3 px-[18px] rounded-xl h-full shadow-lg text-white hover:bg-[#ff5353] text-md font-semibold">Search</button>
        </form>
        <div id="homeSearchResult"
            class=" max-h-[500px] w-[600px] bg-white shadow-md rounded-lg mt-1 overflow-auto flex-col p-3 hidden">
        </div>

        <!-- create post -->
        <div
            class="w-[600px] bg-rose-50 h-20 rounded-lg shadow-lg my-4 px-5 pt-2 pb-3 overflowhidden flex justify-center items-center">
            <div class="cursor-pointer w-9 h-9 rounded-full overflow-hidden flex justify-center items-center">
                <img src="/QUEUE/assets/image/posts/<?=$userProfile['ppic']?>" alt=""
                    class="object-cover w-full h-full">
            </div>

            <button onclick="showCreatePost(true)" class="flex h-11 pl-3"><input
                    class="w-[500px] px-4 py-2 rounded-xl shadow-inner bg-white focus:outline-none cursor-pointer"
                    placeholder="Post, What's on your mind!"></button>

        </div>

        <?php
        foreach($posts as $post){
            $likes = getLike($post['postid']);
            $likeCount = getLikeByUser($post['postid']);
            if($likeCount>0){
                $likeBtnIcn = '3 (1).png';
                $likeBtnTxt = 'Queued';
                $likeBtnClass = 'text-[#196458]  p-1 font-medium';
            }else{
                $likeBtnIcn = '7.png';
                $likeBtnTxt = 'Queue';
                $likeBtnClass = 'text-gray-700  p-1 font-medium';
            }
        ?>
        <div class="w-[600px] bg-rose-50 h-fit rounded-lg shadow-lg my-4 px-5 pt-2 pb-3 overflowhidden">
            <div class="h-20 p-2 flex items-center">
                <div class="cursor-pointer w-12 h-12 rounded-full overflow-hidden flex justify-center items-center">
                    <img src="/QUEUE/assets/image/posts/<?=$post['ppic']?>" alt="" class="object-cover w-full h-full">
                </div>
                <div>
                    <a href="?profile=<?=$post['userID']?>"
                        class="pl-4 text-gray-700 font-semibold hover:text-green-800 hover:underline cursor-pointer">
                        <?=$post['name']?>
                    </a>
                    <p class="pl-4 text-gray-500 font-medium text-xs">
                    [<?=gettime($post['time'])?>
                    <time class="timeago" datetime="<?=$post['time']?>"></time>]
                    </p>
                </div>
            </div>
            <div class="p-2">

                <p class="text-gray-700">
                    <?=$post['text']?>
                </p>
            </div>
            <div class=" p-2">
                <img src="/QUEUE/assets/image/posts/<?=$post['ptpic']?>" alt="">
            </div>
            <div class="h-15 p-2 flex items-center  text-gray-700">
                <div class="mr-auto">
                    <button onclick="likeBtn(<?=$post['postid']?>)"
                        class="flex items-center hover:bg-[#c4c3de76] px-2 py-1 rounded-md"><div class="w-5" ><img id="likeIcn<?=$post['postid']?>"
                            src="/QUEUE/assets/image/<?=$likeBtnIcn?>" alt=""></div>
                        <p id="likeTxt<?=$post['postid']?>" class=" <?=$likeBtnClass?>"><?=$likeBtnTxt?></p>
                    </button>
                </div>
                <p class="pr-2">
                <span id="points<?=$post['postid']?>"><?=$likes?></span> points
                </p>
            </div>
            <!--  -->
        </div>

        <?php 
        }
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
    <!-- noitification section -->
    <div class="w-[400px] bg-rose-50 h-[600px] rounded-md mt-4 m-2 p-3 shadow-lg overflow-y-scroll">
        <p class="pl-5 text-2xl font-bold mt-2">Notification</p>
        <hr class="m-2">
        <div id=notifications class="max-h-[500px] overflow-auto">

        </div>
        <!-- <div class="hover:bg-gray-100 hover:rounded-md mx-2 my-1 px-5 py-2 text-gray-700">
            You have a new follower.
            <p class="text-xs px-1 text-blue-400">time</p>
        </div>
        <div class="hover:bg-gray-100 hover:rounded-md mx-2 my-1 px-5 py-2 text-gray-700">
            Someone likes your post.
            <p class="text-xs px-1 text-blue-400">time</p>
        </div> -->
    </div>
</section>