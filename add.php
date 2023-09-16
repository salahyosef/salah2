<?php 
include "functions.php";
CheckUser();
$errname = $erremail  = "";
if(isset($_POST['btn'])){
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $image = $_FILES['ImgFle']['name'];
    $dt = $_POST['dd'];
    if($name == ""){
        $errname = "الرجاء ادخال الاسم بالكامل";
    }
    if($email == ""){
        $errEmail = "الرجاء ادخال البريد الالكتروني";
    }else{
      if($dt == "")
        $dterror = "Please Enter Your dt";
   }

        if($image == '')
           {
               $newImage = '';
           }else{
           $newImage = rand(1000, 100000)."_".$image; // 2546_image1.png
           move_uploaded_file($_FILES['ImgFle']['tmp_name'], 'image/'.$newImage);
           }
         $sql = "insert into users_tbl (user_name, user_email, user_image)
                  values('$name', '$email', '$newImage')";
         $result = dbQuery($sql);
         if($result){
             echo  "<meta http-equiv='refresh' content='0;URL=index.php'>";
         }else{
             echo "Error";
         }
    }


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body dir="rtl">
  <div class="container text-center">
  <div class="row">
    <div class="col">
      
    </div>
    <div class="col">
      <h1>إضافة البيانات</h1>
      <br>
      <form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">اسم المستخدم</label>
    <input type="text" class="form-control" name="fname"
     id="exampleInputEmail1" placeholder="أدخل اسمك بالكامل" aria-describedby="emailHelp">
     <span class="text-danger"><?= $errname ?></span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">البريد الالكتروني</label>
    <input type="email" class="form-control" name="email"
     id="exampleInputPassword1">
     <span class="text-danger"><?= $erremail ?></span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">إضافة صورة</label>
    <input type="file" name="ImgFle"
     class="form-control" id="exampleInputPassword1">
  </div>
  <label for="iamge" class="col-sm-2 col-form-label">Datetime</label>
    <div class="col-sm-10">
    <input type="datetime-local" name="dd" class="form-control">
    <span class="text-danger"><?= @$dterror ?></span>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="btn">إضافة بيانات</button>
  <button type="button" class="btn btn-danger"><a href="index.php" class="text-light link-underline link-underline-opacity-0">
    إلغاء</a></button>
</form>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  </body>
</html>