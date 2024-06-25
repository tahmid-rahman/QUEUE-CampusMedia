





<section class="flex">


    <div class="m-10">
            <div class="flex col-auto my-4 items-center">
                <p class="text-emerald-700 font-semibold text-2xl ml-2">Private Files</p>
                <input type="text" name="" id="privatefile_search" class="ml-auto py-2 px-3 outline-none shadow-md rounded-md w-60"
                    placeholder="Search">
                <button data-modal-target="uploadpfile" data-modal-toggle="uploadpfile"
                    class="px-3 py-2 bg-emerald-700 text-white ml-2 rounded-md hover:bg-emerald-900 shadow-md">Add
                    file</button>
            </div>

        <table class="table-auto w-[1000px] max-h-[50vh] overflow-y-auto" id="privatefiles">
            
        </table>
    </div>





</section>
<div id="uploadpfile" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold pl-5 text-emerald-700">
                    Upload new file.
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="uploadpfile">
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
                <form method="post" action="assets/php/action.php?newPfile" enctype="multipart/form-data">
                    <div class="p-2">
                        <label class="py-2 block text-sm font-medium text-gray-500" for="">Give a name for the
                            file.</label>
                        <input
                            class="block w-full text-md px-2 py-2 text-gray-600 border border-gray-300 rounded-md bg-white focus:outline-none"
                            name="post_name" type="text" required="" placeholder="Enter file name">
                        <label class="py-2 block text-sm font-medium text-gray-500" for="">Choose a pdf
                            file.</label>
                        <input
                            class="block w-full text-md px-2 py-2 text-gray-500 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none"
                            name="post_file" type="file" required="" placeholder="Choose file.">
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