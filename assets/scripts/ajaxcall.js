$(document).ready(function (e) {
API_Call_Refesh()
//////////////////////////////////////////////////////////////////////////////////////////////
/// ajax Upload Image
////////////////////////////////////////////////////////////////////////////////////////////

    $("#vform").on('submit',(function(e) {
     e.preventDefault();
        $('.loaderebox').show()            
            $.ajax({
                url: "includes/ajaxuploadpic.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                dataType: 'json',
                
                success: function(data){
                    $('.loaderebox').hide()
                    $('.showMsg').html('');
                    if(data.status == 1){
                        $('#preview').html('<img src="uploads/'+data.imageName+'" />')
                        $('#vform')[0].reset();
                        $('.showMsg').html('<p class="alert alert-success">'+data.msg+'</p>');
                    }else{
                        $('.showMsg').html('<p class="alert alert-danger">'+data.msg+'</p>');
                    }
                
                },
                                
            });
    
    }));

//////////////////////////////////////////////////////////////////////////////////////////////
/// Function get access_token
////////////////////////////////////////////////////////////////////////////////////////////
// function get_API_token(){

//     let data = {
//                 "username":"365",
//                 "password":"1"
//              }

//         $.ajax({ 
//                 type: "post",
//                 dataType: "json",
//                 headers: {
//                     'Accept': 'application/json',
//                     'Content-Type': 'application/json',
//                     'Authorization': 'Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz',
//                     'Access-Control-Allow-Origin': '*',
//                 },
            
//                 url: 'https://api.baubuddy.de/index.php/login',
//                 data: JSON.stringify(data),
//                 success   : function(response) {
//                   return response.oauth.access_token;
//                 }

//         })

// }  

//////////////////////////////////////////////////////////////////////////////////////////////
/// Function Refesh API after 60 second 
////////////////////////////////////////////////////////////////////////////////////////////
function API_Call_Refesh(){
   $('.loaderebox').show();  
    let section = '';    

        $.ajax({ 
                type: "GET",
                dataType: "json",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            
                url: 'includes/curl_api.php',
                
                success: function(response) {
              
                    if(response.status != 'faild'){
                        response?.taskData?.data?.forEach(function(val,key){
                                section += '<tr style="background: '+val.colorCode+';">';    
                                section += '<td>'+val.task+'</td>';
                                section += '<td>'+val.title+'</td>';
                                section += '<td>'+val.description+'</td>';
                                section += '</tr>';
                        })

                    }else{
                          $('#table').html('<p class="alert alert-danger">'+response.AuthicationError+'</p>');
                        }    

                    $('#result').html(section);
                    $('.loaderebox').hide(); 
                    searchFiler()
                }

        })

}    
setInterval(API_Call_Refesh, 60000);

//////////////////////////////////////////////////////////////////////////////////////////////
/// Table search 
////////////////////////////////////////////////////////////////////////////////////////////
function searchFiler(){

var $rows = $('#result tr');
$('#search').keyup(function() {
        
        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
            reg = RegExp(val, 'i'),
            text;
        
        $rows.show().filter(function() {
            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        }).hide();
});

}

});