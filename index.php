<?php include "functions.php"; 
CheckUser();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
    
    </head>
    <style>
      .log{
        text-align: left;
      }
      .bor{
        border: 1px;
      }
    </style>
    <body dir="rtl">
        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   مرحبا بك<b><span class="text-danger"> <?= $_SESSION['username'] ?></span>في لوحة التحكم الخاصة بالمستخدمين  </b><br>
                </div>
                <div class="log">
                <a href="logout.php" class="link-underline link-underline-opacity-0">تسجيل خروج</a>
                </div>
                <div class="col-md-8"></div>
            </div>
            <br><br><br> 
            <table class="table table-hover table-borderless bor">
  <thead>
    <tr class="table-secondary">
      <th scope="col"><a href="add.php"><button class="btn btn-dark text-light">
        <i class="fa-solid fa-plus"></i> إضافة مستخدمين</button></th></a>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"><a href="index.php"><button class="btn text-dark">
        <i class="fa-solid fa-plus"></i> عرض مستخدمين</button></th></a>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th></th>
      <td></td>
      <td></td>
      <td><button class="btn text-dark">
        <i class="fa-solid fa-search"></i> بحث </button></td>
    </tr>
    <tr>
      <td>اسم المستخدم</td>
      <td>البريد الالكتروني</td>
      <td>التاريخ</td>
      <td><button class="btn text-dark"></button></td>
    </tr>
    <tr>
    
      <form method="post" action="">
      <td><input type="text" name="user_name" placeholder="ادخال اسم المستخدم" > </td>
      </form>
      <?php
      $user_name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['user_name'])) {

    $user_name = $_POST['user_name'];

    $sql = "SELECT * FROM users_tbl WHERE user_name LIKE '%$user_name%'";
    
    $result = dbQuery($sql);
    
}

}
?>
      <td><input type="email" placeholder="ادخال البريد الالكتروني" > </td>
      <td>
        من <input type="date" > إلى <input type="date" >
    </td>
      <td><button class="btn btn-primary text-light">
        <i class="fa-solid fa-search"></i> بحث </button>
        <button class="btn btn-danger text-light">
        <a href="index.php" 
        class="text-light link-underline link-underline-opacity-0"><i class="fa-solid fa-x"></i> 
        إلغاء </button></a>
      </td>
    </tr>
  </tbody>
</table>
            <div class="row">

              <table class="table  table-hover table-bordered border-dark">
                <thead>
                  <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">صورة المستخدم</th>
                    <th scope="col">تاريخ الإضافة</th>
                    <th>الإجراء</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                     
                     if(Connect()){
                        // echo "Connected";
                        
                     }else{
                         echo "Not Connected".mysqli_error(Connect());
                     }
                     
                     //echo $page;
                     $sql = "SELECT * FROM `users_tbl` WHERE user_name LIKE '%$user_name%'";
                     $rs = dbQuery($sql);
                     while($row = dbFetchAssoc($rs)){
                    ?>
                  <tr  valign="middel">
                    <th scope="row"><?= $row['id']; ?></th>
                    <td><?= $row['user_name']; ?></td>
                    <td><?= $row['user_email']; ?></td>
                    <td align="center"><?php if($row['user_image'] == ''){ ?>
                         <img src="image/no-image.png" width="80">
                     <?php }else{ ?>
                          <img src="image/<?= $row['user_image'] ?>" width="65">
                     <?php } ?>
                     </td>
                     <td><?= $row['creation_date']; ?></td>
                    <td> 
                    <a href="delete.php?id=<?= $row['id'] ?>" class="text-danger" 
                    onclick="return confirm('هل انت متأكد أنك تريد حذف الحقل')">
                    <i class="fa-solid fa-trash"></i></a></td>
                   
                  </tr>
                     <?php } ?>
                 
                </tbody>
              </table>

                 

              </div>
              <div class="col-md-2"></div>
                
            </div> 
            <div class="row"></div> 
            <div class="row"></div> 
        </div>
        <?php
        // put your code here
        ?>
        <p class="mt-5 mb-3 text-center">&copy;<?= date('Y') ?></p>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>
