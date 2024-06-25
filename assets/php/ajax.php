<?php
require_once 'function.php';

if(isset($_GET['chatSearch'])){
    //$in = $_POST(['input']);
    $chatUser = getAllChatUser($_POST['input']);
    $searchList="";
    foreach($chatUser as $ch_us){

        $searchList.='  
        <div data-bs-target="#chatbox" onclick="popchat('.$ch_us['userID'].')"
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-[#09ada8]/20 pl-2 py-2 flex justify-start items-center ">
            <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$ch_us['ppic'].'" alt=""
                class="object-cover w-full h-full">
            </div>
            <div>
             <p class="pl-2 text-gray-800 font-medium">'.$ch_us['name'].'</p>
             <p class="pl-2 text-gray-600 text-sm">'.$ch_us['username'].'</p>
            </div>
    
        </div>
    
        ';
    
    
    }
    $json['chatSearchResult'] = $searchList;
    
    echo json_encode($json);

    
}
if(isset($_GET['roomSearch'])){
    //$in = $_POST(['input']);
    $chatUser = getAllroomUserSearch($_POST['input']);
    $searchList="";
    foreach($chatUser as $ch_us){

        $searchList.='  
        <div
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-indigo-200 pl-2 py-2 flex justify-start items-center ">
            <div class="w-9 h-9 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$ch_us['roomPic'].'" alt=""
                class="object-cover w-full h-full">
            </div>
            <div>
             <p class="pl-2 text-gray-800 font-medium max-w-[185px]">'.$ch_us['room_name'].'</p>
            </div>
            <button data-bs-target="#roomchatbox" onclick="joinRoomChat('.$ch_us['roomID'].')"
                class="bg-indigo-400 text-white py-2 ml-auto mr-2 px-2 text-sm rounded-lg shadow-md hover:bg-rose-400 cursor-pointer">
                Join
            </button>
    
        </div>
    
        ';
    
    
    }
    $json['roomSearchResult'] = $searchList;
    
    echo json_encode($json);

    
}
if(isset($_GET['adminChatSearch'])){
    //$in = $_POST(['input']);
    $chatUser = getadminChatSearch($_POST['input']);
    $chatlist="";
    foreach($chats as $chat){
        $ch_user = getUser($chat['user_id']);

        $chatlist.='  
            <div data-bs-target="#adminChatlist" onclick="popAdminchat('.$ch_user['userID'].')"
                class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#09ada8]/20 pl-2 py-2 flex justify-start items-start ">
                <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img
                        src="/QUEUE/assets/image/posts/'.$ch_user['ppic'].'" alt="" class="object-cover w-full h-full">
                </div>
                <div class="max-w-[200px]">
                    <p class="pl-2 text-gray-800 font-medium">'.$ch_user['name'].'</p>
                    <p class="pl-2 text-gray-400 text-sm overflow-hidden max-w-[200px]">'.$chat['msg'].'
                    </p>
                    <p class="pl-2 text-gray-600 text-xs">
                        '.gettime($chat['send_at']).'
                    </p>

                </div>
            </div>

        ';


    }
    $json['adminchatsearch'] = $chatlist;
    
    echo json_encode($json);

    
}
if(isset($_GET['QuestionSearch'])){
    //$in = $_POST(['input']);
    $ques = getQuestionSearch($_POST['input'],$_POST['user']);
    if($ques['0']['user_id'] == $_SESSION['userdata']['userID']){
        $acces='';
        $flag ='1';
    }else{
        $flag ='0';
        $acces='hidden';
    }
    
    $quesList='
        <tr class="border bg-emerald-200 text-emerald-700 font-medium text-xl">
            <td class="px-2 py-1  ">Serial</td>
            <td class="px-2 py-1  ">Name</td>
            <td class="px-2 py-1  ">File</td>
            <td class="px-2 py-1  ">Download</td>
            <td class="px-2 py-1 '.$acces.' ">Public</td>
        </tr>';
    $vis='';
    $i='1';
    foreach($ques as $q){
        if($q['Visibility'] == 0){
            $vis='';
        }else{
            $vis ='checked';
        }
        if($flag == 0 && $q['Visibility'] == 1){
            $quesList.='
            <tr class="border hover:bg-emerald-100">
                <td class="px-2 py-1  ">'.$i.'</td>
                <td class="px-2 py-1  ">'.$q['q_name'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$q['q_file'].'" target="_thapa">'.$q['q_file'].'</a></td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$q['q_file'].'">Click to download</a></td>
                <td class="px-2 py-1 '.$acces.' "><input type="checkbox" value="no" '.$vis.' 
                    onclick="visibility('.$q['qID'].')" class="cursor-pointer"></input></td>
            </tr>';
            $i++;
        }else if($flag == 1) {
            $quesList.='
            <tr class="border hover:bg-emerald-100">
                <td class="px-2 py-1  ">'.$i.'</td>
                <td class="px-2 py-1  ">'.$q['q_name'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$q['q_file'].'" target="_thapa">'.$q['q_file'].'</a></td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$q['q_file'].'">Click to download</a></td>
                <td class="px-2 py-1 '.$acces.' "><input type="checkbox" value="no" '.$vis.' 
                    onclick="visibility('.$q['qID'].')" class="cursor-pointer"></input></td>
            </tr>';
            $i++;
        }
        
    }
    $json['QtableSearch']=$quesList;
    
    echo json_encode($json);

    
}



if(isset($_GET['sendmessage'])){
    if(sendMessage($_POST['user_id'],$_POST['msg'])){
        $response['status']=true;
    }else{
        $response['status']=false;

    }

    echo json_encode($response);
}

if(isset($_GET['sendRoomMessage'])){
    if(sendRoomMsg($_POST['room_id'],$_POST['msg'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['sendAdminMessage'])){
    if(sendAdminMsg($_POST['id'],$_POST['msg'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['sendDropMessage'])){
    if(sendDropMsg($_POST['msg'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['makeChat'])){
    
    createConversionChat($_POST['userId']);
}


if(isset($_GET['joinRoomChat'])){
    joinRoom($_POST['roomId']);
}


if(isset($_GET['leaveFormRoom'])){
    if(deleteFormRoom($_POST['room'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

if(isset($_GET['likePost'])){
    if(updateLike($_POST['id'])){
        $id=$_POST['id'];
        $lik = getLikeByUser($_POST['id']);
        if($lik>0){
            $icn='3 (1).png';
            $txt='<p class="text-[#196458] font-medium">Queued</p>';
        }else{
            $icn='7.png';
            $txt='<p class="text-gray-700 font-medium">Queue</p>';
        }
        $response['likeIcon'] = $icn;
        $response['liketxt'] = $txt;
        $response['status']=true;
        $response['totalLike']= getLike($_POST['id']);

    }else{
        $response['status']=false;
    }
    echo json_encode($response);
}

if(isset($_GET['deletePfile'])){
    if(deleteFromPfile($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['deletePostByAdmin'])){
    if(adminDeleteFromPost($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['deleteHelpByAdmin'])){
    if(adminDeleteFromHelp($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['deleteAnswerByAdmin'])){
    if(adminDeleteFromAnswer($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['deleteUserByAdmin'])){
    if(adminDeleteFromUser($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}
if(isset($_GET['deleteRoomByAdmin'])){
    if(adminDeleteFromRoom($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

if(isset($_GET['deleteChat'])){
    if(deleteFromChat($_POST['id'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}

if(isset($_GET['setVisibility'])){
    if(changeVisibility($_POST['Qid'])){
        $response['status']=true;
    }else{
        $response['status']=false;
    }

    echo json_encode($response);
}




if(isset($_GET['getmessages'])){
    $chats = getAllMessages();
    $chatlist="";
    foreach($chats as $chat){
        $ch_user = getUser($chat['user_id']);
        
    
        // $seen=false;
        // if($chat['messages'][0]['read_status']==1 || $chat['messages'][0]['from_user_id']==$_SESSION['userdata']['userID']){
        //     $seen = true;
        // }
        $chatlist.='  
        <div data-bs-target="#chatbox" onclick="popchat('.$chat['user_id'].')"
            class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#09ada8]/20 pl-2 py-2 flex justify-start items-start ">
            <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$ch_user['ppic'].'" alt=""
                class="object-cover w-full h-full">
            </div>
            <div>
            <p class="pl-2 text-gray-800 font-medium">'.$ch_user['name'].'</p>
            <p class="pl-2 text-gray-400 text-sm overflow-hidden max-w-[200px]">'.$chat['messages'][0]['msg'].'</p>
            <p class="pl-2 text-gray-600 text-xs">
                '.timeAgoOwn($chat['messages'][0]['created_at']).'
            </p>

            </div>

        </div>

        ';


    }
    $json['chatlist'] = $chatlist;



    if(isset($_POST['chatter_id']) && $_POST['chatter_id']!=0){
        $messages = getMessages($_POST['chatter_id']);
        $chatmsg="";

        // updateMessageReadStatus($_POST['chatter_id']);

        foreach($messages as $cm){
            if($cm['from_user_id']==$_SESSION['userdata']['userID']){
                $chatmsg.='<div
                class=" bg-[#09ada8] text-white w-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-3xl rounded-br-md my-1 ml-auto max-w-[36rem] py-2 px-4">
                <p class="h-fit">'.$cm['msg'].'</p>
                </div>';

            }else{
                $chatmsg.='<div 
                class=" bg-blue-100 text-gray-800 w-fit h-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-md rounded-br-3xl my-1 max-w-[36rem] py-2 px-4">
                    <p class="h-fit">'.$cm['msg'].'</p>
                    </div>';
            }

        
        }
        $json['chat']['msgs']=$chatmsg;
        $json['chat']['userdata']=getUser($_POST['chatter_id']);
    }else{
        $json['chat']['msgs']='<div class="spinner-border text-center" role="status">
        </div>';
    }

    //$json['newmsgcount']=newMsgCount();
    echo json_encode($json);
}


if(isset($_GET['getRoomMessages'])){
$chats = getRoom();
$chatlist="";
foreach($chats as $chat){
    $chatlist.='  
    <div data-bs-target="#roomchatbox" onclick="popRoomChat('.$chat['roomID'].')"
        class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 py-2 flex justify-start items-center ">
        <div class="w-10 h-10 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$chat['roomPic'].'" alt=""
            class="object-cover w-full h-full">
        </div>
        <div>
         <p class="pl-2 text-gray-800 max-w-[240px] font-medium">'.$chat['room_name'].'</p>
         
        </div>

    </div>

    ';


    }
    $json['roomChatList']=$chatlist;    

    if(isset($_POST['room']) && $_POST['room']!=0){
    $roomMsg = getRoomMsg($_POST['room']);
    $roomMember = getMember($_POST['room']);
    $roomAdmin = getUser($roomMsg[0]['adminID']);
//  $messages = getMessages($_POST['chatter_id']);
    $memberlist="";
    $adminlist = '<a href="?profile='.$roomAdmin['userID'].'"
    class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 py-2 flex justify-start items-center ">
    <div class="w-10 h-10 mt-[3px] rounded-full  overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$roomAdmin['ppic'].'" alt=""
        class="object-cover w-full h-full">
    </div>
    <div>
     <p class="pl-2 text-gray-800 font-medium">'.$roomAdmin['name'].'</p>
    <!-- <p class="pl-2 text-gray-800 font-medium">'.$roomAdmin['name'].'</p> -->
     
    </div>
    </a>';
    foreach($roomMember as $member){
        if(!is_null($member['user_id']) && $member['user_id'] !== $roomAdmin['userID']){
        $user_mem = getUser($member['user_id']);
        $memberlist.='  
        <a href="?profile='.$member['user_id'].'"
            class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-indigo-100 pl-2 py-2 flex justify-start items-center ">
            <div class="w-10 h-10 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$user_mem['ppic'].'" alt=""
                class="object-cover w-full h-full">
            </div>
            <div>
             <p class="pl-2 text-gray-800 font-medium">'.$user_mem['name'].'</p>
             
            </div>
    
        </a>';
        }
    }
    if($memberlist == ""){
        $memberlist.='  
        <div>
             <p class="pl-7 text-gray-800 font-medium">No member join yet!</p>
            </div>';
    }
    $roommsg="";
    foreach($roomMsg as $msg){
        if(!is_null($msg['msg'])){
            if($msg['user_id']==$_SESSION['userdata']['userID']){
                
                $roommsg.='
                    <div
                        class=" bg-indigo-400 text-white w-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-3xl rounded-br-md my-1 ml-auto max-w-[36rem] py-2 px-4">
                    <p class="h-fit">'.$msg['msg'].'</p>
                    </div>';

            }else{
                $us= getUser($msg['user_id']);
                $roommsg.='
                <div class="flex items-center">
                    <a href="?profile='.$msg['user_id'].'" class="w-9 h-9 mr-1 rounded-full overflow-hidden cursor-pointer"><img src="/QUEUE/assets/image/posts/'.$us['ppic'].'" alt=""
                            class="object-cover w-full h-full">
                        </a>
                    <div 
                    class=" bg-blue-100 text-gray-800 w-fit h-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-3xl rounded-br-3xl my-1 max-w-[35rem] py-2 px-4">
                        <p class="h-fit">'.$msg['msg'].'</p>
                    </div>
                </div>';
            }
        }
    }
    if($roommsg == ""){
        $roommsg.='  
        <div class="mx-auto">
             <p class=" mb-2 text-gray-800 font-medium">No message sent yet!</p>
            </div>';
    }

    
// }
// $json['chat']['msgs']=$chatmsg;
// $json['chat']['userdata']=getUser($_POST['chatter_id']);
// }else{
// $json['chat']['msgs']='<div class="spinner-border text-center" role="status">
// </div>';
    $json['rooms']['msgs']=$roommsg;
    $json['rooms']['admin'] = $adminlist;
    $json['rooms']['members'] = $memberlist;
    $json['rooms']['roompic1'] = $roomMsg[0]['roomPic'];
    $json['rooms']['roompic2'] = $roomMsg[0]['roomPic'];
    $json['rooms']['topic1'] = $roomMsg[0]['room_name'];
    $json['rooms']['topic2'] = $roomMsg[0]['room_name'];
    
    }

//$json['newmsgcount']=newMsgCount();
    echo json_encode($json);
}

if(isset($_GET['getQtable'])){

    if(isset($_POST['user']) && $_POST['user']!=0){
        $Qdata = getQdata($_POST['user']);
        $acces='';
        $flag='0';
        if($Qdata['0']['user_id'] == $_SESSION['userdata']['userID']){
            $acces='';
            $flag ='1';
        }else{
            $flag ='0';
            $acces='hidden';
        }
        
        $vis='';
        $i=1;
        $row='  
                <tr class="border bg-emerald-200 text-emerald-700 font-medium text-xl">
                    <td class="px-2 py-1  ">Serial</td>
                    <td class="px-2 py-1  ">Name</td>
                    <td class="px-2 py-1  ">File</td>
                    <td class="px-2 py-1  ">Download</td>
                    <td class="px-2 py-1  '.$acces.'">Public</td>
                </tr>';
        
        foreach($Qdata as $data){
            if($data['Visibility'] == 0){
                $vis='';
            }else{
                $vis ='checked';
            }
            if($flag == 0 && $data['Visibility'] == 1){
                $row.='
                <tr class="border hover:bg-emerald-100">
                    <td class="px-2 py-1  ">'.$i.'</td>
                    <td class="px-2 py-1  ">'.$data['q_name'].'</td>
                    <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['q_file'].'" target="_thapa">'.$data['q_file'].'</a></td>
                    <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$data['q_file'].'">Click to download</a></td>
                    <td class="px-2 py-1 '.$acces.' "><input type="checkbox" value="no" '.$vis.' 
                        class="cursor-pointer" onclick="visibility('.$data['qID'].')"></input></td>
                </tr>';
                $i++;
            }
            else if($flag == 1) {
                $row.='
                <tr class="border hover:bg-emerald-100">
                    <td class="px-2 py-1  ">'.$i.'</td>
                    <td class="px-2 py-1  ">'.$data['q_name'].'</td>
                    <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['q_file'].'" target="_thapa">'.$data['q_file'].'</a></td>
                    <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$data['q_file'].'">Click to download</a></td>
                    <td class="px-2 py-1 '.$acces.' "><input type="checkbox" value="no" '.$vis.' 
                        class="cursor-pointer" onclick="visibility('.$data['qID'].')"></input></td>
                </tr>';
                $i++;
            }
            
            

        }
        $json['QtableList']=$row;
    }

    
    echo json_encode($json);
}

if(isset($_GET['getNotesideCol'])){

    if(isset($_POST['user']) && $_POST['user']!=0){
        $notes = getnotebyid($_POST['user']);
        $list='';
        foreach($notes as $note){
            $list.='
            <a href="?notefile='.$note['noteID'].'"
                class="cursor-pointer w-full bg-transparent mt-1 hover:rounded-md hover:bg-emerald-200 p-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden ml-2"><img
                        src="/QUEUE/assets/image/posts/'.$note['noteThumbnail'].'" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-2 text-gray-700 max-w-[240px]">
                '.$note['note_name'].'
                </p>
            </a>';
        }
        $json['noteList']=$list;
    }
    echo json_encode($json);
}

if(isset($_GET['noteSearch'])){

    if(isset($_POST['user']) && $_POST['user']!=0){
        
        $notes = getNoteSearch($_POST['input'],$_POST['user']);
        $list='';
        foreach($notes as $note){
            $list.='
            <a href="?notefile='.$note['noteID'].'"
                class="cursor-pointer w-full bg-transparent mt-1 hover:rounded-md hover:bg-emerald-200 p-2 flex items-center ">
                <div class="w-8 h-8 rounded-full overflow-hidden ml-2"><img
                        src="/QUEUE/assets/image/posts/'.$note['noteThumbnail'].'" alt=""
                        class="object-cover w-full h-full"></div>
                <p class="pl-2 text-gray-700 max-w-[240px]">
                '.$note['note_name'].'
                </p>
            </a>';
        }
        $json['noteList']=$list;
    }
    echo json_encode($json);
}

if(isset($_GET['getPtable'])){

    if(isset($_POST['user']) && $_POST['user']!=0){
        $Pdata = getPdata($_POST['user']);
        $row='  
            <tr class="border bg-emerald-200 text-emerald-700 font-medium text-xl">
                <td class="px-2 py-1  ">Serial</td>
                <td class="px-2 py-1  ">Name</td>
                <td class="px-2 py-1  ">File</td>
                <td class="px-2 py-1  ">Download</td>
                <td class="px-2 py-1  ">Control</td>
            </tr>';
        $i=1;
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-emerald-100">
                <td class="px-2 py-1  ">'.$i.'</td>
                <td class="px-2 py-1  ">'.$data['file_name'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['file'].'" target="_thapa">'.$data['file'].'</a></td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$data['file'].'">Click to download</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deletePrivateFile('.$data['itemID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
            $i++;
        }
            
        $json['PtableList']=$row;
    }

    
    echo json_encode($json);
}


if(isset($_GET['PfileSearch'])){
    //$in = $_POST(['input']);
    if(isset($_POST['user']) && $_POST['user']!=0){
        $Pdata = getPdataSearch($_POST['input'],$_POST['user']);
        $row='  
            <tr class="border bg-emerald-200 text-emerald-700 font-medium text-xl">
                <td class="px-2 py-1  ">Serial</td>
                <td class="px-2 py-1  ">Name</td>
                <td class="px-2 py-1  ">File</td>
                <td class="px-2 py-1  ">Download</td>
                <td class="px-2 py-1  ">Control</td>
            </tr>';
        $i=1;
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-emerald-100">
                <td class="px-2 py-1  ">'.$i.'</td>
                <td class="px-2 py-1  ">'.$data['file_name'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['file'].'" target="_thapa">'.$data['file'].'</a></td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/php/action.php?downloadQuestion='.$data['file'].'">Click to download</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deletePrivateFile('.$data['itemID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
            $i++;
        }
            
        $json['PtableList']=$row;
    };
    
    echo json_encode($json);

    
}

if(isset($_GET['notificatios'])){

    $notifi = getNotification();
    $list='';
    foreach($notifi as $n){
        $by= getUser($n['by_user_id']);
        if($n['answer_link'] == NULL){
            $h=' hidden';
        }
        else{
            $h='';
        }
        $list.='
        <div class="hover:bg-white hover:rounded-md mx-2 my-1 px-5 py-2 text-gray-700 cursor-pointer">
            <span>
                <a href="?profile='.$by['userID'].'" class="hover:underline hover:text-green-800 font-medium">'.$by['name'].'</a> '.$n['text'].'
                <a href="?viewAnswer='.$n['answer_link'].'" class="hover:underline hover:text-green-800 font-medium '.$h.'">help post</a>
            </span>
            <p class="text-xs text-blue-500">
                ['.gettime($n['time']).' 
                '.timeAgoOwn($n['time']).']
            </p>
        </div>';
    }
    $json['notifiList']=$list;
    echo json_encode($json);
}

if(isset($_GET['homeSearch'])){
    //$in = $_POST(['input']);
    $Userlsit = getAllChatUser($_POST['input']);
    $searchList="";
    foreach($Userlsit as $list){

        $searchList.='  
        <a href="?profile='.$list['userID'].'"
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-rose-50 pl-2 py-2 flex justify-start items-center">
            <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img src="/QUEUE/assets/image/posts/'.$list['ppic'].'" alt=""
                class="object-cover w-full h-full">
            </div>
            <div>
             <p class="pl-2 text-gray-800 font-medium">'.$list['name'].' </p>
             <p class="pl-2 text-gray-600 text-sm">'.$list['username'].'</p>
            </div>
    
        </a>';
    }
    if($searchList == ''){
        $searchList.='  
        <div
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-rose-50 pl-2 py-2 flex justify-start items-center">
             <p class="pl-2 text-gray-800 font-medium mx-auto">No user found</p>
        </div>';
    }
    $json['SearchResult'] = $searchList;
    
    echo json_encode($json);

    
}
if(isset($_GET['helpSearch'])){
    //$in = $_POST(['input']);
    $helplist = getAllHelpPost($_POST['input']);
    $searchList="";
    foreach($helplist as $list){

        $searchList.='  
        <a href="?viewAnswer='.$list['helpID'].'"
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-[#fcf6ff] pl-2 py-2 flex justify-start items-center">
            <div>
             <p class="pl-2 text-gray-800 font-medium">Topic: '.$list['topic'].' </p>
             <p class="pl-2 text-gray-800 text-sm">Description: '.$list['helpTxt'].' </p>
            </div>
    
        </a>';
    }
    if($searchList == ''){
        $searchList.='  
        <div
            class="cursor-pointer h-fit w-full bg-transparent hover:rounded-md hover:bg-rose-50 pl-2 py-2 flex justify-start items-center">
             <p class="pl-2 text-gray-800 font-medium mx-auto">No help post found!</p>
        </div>';
    }
    $json['SearchResult'] = $searchList;
    
    echo json_encode($json);

    
}


if(isset($_GET['getadminPtable'])){

    if(true){
        $Pdata = getPost();
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['postid'].'</td>
                <td class="px-2 py-1  ">'.$data['username'].'</td>
                <td class="px-2 py-1  ">'.$data['text'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['ptpic'].'" target="_thapa">'.$data['ptpic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deletePost('.$data['postid'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }
            
        $json['adminPtableList']=$row;
    }

    
    echo json_encode($json);
}
if(isset($_GET['getadminHtable'])){

    if(true){
        $Pdata = getHelpPost();
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Topic</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['helpID'].'</td>
                <td class="px-2 py-1  ">'.$data['topic'].'</td>
                <td class="px-2 py-1  ">'.$data['helpTxt'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['helpPic'].'" target="_thapa">'.$data['helpPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteHelp('.$data['helpID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }
            
        $json['adminHtableList']=$row;
    }

    
    echo json_encode($json);
}
if(isset($_GET['getadminAtable'])){

    if(true){
        $Pdata = getAllAnswers();
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $usr = getUser($data['by_user_id']);
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['ansID'].'</td>
                <td class="px-2 py-1  ">'.$usr['username'].'</td>
                <td class="px-2 py-1  ">'.$data['ansTxt'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['ansPic'].'" target="_thapa">'.$data['ansPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteAnswer('.$data['ansID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }   
        $json['adminAtableList']=$row;
    }

    
    echo json_encode($json);
}
if(isset($_GET['getadminUtable'])){

    if(true){
        $Pdata = getadminAllUser();
        $row='  
        <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">Email</td>
            <td class="px-2 py-1  ">fullname</td>
            <td class="px-2 py-1  ">Profile picture</td>
            <td class="px-2 py-1  ">Control</td>
        </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['userID'].'</td>
                <td class="px-2 py-1  ">'.$data['username'].'</td>
                <td class="px-2 py-1  ">'.$data['email'].'</td>
                <td class="px-2 py-1  ">'.$data['name'].'</td>
                <td class="px-2 py-1  "><img src="/QUEUE/assets/image/posts/'.$data['ppic'].'" class="h-7 w-7"></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteUser('.$data['userID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
        }   
        $json['adminUtableList']=$row;
    }

    
    echo json_encode($json);
}
if(isset($_GET['getadminRoom'])){

    if(true){
        $Pdata = getadminAllRoom();
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
                <td class="px-2 py-1  ">ID</td>
                <td class="px-2 py-1  ">Room admin</td>
                <td class="px-2 py-1  ">Discussion topic</td>
                <td class="px-2 py-1  ">Room DP</td>
                <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $usr = getUser($data['adminID']);
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['roomID'].'</td>
                <td class="px-2 py-1  ">'.$usr['username'].'</td>
                <td class="px-2 py-1  ">'.$data['room_name'].'</td>
                <td class="px-2 py-1  "><a href="/QUEUE/assets/image/posts/'.$data['roomPic'].'" target="_thapa">'.$data['roomPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteRoom('.$data['roomID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
        }   
        $json['adminRtableList']=$row;
    }

    
    echo json_encode($json);
}

if(isset($_GET['adminPSearch'])){
    //$in = $_POST(['input']);
    if(true){
        $Pdata = getadminPSearch($_POST['input']);
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['postid'].'</td>
                <td class="px-2 py-1  ">'.$data['username'].'</td>
                <td class="px-2 py-1  ">'.$data['text'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['ptpic'].'" target="_thapa">'.$data['ptpic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deletePost('.$data['postid'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }
            
        $json['adminPtable']=$row;
    }    
    echo json_encode($json);
    
}
if(isset($_GET['adminHSearch'])){

    if(true){
        $Pdata = getadminHSearch($_POST['input']);
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Topic</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['helpID'].'</td>
                <td class="px-2 py-1  ">'.$data['topic'].'</td>
                <td class="px-2 py-1  ">'.$data['helpTxt'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['helpPic'].'" target="_thapa">'.$data['helpPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteHelp('.$data['helpID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }
            
        $json['adminHtableList']=$row;
    }

    
    echo json_encode($json);
}
if(isset($_GET['adminASearch'])){

    if(true){
        $Pdata = getadminASearch($_POST['input']);
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">caption</td>
            <td class="px-2 py-1  ">files</td>
            <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $usr = getUser($data['by_user_id']);
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['ansID'].'</td>
                <td class="px-2 py-1  ">'.$usr['username'].'</td>
                <td class="px-2 py-1  ">'.$data['ansTxt'].'</td>
                <td class="px-2 py-1  hover:text-emerald-600 cursor-pointer"><a href="/QUEUE/assets/image/posts/'.$data['ansPic'].'" target="_thapa">'.$data['ansPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteAnswer('.$data['ansID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button>
                </td>
            </tr>';
        }   
        $json['adminAtableList']=$row;
    }

    
    echo json_encode($json);
}

if(isset($_GET['adminUSearch'])){

    if(true){
        $Pdata = getadminUSearch($_POST['input']);
        $row='  
        <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
            <td class="px-2 py-1  ">ID</td>
            <td class="px-2 py-1  ">Username</td>
            <td class="px-2 py-1  ">Email</td>
            <td class="px-2 py-1  ">fullname</td>
            <td class="px-2 py-1  ">Profile picture</td>
            <td class="px-2 py-1  ">Control</td>
        </tr>';
        foreach($Pdata as $data){
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['userID'].'</td>
                <td class="px-2 py-1  ">'.$data['username'].'</td>
                <td class="px-2 py-1  ">'.$data['email'].'</td>
                <td class="px-2 py-1  ">'.$data['name'].'</td>
                <td class="px-2 py-1  "><img src="/QUEUE/assets/image/posts/'.$data['ppic'].'" class="h-7 w-7"></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteUser('.$data['userID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
        }   
        $json['adminUtableList']=$row;
    }

    
    echo json_encode($json);
}

if(isset($_GET['adminRSearch'])){

    if(true){
        $Pdata = getadminRSearch($_POST['input']);
        $row='  
            <tr class="border bg-slate-200 text-slate-600 font-medium text-xl">
                <td class="px-2 py-1  ">ID</td>
                <td class="px-2 py-1  ">Room admin</td>
                <td class="px-2 py-1  ">Discussion topic</td>
                <td class="px-2 py-1  ">Room DP</td>
                <td class="px-2 py-1  ">Control</td>
            </tr>';
        foreach($Pdata as $data){
            $usr = getUser($data['adminID']);
            $row.='
            <tr class="border hover:bg-slate-100">
                <td class="px-2 py-1  ">'.$data['roomID'].'</td>
                <td class="px-2 py-1  ">'.$usr['username'].'</td>
                <td class="px-2 py-1  ">'.$data['room_name'].'</td>
                <td class="px-2 py-1  "><a href="/QUEUE/assets/image/posts/'.$data['roomPic'].'" target="_thapa">'.$data['roomPic'].'</a></td>
                <td class="px-2 py-1  ">
                    <button onclick="deleteRoom('.$data['roomID'].')"
                        class=" bg-red-500 text-white rounded shadow-md px-2 py-1 text-sm hover:bg-red-600">
                        Delete</button></td>
            </tr>';
        }   
        $json['adminRtableList']=$row;
    }

    
    echo json_encode($json);
}


if(isset($_GET['getAdminmessages'])){
    $chats = getAdminConversation();
    $chatlist="";
    foreach($chats as $chat){
        $ch_user = getUser($chat['user_id']);

        $chatlist.='  
            <div data-bs-target="#adminChatlist" onclick="popAdminchat('.$ch_user['userID'].')"
                class="cursor-pointer h-fit w-full bg-transparent mt-1 hover:rounded-md hover:bg-[#09ada8]/20 pl-2 py-2 flex justify-start items-start ">
                <div class="w-11 h-11 mt-[3px] rounded-full overflow-hidden"><img
                        src="/QUEUE/assets/image/posts/'.$ch_user['ppic'].'" alt="" class="object-cover w-full h-full">
                </div>
                <div class="max-w-[200px]">
                    <p class="pl-2 text-gray-800 font-medium">'.$ch_user['name'].'</p>
                    <p class="pl-2 text-gray-400 text-sm overflow-hidden max-w-[200px]">'.$chat['msg'].'
                    </p>
                    <p class="pl-2 text-gray-600 text-xs">
                        '.timeAgoOwn($chat['send_at']).'
                    </p>

                </div>
            </div>

        ';


    }
    $json['adminchatlist'] = $chatlist;



    if(isset($_POST['id']) && $_POST['id']!=0){
        
        $messages = getAdminMessages($_POST['id']);
        $chatmsg="";

        // updateMessageReadStatus($_POST['chatter_id']);

        foreach($messages as $cm){
            if($cm['from_userID'] == NULL){
                $admin = getAdminDetail($cm['admin_id']);
                $chatmsg.='
                <div class="w-fit my-1 ml-auto max-w-[36rem] group cursor-pointer">
                <div
                class=" bg-violet-500 text-white  rounded-tl-3xl rounded-tr-3xl rounded-bl-3xl rounded-br-md w-fit ml-auto py-2 px-4">
                <p class="h-fit">'.$cm['msg'].'</p>
                </div>
                <p class="text-xs my-1 w-fit ml-auto hidden group-hover:block">Replyed by: '.$admin['username'].'</p>
                </div>
                ';

            }else{
                $chatmsg.='<div 
                class=" bg-violet-100 text-gray-800 w-fit h-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-md rounded-br-3xl my-1 max-w-[36rem] py-2 px-4">
                    <p class="h-fit">'.$cm['msg'].'</p>
                    </div>';
            }

        
        }
        $json['chat']['msgs']=$chatmsg;
        $json['chat']['userdata']=getUser($_POST['id']);
    }else{
        $json['chat']['msgs']='<div class="spinner-border text-center" role="status">
        </div>';
    }

    //$json['newmsgcount']=newMsgCount();
    echo json_encode($json);
}
if(isset($_GET['dropMessages'])){
    
    $messages = getDropMessages();
    $chatmsg="";

    foreach($messages as $cm){
        if($cm['from_userID'] !== NULL){
            $chatmsg.='<div
            class=" bg-[#09ada7d8] text-white w-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-3xl rounded-br-md my-1 ml-auto max-w-[400px] py-2 px-4">
            <p class="h-fit">'.$cm['msg'].'</p>
            </div>';

        }else{
            $chatmsg.='<div 
            class=" bg-violet-100 text-gray-800 w-fit h-fit min-h-10 rounded-tl-3xl rounded-tr-3xl rounded-bl-md rounded-br-3xl my-1 max-w-[400px] py-2 px-4">
                <p class="h-fit">'.$cm['msg'].'</p>
                </div>';
        }

    
    }
    $json['chat']['msgs']=$chatmsg;
    $json['chat']['userdata']=getUser($_POST['id']);

    //$json['newmsgcount']=newMsgCount();
    echo json_encode($json);
}







?>