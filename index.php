<?php
require_once 'assets/php/function.php';
$timeout_duration = 1800;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();     
    session_destroy();   
}
$_SESSION['LAST_ACTIVITY'] = time(); 
if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > $timeout_duration) {  
    session_regenerate_id(true);    
    $_SESSION['CREATED'] = time();  
}

if(isset($_SESSION['Auth']) && $_SESSION['Admin'] === true){
    $adminDetail = getAdminDetail($_SESSION['admindata']['adminID']);
    if(isset($_GET['admin-dashboard'])){
        showPage('admin-header');
        showPage('admin-dashboard');
    }
    elseif(isset($_GET['admin-post'])){
        showPage('admin-header');
        showPage('admin-post');
    }
    elseif(isset($_GET['admin-help'])){
        showPage('admin-header');
        showPage('admin-help');
    }
    elseif(isset($_GET['admin-answer'])){
        showPage('admin-header');
        showPage('admin-answer');
    }
    elseif(isset($_GET['admin-user'])){
        showPage('admin-header');
        showPage('admin-user');
    }
    elseif(isset($_GET['admin-room'])){
        showPage('admin-header');
        showPage('admin-room');
    }
    elseif(isset($_GET['admin-chat'])){
        showPage('admin-header');
        showPage('admin-chat');
    }
    elseif(isset($_GET['admin-profile'])){
        //$adminDetail = getAdminDetail();
        showPage('admin-header');
        showPage('admin-profile');
    }
    else{
        showPage('admin-header');
        showPage('admin-dashboard');
    }
    
}elseif(isset($_SESSION['Auth']) && $_SESSION['User'] === true){
    $allUser = getAllUser();
    $userProfile = getUser($_SESSION['userdata']['userID']);
    $posts = getPost();
    if(isset($_GET['profile'])){
        $userid = $_GET['profile'];
        if($userid !== ''){
            $profilePosts = getProfilePost($userid);
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('profile');
        }
        else{
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('home');
        }
    }
    elseif(isset($_GET['viewAnswer'])){
        $helpid = $_GET['viewAnswer'];
        if($helpid !== ''){
            $ansrs = getAns($helpid);
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('answer');
        }
        else{
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('home');
        }
    }
    elseif(isset($_GET['help'])){
        $help_posts = getHelpPost();
        $helpPostById = getHelpPostById();
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('help');
    }
    elseif(isset($_GET['setting'])){
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('setting');
    }
    elseif(isset($_GET['schedule'])){
        $expired = expiredEvent();
        $ongoing = ongoingEvent();
        $upcoming = upcomingEvent();
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('schedule');
    }
    elseif(isset($_GET['chat'])){
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('chat');
    }
    elseif(isset($_GET['room'])){
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('room');
    }
    elseif(isset($_GET['mynote/note'])){
        $userid = $_GET['mynote/note'];
        if($userid !== ''){
            $allnote = getnotebyid($userid);
            $selecteduser = getUser($userid);
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('mynote');
            showPage('note');
        }
        else{
            showPage('header',['page_title'=>'Queue']);
            showPage('nav');
            showPage('home');
        }
    }
    elseif(isset($_GET['mynote/Question'])){
        $selecteduser = getUser($_GET['mynote/Question']);
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('mynote');
        showPage('Question');
    }
    elseif(isset($_GET['mynote/privateFile'])){
        $selecteduser = getUser($_SESSION['userdata']['userID']);
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('mynote');
        showPage('privateFile');
    }
    elseif(isset($_GET['notefile'])){
        $allnotes = getAllnotes($_GET['notefile']);
        $auth = getUser($allnotes[0]['user_id']);
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('notefile');
    }
    else{
        showPage('header',['page_title'=>'Queue']);
        showPage('nav');
        showPage('home');
    }
}
elseif(isset($_GET['join'])){
    showPage('login');
}
elseif(isset($_GET['admin-login'])){
    showPage('admin-login');
}
elseif(isset($_GET['recover'])){
    showPage('header',['page_title'=>'Recover your account!']);
    showPage('forgetpass');
}
elseif(isset($_GET['verify'])){

    showPage('header',['page_title'=>'Verify!']);
    showPage('submitOTP');
}
else{
    showPage('header',['page_title'=> 'Welcome to Queue!']);
    showPage('welcome');
}



showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);

?>