


<div class="m-10">
            <div class="flex col-auto my-2 items-center px-2">
                <p class="text-slate-600 font-semibold text-2xl ml-2">Post control</p>
                <input type="text" name="" id="adminP_search" class="ml-auto py-1 px-3 outline-none shadow-md rounded-md w-64 bg-slate-50" placeholder="Search">
            </div>

        <table class="table-auto w-[1100px] max-h-[50vh] overflow-y-auto" id="adminpost">
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
                <td class="px-2 py-1  ">ID</td>
                <td class="px-2 py-1  ">Username</td>
                <td class="px-2 py-1  ">caption</td>
                <td class="px-2 py-1  ">files</td>
                <td class="px-2 py-1  ">Control</td>
            </tr>
            <!-- <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$i.'</td>
                <td class="px-2 py-1  ">'.$data['file_name'].'</td>
                <td class="px-2 py-1 "><a href="/QUEUE/assets/image/posts/'.$data['file'].'" target="_thapa">'.$data['file'].'</a></td>
                <td class="px-2 py-1  hover:text-slate-400 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$data['file'].'">Click to download</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deletePrivateFile('.$data['itemID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr> -->
        </table>
</div>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
