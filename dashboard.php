<?php
session_start();
if(isset($_POST['id']) and $_POST['id']!='' and isset($_SESSION['login'])){
$conn = mysqli_connect('localhost','root','passyourword','db'); // change this 
$id    = $_POST['id'];
$email = $_POST['email']; 
$name  = $_POST['fname'];
$img   = $_POST['img'] ;
    
# echo '<p>'.$id.'</p><br>';
# echo '<p>'.$email.'</p><br>';
# echo '<p>'.$name.'</p><br><br>';
# for debugging 

    
$query = "SELECT id FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$num = 0;
if($result){
    $num = mysqli_num_rows($result);
}
if($num == 1){
    ?>
  <p> You are Already registered ! </p>
  <table   style="width:500px;" align="center">
   <tr>
     <td><span><?php echo $_POST['fname'] ?></span></td>
       <td><img src='<?php echo $_POST['img'] ?>' width='70' height='70' ></td>
   </tr>

   <tr>
    <td>Email</td>
    <td><span><?php echo $_POST['email'] ?></span></td>
   </tr>
    <tr>
    <td colspan="2" style="float:right;"> <a href="logout.php"><span style="color:white;background:red;margin:5px;">logout</span></a>  </td>
    </tr>
  </table>

<?php
    
}
else{
    $query = "INSERT INTO users(id,email,fname) VALUES('$id','$email','$name')";
 $result = mysqli_query($conn,$query);
if($result){
    echo '<p> registered sucessfully !</p>';
}
    ?>
<p> welcome <?php echo $_POST['fname'] ?></p>
<table align="center" >
   <tr>
     <td><span><?php echo $_POST['fname'] ?></span></td>
       <td><img src='<?php echo $_POST['img'] ?>' width='42' height='42' ></td>
   </tr>

   <tr>
    <td>Email</td>
    <td><span><?php echo $_POST['email'] ?></span></td>
   </tr>
    <tr>
         <td colspan="2" style="float:right;"> <a href="logout.php"><span style="color:white;background:red;margin:5px;">logout</span></a>  </td>
    </tr>
  </table>

<?php
    
}
    
}
else{
    header('location:linkedin.php');
}
