<?php
session_start();
?>
<!doctype html>
<html>
 <head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    .IN-widget{  
        margin-left: 45%;
        margin-top: 20%;
    }
      input{
          display: none;
      }
    
</style>
<!--     code for API                        -->
  <script type="text/javascript" src="//platform.linkedin.com/in.js">
   api_key: 81cz0hrebu4qxd 
   authorize: false
   onLoad: onLinkedInLoad
  </script>

  <script type="text/javascript">
      var name="";
      var id="";
      var email="";
      var img = "";
 
  function onLinkedInLoad() {
   IN.Event.on(IN, "auth", getProfileData);
  }
  function logout(){
    IN.User.logout(onLogout);
  }
  function onLogout(){
    console.log('Logout successfully');
  }
  function getProfileData() {
 
   IN.API.Profile("me").fields(["id", "firstName", "emailAddress","lastName", "pictureUrl", "publicProfileUrl"]).result(function (data) {
    
    var profile = data.values[0];
      console.log(profile); // for debugging
       name=profile.firstName;
       id=profile.id;
       email=profile.emailAddress;
       img =profile.pictureUrl;
   function senddata(response){
         logout();
         <?php $_SESSION['login']=true; ?>
         document.getElementById('id').value = id; 
         document.getElementById('email').value = email; 
         document.getElementById('fname').value = name; 
         document.getElementById('img').value = img; 
         document.getElementById('data').submit(); 
     }
    senddata();
       
  }).error(function (data) {
    console.log(data);
  });
 }
 </script>
    
 </head>
 <body>

  <div id="#icon" >
  <script type="in/Login"></script>  <!--  for icon of linkedin on page  -->
  </div>
    <form action="dashboard.php" method="post" id="data">
    <input type="text" name="id" id="id" >
    <input type="text" name="email" id="email" >
    <input type="text" name="fname" id="fname" >
    <input type="text" name="img" id="img" >
    <input type="submit">
      

  
 </form>
 </body>
</html>