<?php
/* Set e-mail recipient */
$myemail = "michelle.nonato@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$email = check_input($_POST['email']);
$malenum = check_input($_POST['malenum']);
$femalenum = check_input($_POST['femalenum']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("E-mail address not valid");
}
/* Let's prepare the message for the e-mail */
$message = "

Name: $name
E-mail: $email
Subject: Inquiry

Male: $malenum
Female: $femalenum
";
/* Send the message using mail() function */
mail($myemail,$name,$message);

/* Redirect visitor to the thank you page */
echo "<center><br><BR><BR><BR>";
echo "<h1>";
echo "Thank you for leaving me a lovely message! .";
echo "</h1>";
echo "<br><BR><BR><BR>";
echo "<h2>";
echo "<a href=";echo "home.html";echo ">Back to home.</a>";
echo "</h2>";
echo "</center>";
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>