<?php


$result = ['status' => 0, 'msg' => '', 'imageName' => '' ]; 

if(!empty($_FILES["image"]["name"])){ 
       // File path config 
            
       $imagestatus = 1;     
            
            $imageName = basename($_FILES["image"]["name"]); 
            $imagePath = '../uploads/' . $imageName; 
            
            // Upload image to the server 
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)){ 
                $uploadedimage = $imageName; 
            }else{ 
                $imagestatus = 0; 
                $result['msg'] = 'there is issue with image uploading'; 
            }

            if($imagestatus == 1){
                $result['imageName'] = $imageName;
                $result['status'] = 1; 
                $result['msg'] = 'Picture upload successfully!';  
            }    
            echo json_encode($result);
       
}
?>