//For Login
$(document).ready(function () {
    $("#formLogin").submit(function (event) {
        event.preventDefault();
        var email = $("input[name = 'email']").val();
        var password = $("input[name = 'password']").val();
        $.post("processLogin.php", {
            email: email,
            password: password
        },
            function (data, status) {
                $("#Message").html(data);

            });
    });
});
// For Change Password
$(document).ready(function () {
    $("#formChangePassword").submit(function (event) {
        event.preventDefault();
        var email = $("input[name = 'email']").val();
        var password = $("input[name = 'password']").val();
        var password1 = $("input[name = 'password1']").val();
        var password2 = $("input[name = 'password2']").val();
        $.post("processChangePassword.php", {
            email: email,
            password: password,
            password1: password1,
            password2: password2
        },
            function (data, status) {
                $("#Message").html(data);

            });
    });
});



$(document).ready(function(e){
    // Submit form data via Ajax
    $("#formRegister").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'processRegister.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                $("#Message").html(data);             
              }                
        });      
    });
});
// File type validation
$("#image").change(function() {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
        alert('Only JPG, JPEG, & PNG files are allowed to upload.');
        $("#image").val('');
        return false;
    }
});



//For Register
$(document).ready(function(){
    $("#formRegister").submit(function(event){
        event.preventDefault();
        var fullName = $("input[name = 'fullName']").val();
        var email = $("input[name = 'email']").val();
        var password = $("input[name = 'password']").val();
        var city = $("input[name = 'city']").val();
        var image = document.getElementById("image").files[0].name;
        // var image = $("input[name = 'image']").val();
        $.post("processRegister.php", {
            fullName: fullName,
            email: email,
            password: password,
            city: city,
            image: image},
            function(data,status){
                $("#Message").html(data);

        });
    });
});

$(document).ready(function(){

    $("#Upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;

        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'processRegister.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){

                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
});

// For Logout
$(document).ready(function(){
    $("#formLogout").submit(function(event){
        event.preventDefault();
        $.post("processLogout.php", {},
            function(data,status){
                

        });
    });
});