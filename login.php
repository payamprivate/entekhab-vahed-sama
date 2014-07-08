<?php
include("db.php");
include("header.php");
include("slidebar.php"); ?>

		<div class="left content">
			<div class="inner" id="container">
					<div class="round-10 white shadow mgb-10">
					<div class="ttl">ورود دانشجو</div>
					<div class="pd-10" id="content-wrapper">
<?php

if ( isset($_POST["logout"]) ) {
	// logout kardan karbar
	session_destroy();
	// ferestadan karbar be safe asli site
	header("Location:index.php");
}

// agar karbar az ghabl login karde bud:
if ( isset($_SESSION['name']) ){
	
?>

<center> دانشجو گرامی شما از قبل لاگین کرده اید میتوانید به صفحه اصلی مراجعه فرمایید یا از سیستم خارج شوید
<br/>
جهت ورود به صفحه اصلی سایت میتوانید <b><a href="index.php" >اینجا</a></b> را کلیک کنید
<br/><br/>
 <form action="" method="post" >
 	<input type="submit" name="logout" value="خروج از سایت" />
 </form>
  </center>
<?php
}
else{
	?>
    
    <form action="" method="post" class="_form">
	<table border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="24%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th>شماره دانشجویی</th>
			<td>				<input name="username" id="field_name" maxlength="50" type="text">
							</td>
		</tr>
				<tr>
		 
			<th><label for="field_family">رمز عبور</label></th>
			<td>				<input name="password" id="field_family" maxlength="40" type="password">
							</td>
		</tr>
				<tr>
					<td colspan="2" class="buttons nobg">
							<input type="submit" value="ورود" name="submit" class="text_only has_text button">
                <?php
}
 if ( isset($_POST["submit"]) ) {
	if ( !empty($_POST["username"]) AND !empty($_POST["password"]) ){
		$username= htmlentities($_POST["username"]);
		$password=md5($_POST["password"]);
		
		// checking databaste

		$query="SELECT * FROM `user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";

		$result = mysql_query( $query )or die("<br/><br/><b>خطا در چک کدرن اطلاعات دیتابیس</b>".mysql_error()) ;
		
		$numrows=mysql_num_rows($result);
		
		//$query_row = mysql_fetch_assoc($query) ;
		if ( $numrows>=1) {
			$name= mysql_result($result,0,'name');
			$email= mysql_result($result,0,'email');
			$username=mysql_result($result,0,'username');
			$address=mysql_result($result,0,'address');
			$vorodi=mysql_result($result,0,'vorodi');
			$lastname=mysql_result($result,0,'lastname');
			echo "<br/> $name عزیز ورود شما با موفقیت انجام شد";
			$_SESSION['name']=$name;
			$_SESSION['email']=$email;
			$_SESSION['lastname']=$lastname ;
			$_SESSION['vorodi']= $vorodi;
			$_SESSION['address']=$address ;
			$_SESSION['username']=$username ;
			
			header("Location:index.php");
			}
			else{
			echo "<br/> شماره دانشجویی یا رمز عبور اشتباه است";
			}
		
		}
		else {
		echo "<br/><br/><b>
		خطا , لطفا اطلاعات وروردی را مجددا چک کنید و تصحیح کنید</b>" ;
		}
		
 }

?>
						</td>
		</tr>
			</tbody></table>
</form>														</div>
				</div>
							<div class="cb"></div>
<?php include("pagefooter.php"); ?>


