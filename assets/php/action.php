<?php

require_once 'function.php';
require_once 'send_code.php';

if(isset($_GET['signup'])){
    $response=validateSignupForm($_POST);
    if($response['status']){
        $otp = rand(1111111,9999999);
        $subject = 'Welcome to QUEUE';
        $body = "Your temporary password is : '$otp'. Change it after login";
        sendCode($_POST['email'],$subject,$body);
        if(createUser($_POST,$otp)){
            $alert = "<script>alert('sign up is success full');</script>";
            echo $alert;
            header('location:../../?join');
        }else{
            $alert = "<script>alert('sign up is failed');</script>";
            echo $alert;
            header("location:../../");
        }
        
    
    }else{
        $_SESSION['error']=$response;
        $_SESSION['formdata']=$_POST;
        $alert = "<script>alert('Sign up was failed.');</script>";
        echo $alert;
        header("location:../../?join");
    }
}
if(isset($_GET['forgotpass'])){
    //$response=validateSignupForm($_POST);
    //if($response['status']){
        $otp = rand(111111,999999);
        $subject = 'Welcome to QUEUE';
        $body = "Your temporary password is : '$otp'. Change it after login";
        sendCode($_POST['email'],$subject,$body);
        if(updatePassword($_POST,$otp)){
            $alert = "<script>alert('sign up is success full');</script>";
            echo $alert;
            header('location:../../?join');
        }else{
            $alert = "<script>alert('sign up is failed');</script>";
            echo $alert;
            header("location:../../");
        }
        
    
    // }else{
    //     $_SESSION['error']=$response;
    //     $_SESSION['formdata']=$_POST;
    //     $alert = "<script>alert('Sign up was failed.');</script>";
    //     echo $alert;
    //     header("location:../../?join");
    // }
}
if(isset($_GET['verifyotp'])){
    $subotp = $_POST['otp'];
    if($subotp == $otp){

        echo 'success';
    }else{
        echo 'otp is';
        echo $tempdata['email'];
    }

}
if(isset($_GET['login'])){
    $response=validateLoginForm($_POST);
    if($response['status']){
        $_SESSION['Auth'] = true;
        $_SESSION['Admin'] = false;
        $_SESSION['User'] = true;
        $_SESSION['userdata'] = $response['user'];
        header("location:../../?home");
        
    }else{
        $_SESSION['error']=$response;
        $_SESSION['formdata']=$_POST;
        header("location:../../?join");
    }
}
if(isset($_GET['adminLogin'])){
    $response=validateAdminLoginForm($_POST);
    if($response['status']){
        $_SESSION['Admin'] = true;
        $_SESSION['User'] = false;
        $_SESSION['Auth'] = true;
        $_SESSION['admindata'] = $response['admin'];
        header("location:../../?admin-dashboard");
        
    }else{
        $_SESSION['error']=$response;
        $_SESSION['formdata']=$_POST;
        header("location:../../?admin-login");
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header('location:../../');

}

if(isset($_GET['updateName'])){
    
    if(changeName($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?setting');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../?home');
    }
    
}
if(isset($_GET['updateAdminName'])){
    
    if(changeAdminName($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?admin-profile');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../');
    }
    
}
if(isset($_GET['updateAdminUserame'])){
    
    if(changeAdminUserame($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?admin-profile');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../');
    }
    
}
if(isset($_GET['updateAdminPass'])){
    
    if(changeAdminPass($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?admin-profile');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../');
    }
    
}
if(isset($_GET['updateGender'])){
    
    if(changeGender($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?setting');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../?home');
    }
    
}
if(isset($_GET['AddEvent'])){
    
    if(addNewEvent($_POST['frDate'],$_POST['toDate'],$_POST['txt'])){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?schedule');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../?home');
    }
    
}
if(isset($_GET['updateUsername'])){
    $response=validateUsername($_POST);
    if($response['status']){
        if(changeUsername($_POST)){
            //echo $_SESSION['userdata']['userID'];
            header('location:../../?setting');
        }
        else{
            $_SESSION['error']=$response;
            header('location:../../?home');
        }
        
    }else{
        $_SESSION['error']=$response;
        header("location:../../?home");
    }
    
}
if(isset($_GET['updatePassword'])){
    
    if(changePassword($_POST)){
        // $alert = "<script>alert('sign up is success full');</script>";
        // echo $alert;
        header('location:../../?setting');
    }
    else{
        $_SESSION['error']=$response;
        header('location:../../?home');
    }
    
}

if(isset($_GET['addpost'])){
    $response = validatePostImage($_FILES['post_img']);
    
    
     if($response['status']){
         if(createPost($_POST,$_FILES['post_img'])){
            //echo"success";
            header("location:../../?home");
         }else{
           echo "something went wrong";
         }
     }else{
        if(createPostOnlyTxt($_POST)){
            
         header("location:../../?home");
         }else{
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         }

           
     }
 }
if(isset($_GET['updateProfilePic'])){
    $response = validatePostImage($_FILES['post_img']);
 
     if($response['status']){
         if(changeProfilePic($_FILES['post_img'])){
            //echo"success";
            header("location:../../?setting");
         }else{
           echo "something went wrong";
         }
     }else{
        
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         
     }
 }
if(isset($_GET['updateAdminProfilePic'])){
    $response = validatePostImage($_FILES['post_img']);
 
     if($response['status']){
         if(changeAdminProfilePic($_FILES['post_img'])){
            //echo"success";
            header("location:../../?admin-profile");
         }else{
           echo "something went wrong";
         }
     }else{
        
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../");
         
     }
 }
 if(isset($_GET['setRoomProfilePic'])){
    $response = validatePostImage($_FILES['post_img']);
 
     if($response['status']){
         if(changeRoomPic($_FILES['post_img'],$_POST['roomid'])){
            //echo"success";
            header("location:../../?room");
         }else{
           echo "something went wrong";
         }
     }else{
        
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         
     }
 }
 if(isset($_GET['newQuesion'])){
    $id = $_SESSION['userdata']['userID'];
    if(uploadnewQuestion($_FILES['post_file'],$_POST['post_name'])){
        echo"success";
        header("location:../../?mynote/Question=$id");
    }else{
        echo "something went wrong";
        header("location:../../?home");
    }
    
 }
if(isset($_GET['newPfile'])){
    $id = $_SESSION['userdata']['userID'];
    if(uploadnewPfile($_FILES['post_file'],$_POST['post_name'])){
        echo"success";
        header("location:../../?mynote/privateFile");
    }else{
        echo "something went wrong";
        header("location:../../?home");
    }
    
 }

if(isset($_GET['addHelpPost'])){
    $response = validatePostImage($_FILES['post_img']);
 
     if($response['status']){
         if(createHelpPost($_POST,$_FILES['post_img'])){
            //echo"success";
            header("location:../../?help");
         }else{
           echo "something went wrong";
         }
     }else{
        if(createHelpPostOnlyTxt($_POST)){
         header("location:../../?help");
         }
         else{
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         }

     }
 }
if(isset($_GET['createNewNote'])){
    $id = $_SESSION['userdata']['userID'];
    $response = validatePostImage($_FILES['post_img']);
 
     if($response['status']){
         if(createNote($_POST,$_FILES['post_img'])){
            //echo"success";
            header("location:../../?mynote/note=$id");
         }else{
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         }
     }else{
        if(createNoteOnlyTxt($_POST)){
         header("location:../../?mynote/note=$id");
         }
         else{
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         }

     }
 }
if(isset($_GET['newNotePage'])){
    //$id = $_SESSION['userdata']['userID'];
    $response = validatePostImage($_FILES['post_file']);
    $noteid = $_POST['post_id'];
     if($response['status']){
         if(createNotePage($noteid,$_FILES['post_file'])){
            //echo"success";
            header("location:../../?notefile=$noteid");
            //header("location:../../");
         }else{
           echo "something went wrong";
         }
     }else{
        echo "something went wrong";
        $_SESSION['error']=$response;
        header("location:../../?home");

     }
 }
if(isset($_GET['addAnswer'])){
    $id = $_GET['addAnswer'];
    $response = validatePostImage($_FILES['post_img']);
     if($response['status']){
         if(createAnswer($_POST,$_FILES['post_img'],$id)){
            //echo"success";
            header("location:../../?viewAnswer=$id");
         }else{
           echo "something went wrong";
         }
     }else{
        if(createAnswerOnlyTxt($_POST,$id)){
         header("location:../../?viewAnswer=$id");
         }
         else{
           echo "something went wrong";
           $_SESSION['error']=$response;
           header("location:../../?home");
         }

     }
}
if(isset($_GET['createRoomAction'])){

    if(createRoom($_POST)){
        //echo"success";
        header("location:../../?room");
     }else{
       //echo "something went wrong";
       header("location:../../?home");
     }
 }
if(isset($_GET['downloadQuestion'])){
    if(!empty($_GET['downloadQuestion'])){
        $filename = basename($_GET['downloadQuestion']);
        $filepath = '/Applications/XAMPP/xamppfiles/htdocs/QUEUE/assets/image/posts/' . $filename;
        if(!empty($filename) && file_exists($filepath)){
            header("Cache-Control: public");
            header("Content-Description: FIle Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");

            readfile($filepath);
            exit;

        }
        else{
            echo "This File Does not exist.";
            echo $filename;
            echo $filepath;
        }
    }
}



?>