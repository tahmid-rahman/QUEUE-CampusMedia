
jQuery(document).ready(function () {
    jQuery("time.timeago").timeago();
});


var chatting_user_id = 0;
var room_id = 0;
var us_id  = 0;

// $(".chatlist_item").click();

function popchat(user_id) {
    $("#user_chat").html(`
    <div role="status" class="mx-auto">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    `);

    $("#chatter_username").text('loading..');
    $("#chatter_name").text('');
    $("#chatter_pic").attr('src', 'assets/image/posts/user (1).png');
    chatting_user_id = user_id;
    $("#sendmsg").attr('data-user-id', user_id);
}
function popRoomChat(room) {
    $("#room_chat").html(`
    <div role="status" class="mx-auto">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    `);

    $("#room_name1").text('Discussion Topic: loading..');
    $("#room_name2").text('Topic: loading..');
    $("#input_romid").val('0');
    $("#room_pic1").attr('src', 'assets/image/posts/background.png');
    $("#room_pic2").attr('src', 'assets/image/posts/background.png');

    //$("#admin_id").text(room_id);
    room_id = room;

    //$("#sendmsg").attr('data-user-id', user_id);
}
function popAdminchat(id) {
    console.log('from admin');
    $("#admin_chat").html(`
    <div role="status" class="mx-auto">
        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    `);

    $("#us_name1").text('Name: loading..');
    $("#us_name2").text('Name: loading..');
    // $("#input_romid").val('0');
    $("#us_pic1").attr('src', 'assets/image/posts/background.png');
    $("#us_pic2").attr('src', 'assets/image/posts/background.png');

    //$("#admin_id").text(room_id);
    us_id = id;
    console.log(id);

    //$("#sendmsg").attr('data-user-id', user_id);
}
function createConversion(room_id1) {
    $.ajax({
        url: 'assets/php/ajax.php?makeChat',
        method: 'post',
        data: { roomId: room_id1},
    });
}
function joinRoomChat(user_id) {
    $.ajax({
        url: 'assets/php/ajax.php?joinRoomChat',
        method: 'post',
        data: { roomId: user_id},
    });
    popRoomChat(user_id);
}
function deleteConversation() {
    var chatid = chatting_user_id;
    console.log(chatid);
    $.ajax({
        url: 'assets/php/ajax.php?deleteChat',
        method: 'post',
        dataType: 'json',
        data: {id: chatid},
        success: function (response) {
            console.log(response.m);
            if (response.status) {
                $("#delete").css("display","none");
                popchat(-1);
            } else {
                alert('someting went wrong, try again after some time');
            }

        }
    });
}
function deletePrivateFile(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deletePfile',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synPtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function likeBtn(postid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?likePost',
        method: 'post',
        dataType: 'json',
        data: {id: postid},
        
        success: function (response) {
            var dest = "#points"+postid;
            var dest1 = "#likeIcn"+postid;
            var dest2 = "#likeTxt"+postid;
            //console.log(response);
            if (response.status) {
                $(dest).html(response.totalLike);
                $(dest1).attr('src', 'assets/image/' + response.likeIcon);
                $(dest2).html(response.liketxt);
                //console.log(dest);
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function deletePost(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deletePostByAdmin',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synAdminPtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function deleteHelp(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deleteHelpByAdmin',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synAdminHtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function deleteAnswer(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deleteAnswerByAdmin',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synAdminAtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function deleteUser(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deleteUserByAdmin',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synAdminUtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}
function deleteRoom(itemid) {
    //console.log(itemid);
    $.ajax({
        url: 'assets/php/ajax.php?deleteRoomByAdmin',
        method: 'post',
        dataType: 'json',
        data: {id: itemid},
        success: function (response) {
            //console.log(response.m);
            if (response.status) {
                synAdminRtable();
            } else {
                alert('someting went wrong, try again after some times');
            }
        }
    });
}





$("#leaveRoom").click(function () {
    var room = room_id;
    $("#leaveRoom").attr("disabled", true);
    console.log('hello');
    $.ajax({
        url: 'assets/php/ajax.php?leaveFormRoom',
        method: 'post',
        dataType: 'json',
        data: {room: room},
        success: function (response) {
            // console.log(response.r);
            console.log(response.m);
            if (response.status) {
                $("#delete").css("display","none");
                $("#leaveRoom").attr("disabled", false);
                popRoomChat(-1);
            } else {
                alert('someting went wrong, try again after some time');
            }

        }
    });

});
$("#sendmsg").click(function () {
    var user_id = chatting_user_id;
    var msg = $("#msginput").val();
    //console.log(user_id);
    if (!msg) return;

    $("#sendmsg").attr("disabled", true);
    $("#msginput").attr("disabled", true);
    $.ajax({
        url: 'assets/php/ajax.php?sendmessage',
        method: 'post',
        dataType: 'json',
        data: { user_id: user_id, msg: msg },
        success: function (response) {
            if (response.status) {
                $("#sendmsg").attr("disabled", false);
                $("#msginput").attr("disabled", false);
                $("#msginput").val('');
            } else {
                alert('someting went wrong, try again after some time');
            }



        }
    });

});
$("#sendrooommsg").click(function () {
    var roomchat = room_id;
    var msg = $("#roommsginput").val();
    //console.log(roomchat);
    if (!msg) return;

    $("#sendrooommsg").attr("disabled", true);
    $("#roommsginput").attr("disabled", true);
    $.ajax({
        url: 'assets/php/ajax.php?sendRoomMessage',
        method: 'post',
        dataType: 'json',
        data: { room_id: roomchat, msg: msg },
        success: function (response) {
            if (response.status) {
                $("#sendrooommsg").attr("disabled", false);
                $("#roommsginput").attr("disabled", false);
                $("#roommsginput").val('');
            } else {
                alert('someting went wrong, try again after some time');
            }
        }
    });

});
$("#sendadminmsg").click(function () {
    var adminchat = us_id;
    var msg = $("#adminmsginput").val();
    //console.log(roomchat);
    if (!msg) return;

    $("#sendadminmsg").attr("disabled", true);
    $("#adminmsginput").attr("disabled", true);
    $.ajax({
        url: 'assets/php/ajax.php?sendAdminMessage',
        method: 'post',
        dataType: 'json',
        data: { id: adminchat, msg: msg },
        success: function (response) {
            if (response.status) {
                $("#sendadminmsg").attr("disabled", false);
                $("#adminmsginput").attr("disabled", false);
                $("#adminmsginput").val('');
            } else {
                alert('someting went wrong, try again after some time');
            }
        }
    });

});
$("#sendDropmsg").click(function () {
    var msg = $("#dropmsginput").val();
    if (!msg) return;

    $("#sendDropmsg").attr("disabled", true);
    $("#dropmsginput").attr("disabled", true);
    $.ajax({
        url: 'assets/php/ajax.php?sendDropMessage',
        method: 'post',
        dataType: 'json',
        data: {msg: msg },
        success: function (response) {
            if (response.status) {
                $("#sendDropmsg").attr("disabled", false);
                $("#dropmsginput").attr("disabled", false);
                $("#dropmsginput").val('');
            } else {
                alert('someting went wrong, try again after some time');
            }
        }
    });

});


function synmsg() {

    $.ajax({
        url: 'assets/php/ajax.php?getmessages',
        method: 'post',
        dataType: 'json',
        data: { chatter_id: chatting_user_id },
        success: function (response) {
            //console.log("hello");
            //console.log(response);
            $("#chatlist").html(response.chatlist);
            $("#chatlist1").html(response.chatlist);
            // if (response.newmsgcount == 0) {
            //     $("#msgcounter").hide();
            // } else {
            //     $("#msgcounter").show();
            //     $("#msgcounter").html("<small>" + response.newmsgcount + "</small>");


            // }

            if (chatting_user_id != 0) {
                $("#user_chat").html(response.chat.msgs);

                $("#chatter_username").text(response.chat.userdata.username);
                $("#cplink").attr('href', '?profile=' + response.chat.userdata.userID);
                $("#chatter_name").text(response.chat.userdata.name);
                $("#chatter_pic").attr('src', '/QUEUE/assets/image/posts/' + response.chat.userdata.ppic);
            }



        }
    });
}

//
function visibility(qid) {
    $.ajax({
        url: 'assets/php/ajax.php?setVisibility',
        method: 'post',
        data: {Qid: qid},
    });
    synQtable();
}
$(document).ready(function () {
    $("#adminP_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminPSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminpost").html(response.adminPtable);
                }
            });
        }
        else{
            synAdminPtable();
        }
    });
    $("#adminH_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminHSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminHpost").html(response.adminHtableList);
                }
            });
        }
        else{
            synAdminHtable();
        }
    });
    $("#adminA_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminASearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminApost").html(response.adminAtableList);
                }
            });
        }
        else{
            synAdminAtable();
        }
    });
    $("#adminU_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminUSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminUpost").html(response.adminUtableList);
                }
            });
        }
        else{
            synAdminUtable();
        }
    });
    $("#adminR_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminRSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminRoom").html(response.adminRtableList);
                }
            });
        }
        else{
            synAdminRtable();
        }
    });
    $("#adminchat_search").keyup(function(){
        var input = $(this).val();
        // console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?adminChatSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#adminChatlist").html(response.adminchatsearch);
                }
            });
        }
        else{
            synAdminMsg();
        }
    });
    synAdminPtable();
    synAdminHtable();
    synAdminAtable();
    synAdminUtable();
    synAdminRtable();
});

$(document).ready(function () {
    $("#home_search").keyup(function(){
        var input = $(this).val();
        //console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?homeSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input },
                success: function (response) {
                    //console.log(response);
                    $("#homeSearchResult").css("display","block");
                    $("#homeSearchResult").html(response.SearchResult);
                }
            });
        }else{
            $("#homeSearchResult").css("display","none");
        }
    });
    $("#help_search").keyup(function(){
        var input = $(this).val();
        //console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?helpSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input },
                success: function (response) {
                    //console.log(response);
                    $("#helpSearchResult").css("display","block");
                    $("#helpSearchResult").html(response.SearchResult);
                }
            });
        }else{
            $("#helpSearchResult").css("display","none");
        }
    });
    $("#chat_search").keyup(function(){
        var input = $(this).val();
        //console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?chatSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input },
                success: function (response) {
                    //console.log(response);
                    $("#chatSearchResult").css("display","block");
                    $("#chatSearchResult").html(response.chatSearchResult);
                }
            });
        }else{
            $("#chatSearchResult").css("display","none");
        }
    });
    $("#room_search").keyup(function(){
        var input = $(this).val();
        //console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?roomSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input },
                success: function (response) {
                    $("#roomSearchResult").css("display","block");
                    $("#roomSearchResult").html(response.roomSearchResult);
                }
            });
        }else{
            $("#roomSearchResult").css("display","none");
        }
    });
    $("#ques_search").keyup(function(){
        var input = $(this).val();
        console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?QuestionSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input , user : userIdofQ},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#quesHolder").html(response.QtableSearch);
                }
            });
        }
        else{
            synQtable();
        }
    });
    $("#note_search").keyup(function(){
        var input = $(this).val();
        console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?noteSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input , user : userIdofQ},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#noteShow").html(response.noteList);
                }
            });
        }
        else{
            synNotesideCol();
        }
    });
    $("#privatefile_search").keyup(function(){
        var input = $(this).val();
        console.log(input);
        if(input != ""){
            $.ajax({
                url: 'assets/php/ajax.php?PfileSearch',
                method: 'post',
                dataType: 'json',
                data: {input : input , user : userIdofQ},
                success: function (response) {
                    //$("#roomSearchResult").css("display","block");
                    $("#privatefiles").html(response.PtableList);
                }
            });
        }
        else{
            synPtable();
        }
    });
    synAdminMsg();
    synDropMsg();
    synroom();
    synmsg();
    synQtable();
    synNotesideCol();
    synPtable();
    synnotification();
    
});
setInterval(() => {
    synmsg();
    synroom();
    synnotification();
    synAdminMsg();
    synDropMsg();

}, 1000);

function synroom() {
    //console.log('hello');

    $.ajax({
        url: 'assets/php/ajax.php?getRoomMessages',
        method: 'post',
        dataType: 'json',
        data: { room: room_id },
        success: function (response) {
            //console.log("hello");
            //console.log(response);
            $("#roomchatlist").html(response.roomChatList);
            //console.log(response.roomChatList);
            if (room_id != 0) {
                //console.log(room_id);
                //console.log(response.rooms.admin);
                $("#room_chat").html(response.rooms.msgs);
                $('#room_member').html(response.rooms.members);
                $("#admin_id").html(response.rooms.admin);
                $("#input_romid").val(room_id);
                $("#room_name1").text('Topic: '+response.rooms.topic1);
                $("#room_name2").text(response.rooms.topic2);
                $("#room_pic1").attr('src', 'assets/image/posts/' + response.rooms.roompic1);
                $("#room_pic2").attr('src', 'assets/image/posts/' + response.rooms.roompic1);
            }
            else{
                //console.log(room_id);
            }



        }
        
    });
}

function synQtable(){
    //console.log(userIdofQ);
    $.ajax({
        url: 'assets/php/ajax.php?getQtable',
        method: 'post',
        dataType: 'json',
        data: { user: userIdofQ},
        
        success: function (response) {
            $("#quesHolder").html(response.QtableList);
        }
        
    });
}

function synNotesideCol(){
    console.log(userIdofQ);
    $.ajax({
        url: 'assets/php/ajax.php?getNotesideCol',
        method: 'post',
        dataType: 'json',
        data: { user: userIdofQ},
        
        success: function (response) {
            $("#noteShow").html(response.noteList);
        }
        
    });
}

function synnotification(){
    //console.log(userIdofQ);
    $.ajax({
        url: 'assets/php/ajax.php?notificatios',
        method: 'post',
        dataType: 'json',
        
        success: function (response) {
            $("#notifications").html(response.notifiList);
            $("#notifications1").html(response.notifiList);
        }
        
    });
}
function synPtable(){
    //console.log(userIdofQ);
    $.ajax({
        url: 'assets/php/ajax.php?getPtable',
        method: 'post',
        dataType: 'json',
        data: { user: userIdofQ},
        
        success: function (response) {
            $("#privatefiles").html(response.PtableList);
        }
        
    });
}
function synAdminPtable(){
    $.ajax({
        url: 'assets/php/ajax.php?getadminPtable',
        method: 'post',
        dataType: 'json',
        data: {},
        success: function (response) {
            
            $("#adminpost").html(response.adminPtableList);
        }
        
    });
}
function synAdminHtable(){
    $.ajax({
        url: 'assets/php/ajax.php?getadminHtable',
        method: 'post',
        dataType: 'json',
        success: function (response) {
            
            $("#adminHpost").html(response.adminHtableList);
        }
        
    });
}
function synAdminAtable(){
    $.ajax({
        url: 'assets/php/ajax.php?getadminAtable',
        method: 'post',
        dataType: 'json',
        success: function (response) {
            
            $("#adminApost").html(response.adminAtableList);
        }
        
    });
}
function synAdminUtable(){
    $.ajax({
        url: 'assets/php/ajax.php?getadminUtable',
        method: 'post',
        dataType: 'json',
        success: function (response) {
            
            $("#adminUpost").html(response.adminUtableList);
        }
        
    });
}
function synAdminRtable(){
    $.ajax({
        url: 'assets/php/ajax.php?getadminRoom',
        method: 'post',
        dataType: 'json',
        success: function (response) {
            
            $("#adminRoom").html(response.adminRtableList);
        }
        
    });
}
function synAdminMsg() {

    $.ajax({
        url: 'assets/php/ajax.php?getAdminmessages',
        method: 'post',
        dataType: 'json',
        data: { id: us_id },
        success: function (response) {
            console.log(us_id);
            //console.log(response);
            $("#adminChatlist").html(response.adminchatlist);

            if (us_id != 0) {
                $("#admin_chat").html(response.chat.msgs);
                console.log("hello");
                $("#us_name1").text('Name: '+response.chat.userdata.name);
                $("#us_name2").text(response.chat.userdata.name);
                $("#us_username").text('Username: '+response.chat.userdata.username);
                $("#us_userid").text('User id: '+response.chat.userdata.userID);
                $("#us_email").text('Email: '+response.chat.userdata.email);
                $("#us_pic1").attr('src', '/QUEUE/assets/image/posts/' + response.chat.userdata.ppic);
                $("#us_pic2").attr('src', '/QUEUE/assets/image/posts/' + response.chat.userdata.ppic);
            }
        }
    });
}
function synDropMsg() {

    $.ajax({
        url: 'assets/php/ajax.php?dropMessages',
        method: 'post',
        dataType: 'json',
        //data: { id: us_id },
        success: function (response) {
            $("#drop_chat").html(response.chat.msgs);
        }
    });
}