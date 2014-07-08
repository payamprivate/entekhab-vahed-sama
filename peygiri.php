<?php
include("db.php");
include("header.php");
include("slidebar.php");

	// agar dokme hazf va passdadan ketab ro zad , ketab dar
	if ( isset($_GET["hazf"]) and isset($_GET["head"]) AND isset($_SESSION['username']) ){
		
		$username=$_SESSION["username"];
		$hazf = $_GET["hazf"];
		$amanatq="DELETE FROM `entekhabi` WHERE `username` LIKE '$username' AND `lessonid` =$hazf";
		
		mysql_query($amanatq) or die("cant delete data on database");
		
		$head=$_GET['head'];
		$head=$head+1;
		
		$updateq="UPDATE `lessons` SET `head` = $head WHERE `serial` =$hazf";
		mysql_query($updateq) or die("cant update hazf data to database".mysql_error() );
		
	}
	 ?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">
					<div class="ttl">دروس برداشته شده توسط دانشجو</div>
					<div class="pd-10" id="content-wrapper">
<?php
 	if ( isset($_SESSION['username']) ) {
		$username=$_SESSION['username'];
		$query="SELECT * FROM `entekhabi` WHERE `username` = '$username'";
		$result=mysql_query($query)or die("cant search the database ");
		$lessonserial=array();
		$num_rows=mysql_num_rows($result);
		if ($num_rows>=1 ){
		for ($i=0;$i<$num_rows;$i++){
				$lessonserial[]=mysql_result($result,$i,'lessonid');
				//echo $bookserial[$i].'<br/>';
		}
		?>
        
        <table class="_form" border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="12%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th><label for="field_name">نام درس</label></th><th><label for="field_name">دسته</label></th>
            <th><label for="field_name">استاد</label></th><th><label for="field_name">تاریخ و زمان امتحان</label></th>
            <th><label for="field_name">محل کلاس</label></th> <th><label for="field_name">کد درس</label></th>
            <th><label for="field_name"></label></th>
		</tr>
        	<tr>
            
        <?php
		for ($i=0;$i<$num_rows;$i++){
			
			$query="SELECT * FROM `lessons` WHERE `serial` =$lessonserial[$i]";
			$result=mysql_query($query) or die("cant search book from database");
			$numbook=mysql_num_rows($result);
			if ($numbook==0) {
				echo "<li>این درس در دیتا بیس موجود نیست</li>";
			}
			else
			{
				$lessonname=mysql_result($result,0,'name');
				$lessoncat=mysql_result($result,0,'cat');
				$lessontime=mysql_result($result,0,'time');
				$lessonteacher=mysql_result($result,0,'teacher');
				$lessonclass=mysql_result($result,0,'class');
				$lessonhead=mysql_result($result,0,'head');
				?>
                
			<tr>
            <td><? echo $lessonname ?></td>
            <td><? echo $lessoncat ?></td>
            <td><? echo $lessonteacher ?></td>
            <td><? echo $lessontime ?></td>
            <td><? echo $lessonclass ?></td>
            <td><? echo $lessonserial[$i] ?></td>
            <td><center><a href="peygiri.php?hazf=<? echo $lessonserial[$i]; ?>&head=<? echo $lessonhead; ?>" ><input type="button" name="hazf" class="text_only has_text button" value="حذف درس" /></a></center></td>
            </tr>
			
                <?php
			}
				
		}
		?> </tbody></table></form> <?php
		
		} else
			echo "<br/><center><b>هیچ درسی توسط شما انتخاب نشده</b></center>";
			
	}else
		echo "<br/><center><b>لطفا جهت مشاهده دروس انتخابی خود ابتدا با شماره دانشجویی خود وارد سیستم شوید <br/>
		جهت ورود به سیستم میتوانید <a href='login.php' >>>اینجا<<</a> را کلیک کنید </b></center>";
?>
    
   
                <?php
	
	
 	
			?>
  
													</div>
				</div>
							<div class="cb"></div>
<?php include("pagefooter.php"); ?>


