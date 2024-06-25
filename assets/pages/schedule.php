<?php
    require_once 'assets/php/function.php';
    global $expired; 
    global $ongoing; 
    global $upcoming; 

?>

<section class="pl-[17.5rem] bg-sky-50 w-full flex h-[91.7vh]">
         
        <div class="w-[550px] ">
            
            <div class="mx-auto w-[250px] mt-20 ">
                <p class="text-2xl font-medium text-sky-700 drop-shadow">
                    Up Coming Schedule
                </p>
                
            </div>
            <hr class="h-[1px] w-[300px] mt-2 mb-4 mx-auto">
            <div class="max-w-[400px] mx-auto max-h-[500px] overflow-auto">
                <?php
                 if(!empty($ongoing)){?>
                 <p class="font-medium text-sky-700">Ongoing</p>

                 <?php   foreach($ongoing as $value){
                ?>
                <div class="shadow-md px-5 py-3 rounded-md my-4 hover:bg-white">
                    <p class="text-sm text-yellow-600">Ended at:
                    [<?=gettime($value['till'])?>
                     <?=timeLeft($value['till'])?>]
                    </p>
                    <p class="text-sm text-yellow-700">Started from:
                    [<?=gettime($value['frm'])?>
                    <time class="timeago" datetime="<?=$value['frm']?>"></time>]
                    </p>
                    <p class="">
                        <?=$value['descrip']?>
                    </p>
                </div>
                <?php }} ?>
                <?php
                 if(!empty($upcoming)){?>
                    <p class="font-medium text-sky-700">Upcoming</p>
   
                    <?php   foreach($upcoming as $value){
                   ?>
                
                <div class="shadow-md px-5 py-3 rounded-md my-4 hover:bg-white">
                    <p class="text-sm text-green-600">Will begin:
                    [<?=gettime($value['frm'])?>
                    <?=timeLeft($value['frm'])?>]
                    </p>
                    <p class="text-sm text-green-600">Will end:
                    [<?=gettime($value['till'])?>
                    <?=timeLeft($value['till'])?>]
                    </p>
                    <p class="">
                        <?=$value['descrip']?>
                    </p>
                </div>
                <?php
                    }}else{
                ?>
                <div class="shadow-md px-5 py-3 rounded-md my-4 hover:bg-white">
                    
                    <p class="">
                        You have no upcoming schedule.
                    </p>
                </div>
                <?php } ?>
            </div>

            

        </div>
        <hr class="h-[600px] w-[1px] my-auto bg-gray-300">


        <div class="w-[550px]">
            <div class="mx-auto w-[190px] mt-20 ">
                <p class="text-2xl font-medium text-sky-700 ">
                    Expired Schedule
                </p>
                
            </div>
            <hr class="h-[1px] w-[250px] mt-2 mb-4 mx-auto ">

            <div class="max-w-[400px] mx-auto max-h-[500px] overflow-auto">
                <?php
                 if(!empty($expired)){
                    foreach($expired as $value){
                ?>
                <div class="shadow-md px-5 py-3 rounded-md my-4 hover:bg-white">
                    <p class="text-sm text-red-600">Ended at:
                    [<?=gettime($value['till'])?>
                    <time class="timeago" datetime="<?=$value['till']?>"></time>]
                    </p>
                    <p class="">
                        <?=$value['descrip']?>
                    </p>
                </div>
                <?php
                    }}else{
                ?>
                <div class="shadow-md px-5 py-3 rounded-md my-4 hover:bg-white">
                    
                    <p class="">
                        You have no expired schedule.
                    </p>
                </div>
                <?php } ?>

            </div>


        </div>

        <button onclick="createFunc()" class="absolute right-0 bottom-0 p-2 rounded-full mb-8 mr-8 bg-sky-800 text-white hover:animate-bounce">
            <img src="/QUEUE/assets/image/add.png" alt="add event" class="h-7 w-7">
        </button>

        <div id="createEvent" class="hidden absolute right-0 bottom-0 h-[430px] w-[350px] bg-white rounded-md mb-[70px] mr-[60px] shadow-lg p-3">
            <div class="flex items-center">
                <p class="font-medium text-xl text-sky-700 mt-2 ml-2">
                    Add new schedule
                </p>
                <button class="ml-auto mr-2" onclick="createFunc()">
                    <img src="/QUEUE/assets/image/multiply.png" alt="*" class="h-5 w-5 ">
                </button>
                
            </div> 
            <hr class="my-2">
            <div class="px-2">
                <form action="assets/php/action.php?AddEvent" method="POST"
                enctype="multipart/form-data">
                    <p class="text-gray-600 my-2 ml-2">From : <input type="datetime-local" name="frDate" class="focus:outline-dotted px-2 py-1 rounded-md shadow-inner bg-gray-50 " required=""></p>
                    <p class="text-gray-600 my-2 ml-2">Untill : <input type="datetime-local" name="toDate"class="focus:outline-dotted px-2 py-1 rounded-md shadow-inner bg-gray-50 " required=""></p>
                    <p class="mt-4 mb-2">Description:</p>
                    <textarea type="text" name="txt" class="h-[150px] w-full rounded-md shadow-inner outline-none bg-gray-50 p-2 my-2 text-gray-600" placeholder="Description of the event" required=""></textarea>
                    <button type="submit" class="bg-sky-700 hover:bg-sky-800 text-white w-full py-1 my-2 rounded-md">Submit</button>
                    
                    
                </form>
            </div>


        </div>
        
        <script>
            function createFunc() {
            var a = document.getElementById("createEvent");
            if (a.style.display === "none") {
                a.style.display = "block";
            } else {
                a.style.display = "none";

            }
        }
        </script>
       

    </section>