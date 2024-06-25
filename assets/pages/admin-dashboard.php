<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


<?php
$k = 0;
 $postdata = getPostforGraph();
 foreach($postdata as $data){
    $dataPoints[$k]['x'] = $k+1;
    $dataPoints[$k]['y'] = $data['post_count'];
    $k++;
 }
 $i = 0;
 $helpdata = getHelpforGraph();
 foreach($helpdata as $hdata){
    $Hdata[$i]['label'] = $hdata['day'];
    $Hdata[$i]['y'] = $hdata['post_count'];
    $i++;
 }
 $j=0;
 $ansdata = getAnsforGraph();
 foreach($ansdata as $adata){
    $Adata[$j]['label'] = $adata['day'];
    $Adata[$j]['y'] = $adata['post_count'];
    $j++;
 }
 $u = countUser();
 $p = countPost();
 $h = countHelp();
 $a = countAnswer();
 ?>

<section class=" bg-purple-50 h-[91.7vh]">
       

       <div class="flex items-center justify-between mx-[50px] pt-10">
           <a href="?admin-user" class="w-[250px] h-[150px] rounded-md bg-white shadow-md text-gray-600 p-5 hover:bg-violet-200">
               <p class="mx-auto text-2xl font-semibold ml-12">Total User</p>
               <hr class="my-2">
               <p class="ml-20 font-bold mt-5 text-2xl">
                   <?=$u['count']?>
               </p>
           </a>
           <a href="?admin-help" class="w-[250px] h-[150px] rounded-md bg-white shadow-md text-gray-600 p-5 hover:bg-violet-200">
               <p class="mx-auto text-2xl font-semibold ml-11">Total posts</p>
               <hr class="my-2">
               <p class="ml-20 font-bold mt-5 text-2xl">
               <?=$p['count']?>
               </p>
           </a>
           <a href="?admin-help" class="w-[250px] h-[150px] rounded-md bg-white shadow-md text-gray-600 p-5 hover:bg-violet-200">
               <p class="mx-auto text-2xl font-semibold ml-6">Total help posts</p>
               <hr class="my-2">
               <p class="ml-20 font-bold mt-5 text-2xl">
               <?=$h['count']?>
               </p>
           </a>
           <a href="?admin-answer" class="w-[250px] h-[150px] rounded-md bg-white shadow-md text-gray-600 p-5 hover:bg-violet-200">
               <p class="mx-auto text-2xl font-semibold ml-6">Total Answers</p>
               <hr class="my-2">
               <p class="ml-20 font-bold mt-5 text-2xl">
               <?=$a['count']?>
               </p>
           </a>
       </div>    

       <div class="ml-14 flex items-center">
       <div id="chartContainer" class="mt-10 w-[520px] h-[400px] shadow-md runded-md"></div>   
       <div id="chartContainer1" class="mt-10 w-[520px] h-[400px] ml-9 shadow-md runded-md"></div>
       </div>

 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: ""
     },
     axisY:{
         title: "",
         logarithmic: true,
         titleFontColor: "#6D78AD",
         gridColor: "#6D78AD",
         includeZero: true,
         labelFormatter: addSymbols
     },
     axisY2:{
         title: "",
         titleFontColor: "#51CDA0",
         tickLength: 0,
         labelFormatter: addSymbols
     },
     legend: {
         cursor: "pointer",
         verticalAlign: "top",
         fontSize: 16,
         itemclick: toggleDataSeries
     },
     data: [{
         type: "line",
         markerSize: 0,
         showInLegend: true,
         name: "Help post",
         yValueFormatString: "#,##0",
         dataPoints: <?php echo json_encode($Hdata, JSON_NUMERIC_CHECK); ?>
     },
     {
         type: "line",
         markerSize: 0,
         axisYType: "secondary",
         showInLegend: true,
         name: "Answers",
         yValueFormatString: "#,##0",
         dataPoints: <?php echo json_encode($Adata, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 function addSymbols(e){
     var suffixes = ["", "K", "M", "B"];
  
     var order = Math.max(Math.floor(Math.log(Math.abs(e.value)) / Math.log(1000)), 0);
     if(order > suffixes.length - 1)
         order = suffixes.length - 1;
  
     var suffix = suffixes[order];
     return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
 }
  
 function toggleDataSeries(e){
     if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
         e.dataSeries.visible = false;
     }
     else{
         e.dataSeries.visible = true;
     }
     chart.render();
 }
   
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Post per day"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
 }
 </script>

   </section>
   
   
   </section>
