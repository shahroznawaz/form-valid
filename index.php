<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailError = $mobileError = $genderErr ="";
$name = $email = $mobile = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
$nameErr = "Name is required";
} 
else {
$name = test_input($_POST["name"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameErr = "Only letters and white space allowed";
}
}
if (empty($_POST["name"])) {
$mobileError = "Name is required";
} else {
$mobile = test_input($_POST["mobile"]);
// check if name only contains letters and whitespace
if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
$mobileError = "10 digit Number"; 
}
}
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailError = "Invalid email format"; 
}
}

if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $genderErr = test_input($_POST["gender"]);
  }
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Name: <input type="text" name="name" value="<?php echo $name;?>">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Mobile: <input type="text" name="mobile" value="<?php echo $mobile;?>">
<span class="error">* <?php echo $mobileError;?></span>
<br><br>
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailError;?></span>
<br><br>
Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Select Option:
  <select name="select_box">
        <option value="0">Please Select</option>
        <option value="1">OPT 1</option>
        <option value="2">OPT 2</option>
    </select>
    <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>