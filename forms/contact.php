<?php

$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

if(empty($name) || empty($email) ||  empty($subject) ||  empty($message))
{
    echo '
    <script type="text/javascript">
    alert("please fill it Properly");
    history.go(-1);
    </script>
    ';
}
else{
    
    mail("sudiptarana00@gmail.com","Arches Tech Massage: $subject", $message , "From: $name <$email>" );
    echo '
    <script type="text/javascript">
    alert("Thank you for getting in touch!");
    history.go(-1);
    </script>
    ';
}
?>

