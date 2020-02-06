<?php ob_start(); INCLUDE "php/db-connect.php"; INCLUDE 'email-handler/send-mail.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
 
<!-- END HEAD -->
<body>
<?php 
sendEmail('a.sheard2012@gmail.com','Adam Sheard','no-reply@theadamsheard.co.uk','Frankie Boyle','Test Message','Testesttesttest<br>testrtesttreas.');
/*
<div style="max-width: 750px;">
    <div style="width: 100%; border-radius: 18px; border: 2px solid #303030;">
        <div style="height: 125px; background:linear-gradient(45deg, rgba(124,117,255,1) 0%, rgba(173,173,255,1) 51%, rgba(0,212,255,1) 100%); vertical-align: middle;border-radius: 15px; border-bottom: 2px solid #303030;">
            <h1 style="text-align: center; position: relative; top:27%;margin:0; font-family: Helvetica, Verdana, Tahoma;">New Message!</h1>
        </div>
        <div style="width: 100%;">
            <h2 style="font-family: Helvetica, Verdana, Tahoma; border-bottom: 2px solid #303030; padding-bottom: 15px;">Subject: sddsfgdfgdfg</h2>
            <h2 style="font-family: Helvetica, Verdana, Tahoma; border-bottom: 2px solid #303030; padding-bottom: 15px;">From: ssdfdsfsdf</h2>
        </div>
        <div style="width: 100%; border-bottom: 2px solid #303030; padding-bottom: 15px;"> 
            <h2 style="font-family: Helvetica, Verdana, Tahoma;">Message: </h2>
            <p style="font-family: Helvetica, Verdana, Tahoma;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        </div>
        <div style="text-align: center;">
            <p style="font-family: Helvetica, Verdana, Tahoma; font-size: 0.75em;">If you think this message has been recieved in error, contact a system administrator at: <a href="mailto:a.sheard2012@gmail.com">a.sheard2012@gmail.com</a></p>
        </div>
    </div>
</div>
**/?>

</body>
</html>