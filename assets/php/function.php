<?php
// global $userProfile;
require_once 'config.php';
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die("database is not connected");

function showPage($page,$data=""){
    include("assets/pages/$page.php");
}

function validateSignupForm($form_data){
    $response=array();
    $response['status']=true;
      
    // if(!$form_data['pswd']){
    //     $response['msg']="password is not given";
    //     $response['status']=false;
    //     $response['field']='password';
    // }
    if(isEmailRegistered($form_data['email'])){
         $response['msg']="email id is already registered";
         $response['status']=false;
        $response['field']='email';
    }
    if(isUsernameRegistered($form_data['username'])){
       $response['msg']="username is already registered";
       $response['status']=false;
       $response['field']='username';
    }
    return $response;    
}
function isEmailRegistered($email){
    global $db;
    $query="SELECT count(*) as row FROM user WHERE email='$email'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function isUsernameRegistered($username){
    global $db;
    $query="SELECT count(*) as row FROM user WHERE username='$username'";
    $run=mysqli_query($db,$query);
    $return_data = mysqli_fetch_assoc($run);
    return $return_data['row'];
}

function createUser($data,$tempPass){
    global $db;
    $email = mysqli_real_escape_string($db,$data['email']);
    $username = mysqli_real_escape_string($db,$data['username']);
    $name = mysqli_real_escape_string($db,$data['name']);
    //$password = mysqli_real_escape_string($db,$data['pswd']);
    $password = $tempPass;
    $password = md5($password);
    $query = "INSERT INTO user (username, email, name, pass) VALUES ('$username', '$email','$name','$password');";
    return mysqli_query($db, $query);
}
 
function validateLoginForm($form_data){
    $response=array();
    $response['status']=true;
    $blank=false;

    if(!$blank && !checkUser($form_data)['status'] ){
        $response['msg']="something is incorrect, we can't find you";
        $response['status']=false;
        $response['field']='checkuser';
    }else{
        $response['user']=checkUser($form_data)['user'];
    }
    
        
    return $response;
    
}
function validateAdminLoginForm($form_data){
    $response=array();
    $response['status']=true;
    $blank=false;

    if(!$blank && !checkAdmin($form_data)['status'] ){
        $response['msg']="something is incorrect, we can't find you";
        $response['status']=false;
        $response['field']='checkuser';
    }else{
        $response['admin']=checkAdmin($form_data)['admin'];
    }
    
        
    return $response;
    
}
function checkAdmin($login_data){
    global $db;
    $username = $login_data['uname'];
    $password=$login_data['password'];

    $query = "SELECT * FROM admin WHERE username='$username' && password='$password'";
    $run = mysqli_query($db,$query);
    $data['admin'] = mysqli_fetch_assoc($run)??array();
    if(count($data['admin'])>0){
        $data['status']=true;
    }else{
    $data['status']=false;

    }
    return $data;
}
function checkUser($login_data){
    global $db;
    $username_email = $login_data['email'];
    $password=md5($login_data['pswd']);

    $query = "SELECT * FROM user WHERE email='$username_email' && pass='$password'";
    $run = mysqli_query($db,$query);
    $data['user'] = mysqli_fetch_assoc($run)??array();
    if(count($data['user'])>0){
        $data['status']=true;
    }else{
    $data['status']=false;

    }
    return $data;
}
function changeName($data){
    global $db;
    $name = $data['name'];
    if($name !== ""){
        $id = $_SESSION['userdata']['userID'];
        $query = "UPDATE user SET name='$name' WHERE userID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function changeAdminName($data){
    global $db;
    $name = $data['name'];
    if($name !== ""){
        $id = $_SESSION['admindata']['adminID'];
        $query = "UPDATE admin SET name='$name' WHERE adminID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function changeAdminUserame($data){
    global $db;
    $name = $data['username'];
    if($name !== ""){
        $id = $_SESSION['admindata']['adminID'];
        $query = "UPDATE admin SET username='$name' WHERE adminID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function changeAdminPass($data){
    global $db;
    $pass = $data['pswd'];
    if($name !== ""){
        $id = $_SESSION['admindata']['adminID'];
        $query = "UPDATE admin SET password='$pass' WHERE adminID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function changeGender($data){
    global $db;
    $gen = $data['gender'];
    if($gen !== ""){
        $id = $_SESSION['userdata']['userID'];
        $query = "UPDATE user SET gender='$gen' WHERE userID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function validateUsername($form_data){
    $response=array();
    $response['status']=true;
      
    if(isUsernameRegistered($form_data['username'])){
       $response['msg']="username is already registered";
       $response['status']=false;
       $response['field']='username';
    }
    return $response;    
}
function changeUsername($data){
    
    global $db;
    $name = $data['username'];
    if($name !== ""){
        $id = $_SESSION['userdata']['userID'];
        $query = "UPDATE user SET username='$name' WHERE userID='$id'";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function changePassword($data){
    
    global $db;
    $pas = $data['pswd'];
    if($pas !== ""){
        $pas = md5($pas);
        $id = $_SESSION['userdata']['userID'];
        $query = "UPDATE user SET pass='$pas' WHERE userID='$id';";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function updatePassword($data,$otp){
    
    global $db;
    $mail = $data['email'];
    if($otp !== ""){
        $otp = md5($otp);
        $query = "UPDATE user SET pass='$otp' WHERE email ='$mail';";
        return mysqli_query($db, $query);
    }else{
        return true;
    }
    
    
}
function getUser($user_id){
    global $db;
    $query = "SELECT * FROM user WHERE userID='$user_id'";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run);

}
function getAllAnswers(){
    global $db;
    $query = "SELECT * FROM `answer` WHERE 1;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminChatSearch($searchBy){
    global $db;
    $query = "SELECT *
            FROM (
                SELECT *, 
                    ROW_NUMBER() OVER (PARTITION BY user_id ORDER BY ID DESC) AS rn
                FROM (
                    SELECT *, `from_userID` AS user_id
                    FROM `adminMsg`
                    WHERE `from_userID` IS NOT NULL
                    UNION ALL
                    SELECT *, `to_userID` AS user_id
                    FROM `adminMsg`
                    WHERE `to_userID` IS NOT NULL
                ) AS combined
            ) AS ranked
            WHERE rn = 1 AND (to_userID LIKE '%$searchBy%' OR to_userID LIKE '%$searchBy%')
            ORDER BY ID DESC;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminPSearch($searchBy){
    global $db;
    $query = "SELECT user.userID, user.username, user.ppic, post.text, post.ptpic,post.time,post.postid
    FROM user
    JOIN post ON user.userID = post.userID
    WHERE postid LIKE '%$searchBy%' OR text LIKE '%$searchBy%' OR username LIKE '%$searchBy%' OR ptpic LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminHSearch($searchBy){
    global $db;
    $query ="SELECT * FROM help_post
    WHERE helpID LIKE '%$searchBy%' OR helpTxt LIKE '%$searchBy%' OR 
    topic LIKE '%$searchBy%' OR helpPic LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminASearch($searchBy){
    global $db;
    $query ="SELECT * FROM user RIGHT JOIN answer
	ON user.userID= answer.by_user_id 
	WHERE username LIKE '%$searchBy%' OR ansID LIKE '%$searchBy%' OR ansTxt LIKE '%$searchBy%' OR 
    ansPic LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminUSearch($searchBy){
    global $db;
    $query ="SELECT * FROM user
	WHERE username LIKE '%$searchBy%' OR userID LIKE '%$searchBy%' 
    OR email LIKE '%$searchBy%' OR name LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminRSearch($searchBy){
    global $db;
    $query ="SELECT * FROM user RIGHT JOIN room
	ON user.userID= room.adminID 
	WHERE username LIKE '%$searchBy%' OR room_name LIKE '%$searchBy%' OR roomPic LIKE '%$searchBy%' OR 
    roomID LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}

function getAllChatUser($searchBy){
    global $db;
    $query = "SELECT * FROM user WHERE username LIKE '%$searchBy%' OR name LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getAllHelpPost($searchBy){
    global $db;
    $query = "SELECT * FROM help_post WHERE topic LIKE '%$searchBy%' OR helpTxt LIKE '%$searchBy%';";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getQuestionSearch($searchBy,$userid){
    global $db;
    //$id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM questions WHERE q_name LIKE '%$searchBy%' AND user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function getNoteSearch($searchBy,$userid){
    global $db;
    //$id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM notes WHERE note_name LIKE '%$searchBy%' AND user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function getPdataSearch($searchBy,$userid){
    global $db;
    //$id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM private_files WHERE file_name LIKE '%$searchBy%' AND user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function getAllroomUserSearch($searchBy){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT *
        FROM room
        WHERE roomID NOT IN (
            SELECT DISTINCT roomID
            FROM (
                SELECT room.roomID, room_message.user_id
                FROM room
                LEFT JOIN room_message ON room.roomID = room_message.msg_roomID
                UNION
                SELECT room.roomID, room_message.user_id
                FROM room
                RIGHT JOIN room_message ON room.roomID = room_message.msg_roomID
            ) AS combined_results
            WHERE adminID = $id OR user_id = $id
        )
        AND room_name LIKE '%$searchBy%';";

    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getHelpPost(){
    global $db;
    $query = "SELECT help_post.*, COUNT(answer.helpID) AS answer_count 
    FROM help_post LEFT JOIN answer ON help_post.helpID = answer.helpID GROUP BY help_post.helpID ORDER BY help_post.helpID DESC;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getAllUser(){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM user WHERE userId<>'$id' ORDER BY RAND() LIMIT 15;";
    //$query = "SELECT * FROM user;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getAdminDetail($id){
    global $db;
    $query = "SELECT * FROM admin WHERE adminID = '$id';";
    //$query = "SELECT * FROM user;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_assoc($run);

}
function getadminAllUser(){
    global $db;
    $query = "SELECT * FROM user WHERE 1;";
    //$query = "SELECT * FROM user;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getadminAllRoom(){
    global $db;
    $query = "SELECT * FROM room WHERE 1;";
    //$query = "SELECT * FROM user;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function validatePostImage($image_data){
    $response=array();
    $response['status']=true;
      

    if(!$image_data['name']){
        $response['msg']="no image is selected";
        $response['status']=false;
        $response['field']='post_img';
    }
    
    if($image_data['name']){
        $image = basename($image_data['name']);
        $type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
        $size = $image_data['size']/1000;

        if($type!='jpg' && $type!='jpeg' && $type!='png'){
        $response['msg']="only jpg,jpeg,png images are allowed";
        $response['status']=false;
        $response['field']='post_img';
    }

    // if($size>2000){
    //     $response['msg']="upload image less then 1 mb";
    //     $response['status']=false;
    //     $response['field']='post_img';
    // }
    }

    return $response;

}
function changeAdminProfilePic($image){
    global $db;
    $id = $_SESSION['admindata']['adminID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);
            
    $query = "UPDATE admin SET pic='$image_name' WHERE adminID='$id'"; 
    return mysqli_query($db,$query);
}

function changeProfilePic($image){
    global $db;
    $id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);
            
    $query = "UPDATE user SET ppic='$image_name' WHERE userID='$id'"; 
    return mysqli_query($db,$query);
}

function changeRoomPic($image,$ro){
    global $db;

    $image_name = time().basename($image['name']);
    $image_dir="../image/posts/$image_name";
    move_uploaded_file($image['tmp_name'],$image_dir);
    $query = "UPDATE room SET roomPic='$image_name' WHERE roomID=$ro"; 
    return mysqli_query($db,$query);
}
function uploadnewQuestion($file,$nam){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $file_name = time().basename($file['name']);
    $file_dir="../image/posts/$file_name";
    move_uploaded_file($file['tmp_name'],$file_dir);
    $query = "INSERT INTO questions(user_id, q_name, q_file) VALUES ('$id','$nam','$file_name');"; 
    return mysqli_query($db,$query);
}
function uploadnewPfile($file,$nam){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $file_name = time().basename($file['name']);
    $file_dir="../image/posts/$file_name";
    move_uploaded_file($file['tmp_name'],$file_dir);
    $query = "INSERT INTO private_files (user_id, file_name, file) VALUES ('$id','$nam','$file_name');"; 
    return mysqli_query($db,$query);
}
    //for creating new user
function createPost($text,$image){
    global $db;
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);
            
    

    $query = "INSERT INTO post (userID, text , ptpic) VALUES ('$user_id','$post_text','$image_name')"; 
    return mysqli_query($db,$query);
}
function createPostOnlyTxt($text){
    global $db;
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

    $query = "INSERT INTO post (userID, text) VALUES ('$user_id','$post_text')"; 
    if($post_text!="" || !empty($post_text) || !$post_text === null){
        return mysqli_query($db,$query);
    }
    else return false;
    
}
function createHelpPost($text,$image){
    global $db;
    $post_topic = mysqli_real_escape_string($db,$text['post_topic']);
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);
            
    

    $query = "INSERT INTO help_post (userID, topic, helpTxt, helpPic) VALUES ('$user_id','$post_topic','$post_text','$image_name')";
    return mysqli_query($db,$query);
}
function createHelpPostOnlyTxt($text){
    global $db;
    $post_topic = mysqli_real_escape_string($db,$text['post_topic']);
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

    $query = "INSERT INTO help_post (userID, topic, helpTxt) VALUES ('$user_id','$post_topic','$post_text')"; 
    if($post_text!=="" || !empty($post_text) || $post_text !== null){
        return mysqli_query($db,$query);
    }
    else {
        return false;
    }
}
function createNote($text,$image){
    global $db;
    $post_name = mysqli_real_escape_string($db,$text['post_name']);
    $user_id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);

    $query = "INSERT INTO notes (user_id, note_name, noteThumbnail) VALUES ('$user_id','$post_name','$image_name')";
    return mysqli_query($db,$query);
}
// function createNote($text, $image){
//     global $db;
//     $post_name = mysqli_real_escape_string($db, $text['post_name']);
//     $user_id = $_SESSION['userdata']['userID'];

//     // Validate the uploaded file
//     $allowed_types = ['image/jpeg','image/jpg', 'image/png', 'image/gif'];
//     if (!in_array($image['type'], $allowed_types)) {
//         return false;
//     }

//     // Check for upload errors
//     if ($image['error'] !== UPLOAD_ERR_OK) {
//         return "File upload error: " . $image['error'];
//     }

//     // Ensure file size is within limits
//     $max_file_size = 100 * 1024 * 1024; // 100 MB
//     if ($image['size'] > $max_file_size) {
//         return false;
//     }

//     // Read the file content into a variable
//     $image_content = file_get_contents($image['tmp_name']);
//     $image_content = mysqli_real_escape_string($db, $image_content);

//     // Construct the SQL query
//     $query = "INSERT INTO notes (user_id, note_name, noteThumbnail1) VALUES ('$user_id', '$post_name', '$image_content')";

//     // Execute the query
//     if (mysqli_query($db, $query)) {
//         return true;
//     } else {
//         return false;
//     }
// }

function createNotePage($id,$image){
    global $db;
    //$post_name = mysqli_real_escape_string($db,$text['post_name']);
    //$user_id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);

    $query = "INSERT INTO note_files (note_id, note_file) VALUES ('$id','$image_name')";
    return mysqli_query($db,$query);
}
function createnoteOnlyTxt($text){
    global $db;
    $post_name = mysqli_real_escape_string($db,$text['post_name']);
    $user_id = $_SESSION['userdata']['userID'];

    $query = "INSERT INTO note_files (ntID,user_id, note_name) VALUES ('$user_id','$post_name')";
    if($post_name!=="" || !empty($post_name) || is_null($post_name)){
        return mysqli_query($db,$query);
    }
    else {
        return false;
    }
}
function createAnswer($text,$image,$hid){
    global $db;
    //$help_id = mysqli_real_escape_string($db,'2');
    $post_topic = mysqli_real_escape_string($db,$text['post_topic']);
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

        $image_name = time().basename($image['name']);
        $image_dir="../image/posts/$image_name";
        move_uploaded_file($image['tmp_name'],$image_dir);

        // $query1 = "SELECT by_user_id FROM answer WHERE helpID = '$hid';";
        // $result1 = mysqli_query($db, $query1);
        // $row1 = mysqli_fetch_assoc($result1);
        // $by = $row1['by_user_id'];

        $query2 = "SELECT userID FROM help_post WHERE helpID = '$hid';";
        $result2 = mysqli_query($db, $query2);
        $row2 = mysqli_fetch_assoc($result2);
        $to = $row2['userID'];
        
        $txt = " submit a new answer to your ";
        $query3 = "INSERT INTO `notification`(`dest_user_id`, `by_user_id`, `text`, answer_link) VALUES ('$to','$user_id','$txt','$hid');";
        $result3 = mysqli_query($db, $query3);

    $query = "INSERT INTO answer (helpID, by_user_id, ansTxt, ansPic) VALUES ('$hid','$user_id','$post_text','$image_name')";
    return mysqli_query($db,$query);
}
function createAnswerOnlyTxt($text,$hid){
    global $db;
    $post_topic = mysqli_real_escape_string($db,$text['post_topic']);
    $post_text = mysqli_real_escape_string($db,$text['post_text']);
    $user_id = $_SESSION['userdata']['userID'];

    $query = "INSERT INTO answer (helpID,by_user_id, ansTxt) VALUES ('$hid','$user_id', '$post_text');"; 
    if($post_text!=="" || !empty($post_text) || $post_text !== null){

        // $query1 = "SELECT by_user_id FROM answer WHERE helpID = '$hid';";
        // $result1 = mysqli_query($db, $query1);
        // $row1 = mysqli_fetch_assoc($result1);
        // $by = $row1['by_user_id'];

        $query2 = "SELECT userID FROM help_post WHERE helpID = '$hid';";
        $result2 = mysqli_query($db, $query2);
        $row2 = mysqli_fetch_assoc($result2);
        $to = $row2['userID'];
        
        $txt = " submit a new answer to your ";
        $query3 = "INSERT INTO `notification`(`dest_user_id`, `by_user_id`, `text`, answer_link) VALUES ('$to','$user_id','$txt','$hid');";
        $result3 = mysqli_query($db, $query3);

        return mysqli_query($db,$query);
    }
    else {
        return false;
    }
}



function getPost(){
    global $db;
    $query = "SELECT user.userID, user.name, user.ppic, post.text, post.ptpic,post.time,post.postid
    FROM user
    JOIN post ON user.userID = post.userID ORDER BY post.postid DESC;";

    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getProfilePost($user_id){
    global $db;
    //$user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT * 
    FROM (
        SELECT user.userID, user.username, user.ppic,user.name, post.text, post.ptpic, post.time, post.postid
        FROM user
        LEFT JOIN post ON user.userID = post.userID 
    ) AS subquery
    WHERE subquery.userID='$user_id'
    ORDER BY subquery.postid DESC;";

    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}
function getAns($help_id){
    global $db;
    //$user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT help_post.*, answer.* ,
    ROW_NUMBER() OVER (ORDER BY answer.ansID DESC) AS row_number
    FROM help_post
    LEFT JOIN answer ON help_post.helpID = answer.helpID
    WHERE help_post.helpID='$help_id';";

    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);

}

function gettime($date){
    return date('H:i - (F jS, Y)', strtotime($date));
}

function getHelpPostById(){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM help_post WHERE userID='$user_id' ORDER BY helpID DESC;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}


function getActiveChatUserIds(){
    global $db;
    $current_user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT from_user_id,to_user_id FROM message WHERE to_user_id=$current_user_id || from_user_id=$current_user_id ORDER BY id DESC";
    $run = mysqli_query($db,$query);
    $data =  mysqli_fetch_all($run,true);
    $ids=array();
    foreach($data as $ch){
    if($ch['from_user_id']!=$current_user_id && !in_array($ch['from_user_id'],$ids)){
       $ids[]=$ch['from_user_id'];
    }

    if($ch['to_user_id']!=$current_user_id && !in_array($ch['to_user_id'],$ids)){
        $ids[]=$ch['to_user_id'];
     }

    }

    return $ids;
}


function getMessages($user_id){
    global $db;
    $current_user_id = $_SESSION['userdata']['userID'];
    //$query = "SELECT * FROM message WHERE (to_user_id=$current_user_id && from_user_id=$user_id) || (from_user_id=$current_user_id && to_user_id=$user_id) ORDER BY id DESC";
    $query = "SELECT * 
    FROM message 
    WHERE 
        ((to_user_id = $current_user_id AND from_user_id = $user_id) 
        OR 
        (from_user_id = $current_user_id AND to_user_id = $user_id)) 
        AND msg IS NOT NULL 
    ORDER BY id DESC;";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}

function getAdminMessages($user_id){
    global $db;
    $query = "SELECT * FROM adminMsg WHERE (to_userID = '$user_id') OR (from_userID = '$user_id') AND msg IS NOT NULL ORDER BY ID DESC;";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getDropMessages(){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM adminMsg WHERE (to_userID = '$user_id') OR (from_userID = '$user_id') AND msg IS NOT NULL ORDER BY ID DESC;";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}

function getAllMessages(){
    $active_chat_ids = getActiveChatUserIds();
    $conversation=array();
    foreach($active_chat_ids as $index=>$id){
        $conversation[$index]['user_id'] = $id;
        $conversation[$index]['messages'] = getMessages($id);
    }
    return $conversation;
}
function sendMessage($user_id,$msg){
    global $db;
    $current_user_id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO message (from_user_id,to_user_id,msg) VALUES($current_user_id,$user_id,'$msg')";
    return mysqli_query($db,$query);

}
function sendRoomMsg($room_id,$msg){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO room_message (msg_roomID, user_id, msg) VALUES ($room_id, $user_id , '$msg');";
    return mysqli_query($db,$query);

}
function sendAdminMsg($user_id,$msg){
    global $db;
    $id = $_SESSION['admindata']['adminID'];
    $query = "INSERT INTO adminMsg (to_userID, admin_id, msg) VALUES ('$user_id','$id','$msg');";
    return mysqli_query($db,$query);

}
function sendDropMsg($msg){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO adminMsg (from_userID, msg) VALUES ('$user_id','$msg');";
    return mysqli_query($db,$query);

}
function createConversionChat($user_id){
    global $db;
    $current_user_id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO message (from_user_id,to_user_id) VALUES($current_user_id,$user_id)";
    return mysqli_query($db,$query);

}
function addNewEvent($fr,$to,$txt){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO  event ( user_id, frm, till, descrip) VALUES ('$id','$fr','$to','$txt');";
    return mysqli_query($db,$query);

}
function expiredEvent(){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM event WHERE till < NOW() AND user_id = '$id' ORDER BY till DESC;"; 
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
    
}
function ongoingEvent(){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM event WHERE frm < NOW() AND till > NOW() AND user_id = '$id' ORDER BY till ASC;"; 
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
    
}
function upcomingEvent(){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT * FROM event WHERE frm > NOW() AND till > NOW() AND user_id = '$id' ORDER BY frm ASC;"; 
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
    
}
function joinRoom($room_id){
    global $db;
    $current_user_id = $_SESSION['userdata']['userID'];
    $query = "INSERT INTO room_message (msg_roomID,user_id) VALUES($room_id,$current_user_id)";
    return mysqli_query($db,$query);

}

function newMsgCount(){
global $db;
$current_user_id = $_SESSION['userdata']['userID'];
$query="SELECT COUNT(*) as row FROM message WHERE to_user_id=$current_user_id && read_status=0";
$run=mysqli_query($db,$query);
return mysqli_fetch_assoc($run)['row'];
}

function updateMessageReadStatus($user_id){
    $cu_user_id = $_SESSION['userdata']['userID'];
    global $db;
    $query="UPDATE message SET read_status=1 WHERE to_user_id=$cu_user_id && from_user_id=$user_id";
    return mysqli_query($db,$query);
}
function getLikeByUser($post){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT COUNT(*) AS like_count FROM likes WHERE user_id = '$id' AND post_id ='$post';";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['like_count'];
}

function updateLike($post){
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query = "SELECT COUNT(*) AS like_count FROM likes WHERE user_id = '$id' AND post_id ='$post';";
    $query1 = "INSERT INTO likes( user_id, post_id) VALUES ('$id','$post');";
    $query2 = "DELETE FROM likes WHERE user_id = '$id' AND post_id ='$post';";
    $query3 = "SELECT userID FROM post WHERE postid = '$post';";

    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $likeCount = $row['like_count'];


    if($likeCount > 0){
        return mysqli_query($db,$query2);
    }
    else {
        $result1 = mysqli_query($db, $query3);
        $row1 = mysqli_fetch_assoc($result1);
        $destUser = $row1['userID'];
        $txt = "likes your post";
        $query4 = "INSERT INTO `notification`(`dest_user_id`, `by_user_id`, `text`) VALUES ('$destUser','$id','$txt');";
        $result2 = mysqli_query($db, $query4);
        return mysqli_query($db,$query1);
    }
}
function getLike($post){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];

    $query = "SELECT COUNT(*) AS like_count FROM likes WHERE post_id = '$post';"; 
    
    if($post !== ""){
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['like_count'];
    }
    else {
        return false;
    }
}
function countUser(){
    global $db;
    $query = "SELECT COUNT(*) AS count FROM `user`;"; 
    $run = mysqli_query($db, $query);
    return mysqli_fetch_assoc($run);
}
function countPost(){
    global $db;
    $query = "SELECT COUNT(*) AS count FROM `post`;"; 
    $run = mysqli_query($db, $query);
    return mysqli_fetch_assoc($run);
}
function countHelp(){
    global $db;
    $query = "SELECT COUNT(*) AS count FROM `help_post`;"; 
    $run = mysqli_query($db, $query);
    return mysqli_fetch_assoc($run);
}
function countAnswer(){
    global $db;
    $query = "SELECT COUNT(*) AS count FROM `answer`;"; 
    $run = mysqli_query($db, $query);
    return mysqli_fetch_assoc($run);
}
function getNotification(){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];

    $query = "SELECT * FROM `notification` WHERE `dest_user_id` = '$user_id' ORDER BY nID DESC; "; 
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
    
}

function createRoom($text){
    global $db;
    $roomName = mysqli_real_escape_string($db,$text['post_txt']);
    $user_id = $_SESSION['userdata']['userID'];

    $query = "INSERT INTO room (adminID, room_name) VALUES ('$user_id', '$roomName');"; 
    
    if($roomName !== ""){
        return mysqli_query($db,$query);
    }
    else {
        return false;
    }
}
function adminDeleteFromPost($post_id){
    global $db;
    $query="DELETE FROM post WHERE postid='$post_id';";
    return mysqli_query($db,$query);
}
function adminDeleteFromHelp($post_id){
    global $db;
    $query="DELETE FROM help_post WHERE helpID='$post_id';";
    return mysqli_query($db,$query);
}
function adminDeleteFromAnswer($post_id){
    global $db;
    $query="DELETE FROM answer WHERE ansID='$post_id';";
    return mysqli_query($db,$query);
}
function adminDeleteFromUser($post_id){
    global $db;
    // $user = getUser($post_id);
    // $email = $user['email'];
    // $subject = "Queue account";
    // $body = "Your account is deleted by control center.";
    // sendsendCode($email,$subject,$body);
    $query="DELETE FROM user WHERE userID='$post_id';";
    return mysqli_query($db,$query);
}
function adminDeleteFromRoom($post_id){
    global $db;
    $query="DELETE FROM room WHERE roomID='$post_id';";
    return mysqli_query($db,$query);
}

function deleteFormRoom($roomid) {
    global $db;
    $id = $_SESSION['userdata']['userID'];
    // $query="START TRANSACTION;
    //         DELETE FROM `room` WHERE (adminID='$id' AND roomID='$roomid');
    //         DELETE FROM `room_message` WHERE (user_id='$id' AND msg_roomID='$roomid');
    //         COMMIT;";
    // return mysqli_query($db,$query);
    $startTransaction = mysqli_query($db, "START TRANSACTION");
    if (!$startTransaction) {
        return false;
    }
    $deleteRoom = mysqli_query($db, "DELETE FROM `room` WHERE adminID='$id' AND roomID='$roomid'");
    if (!$deleteRoom) {
        mysqli_query($db, "ROLLBACK");
        return false;
    }
    $deleteRoomMessage = mysqli_query($db, "DELETE FROM `room_message` WHERE user_id='$id' AND msg_roomID='$roomid'");
    if (!$deleteRoomMessage) {
        mysqli_query($db, "ROLLBACK");
        return false;
    }
    $commit = mysqli_query($db, "COMMIT");
    if (!$commit) {
        mysqli_query($db, "ROLLBACK");
        return false;
    }

    return true;
    
}
function deleteFromChat($chatid) {
    global $db;
    $id = $_SESSION['userdata']['userID'];
    $query="DELETE FROM message WHERE (from_user_id='$id' AND to_user_id='$chatid') 
    OR (from_user_id='$chatid' AND to_user_id='$id');";
    return mysqli_query($db,$query);

    
}
function deleteFromPfile($id) {
    global $db;
    //$id = $_SESSION['userdata']['userID'];
    $query="DELETE FROM private_files WHERE itemID='$id';";
    return mysqli_query($db,$query);

    
}
function getRoom(){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT *
    FROM (
        SELECT room.*,room_message.user_id
        FROM room
        LEFT JOIN room_message ON room.roomID = room_message.msg_roomID
        UNION
        SELECT room.*,room_message.user_id
        FROM room
        RIGHT JOIN room_message ON room.roomID = room_message.msg_roomID
    ) AS combined_results
    WHERE adminID = '$user_id' OR user_id = '$user_id' GROUP BY roomID;";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getAllnotes($id){
    global $db;
    $user_id = $_SESSION['userdata']['userID'];
    $query ="SELECT * FROM (
                SELECT *
                FROM notes
                LEFT JOIN note_files ON notes.noteID = note_files.note_id
                UNION
                SELECT *
                FROM notes
                RIGHT JOIN note_files ON notes.noteID = note_files.note_id)
            AS combined_results WHERE noteID='$id'";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
// function getRoom(){
//     global $db;
//     $query = "SELECT * FROM room WHERE 1";
//     $run = mysqli_query($db,$query);
//     return  mysqli_fetch_all($run,true);
// }
function getRoomMsg($room_id){
    global $db;
    //$user_id = $_SESSION['userdata']['userID'];
    $query = "SELECT *
    FROM (
        SELECT *
        FROM room
        LEFT JOIN room_message ON room.roomID = room_message.msg_roomID
        UNION
        SELECT *
        FROM room
        RIGHT JOIN room_message ON room.roomID = room_message.msg_roomID
    ) AS combined_results
    WHERE roomID='$room_id'
    ORDER BY id DESC";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getMember($room_id){
    global $db;
    
    $query = "SELECT user_id FROM room_message WHERE msg_roomID='$room_id' GROUP BY user_id";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getAdminConversation(){
    global $db;
    $query = "SELECT * FROM ( SELECT *, ROW_NUMBER() OVER (PARTITION BY user_id ORDER BY ID DESC) AS rn 
    FROM ( SELECT *, `from_userID` AS user_id FROM `adminMsg` WHERE `from_userID` IS NOT NULL UNION ALL SELECT *, `to_userID` AS user_id FROM `adminMsg` WHERE `to_userID` IS NOT NULL )
     AS combined ) AS ranked WHERE rn = 1 ORDER BY ID DESC;";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getnotebyid($userid){
    global $db;
    $query = "SELECT * FROM notes WHERE user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}

function getQdata($userid){
    global $db;
    $query = "SELECT * FROM questions WHERE user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}
function getPdata($userid){
    global $db;
    $query = "SELECT * FROM private_files WHERE user_id = '$userid'";
    $run = mysqli_query($db,$query);
    return  mysqli_fetch_all($run,true);
}

function changeVisibility($Qid){
    global $db;
    $query = "UPDATE questions SET Visibility = CASE WHEN Visibility = 0 THEN 1 ELSE 0 END WHERE qID = '$Qid';"; 
    if($Qid !== ""){
        return mysqli_query($db,$query);
    }
    else {
        return false;
    }
}
function getHelpforGraph(){
    global $db;
    $query = "SELECT DATE(`time`) AS day, COUNT(*) AS post_count FROM `help_post` GROUP BY day ORDER BY day;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function getAnsforGraph(){
    global $db;
    $query = "SELECT DATE(ans_time) AS day, COUNT(*) AS post_count FROM answer GROUP BY day ORDER BY day;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function getPostforGraph(){
    global $db;
    $query = "SELECT DATE(time) AS day, COUNT(*) AS post_count FROM post GROUP BY day ORDER BY day;";
    $run = mysqli_query($db,$query);
    return mysqli_fetch_all($run,true);
}
function timeLeft($futureDate) {
    // Define the timezone
    $timezone = new DateTimeZone('Asia/Dhaka'); // Example for UTC+06:00

    // Create DateTime objects with the specified timezone
    $now = new DateTime('now', $timezone);
    $future = new DateTime($futureDate, $timezone);
    $diff = $future->diff($now);

    if ($future < $now) return 'Time is up';

    $timeLeft = '';
    if ($diff->y > 0) {
        $timeLeft .= $diff->y . ' years ';
    }
    if ($diff->m > 0) {
        $timeLeft .= $diff->m . ' months ';
    }
    if ($diff->d > 0) {
        $timeLeft .= $diff->d . ' days ';
    }
    if ($diff->h > 0) {
        $timeLeft .= $diff->h . ' hours ';
    }
    if ($diff->i > 0) {
        $timeLeft .= $diff->i . ' minutes ';
    }
    if ($diff->s > 0) {
        $timeLeft .= $diff->s . ' seconds ';
    }

    return trim($timeLeft) . ' left';
}
function timeAgoOwn($pastDate) {
    // Define the timezone
    $timezone = new DateTimeZone('Asia/Dhaka'); // Example for UTC+06:00

    // Create DateTime objects with the specified timezone
    $now = new DateTime('now', $timezone);
    $past = new DateTime($pastDate, $timezone);
    $diff = $now->diff($past);

    if ($now < $past) return 'Just now';

    if ($diff->y > 0) return $diff->y . ' years ago';
    if ($diff->m > 0) return $diff->m . ' months ago';
    if ($diff->d > 0) return $diff->d . ' days ago';
    if ($diff->h > 0) return $diff->h . ' hours ago';
    if ($diff->i > 0) return $diff->i . ' minutes ago';
    return $diff->s . ' seconds ago';
}





?>