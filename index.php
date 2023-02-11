<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TASK | VERO</title>
    <meta name="description" content="">
 
    <?php include("includes/head_scripts.php"); ?>
    <?php //include("includes/curl_api.php"); ?>

</head>

<body>

<div class="container">
    <div class="row">
       <h1 class="indexHeading">TASK VERO</h1>
       
        <div class="table-responsive">
            <input type="text" id="search" placeholder="Search">
            <div class="loaderebox" style="display: none;">
                <!-- <span class="loader"></span> -->
                 Loading Content...
            </div>    
            <table class="table text-center" id="table">
                <thead>
                <tr>
                    <th>Task</th>
                    <th>Title</th>
                    <th>description</th>
                </tr>
                </thead>
                <tbody id="result">
                  
                </tbody>

            </table>
             
       
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Upload Picture
            </button>
        
        </div>
       

    </div>
</div>

  

   
	<?php include("includes/footer_scripts.php"); ?>
    <?php include("includes/popups.php"); ?>
</body>
</html>