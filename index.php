<?php
include("db.php");
include("header.php");
include("slidebar.php"); 

	if ( isset($_GET["entekhab"]) AND isset($_GET["head"]) ){
		
		
		$username=$_SESSION["username"];
		$entekhab = $_GET["entekhab"];
		$head = $_GET["head"];
		$head = $head - 1 ;
		$entekhabq="INSERT INTO `entekhabi` (`id` , `username` , `lessonid`) VALUES ( NULL , '$username', '$entekhab' )";
		mysql_query($entekhabq) or die("cant insert darse entekhabi data to database");
		
		$updateq="UPDATE `lessons` SET `head` = '$head' WHERE `serial` =$entekhab";
		mysql_query($updateq) or die("cant update head data to database".mysql_error() );
		
	}

?>

<?php
	
	$query="SELECT * FROM `lessons`";
	$result=mysql_query($query)or die("cant search the database");
	$rows=mysql_num_rows($result);
?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">

 
  					<div class="ttl">انتخاب واحد مجازی</div>
					<div class="pd-10" id="content-wrapper">
																			<div class="prod">
							<div class="text">
								<p style="text-align: center;">
	<br>
	<img align="middle" alt="انتخاب واحد" class="decoded" src="files/library6.jpg"></p>
<p style="text-align: center;">&nbsp;
	</p>
    
    </div>
</div>
<p style="text-align: justify;">
	<b> لیست دروس ارایه شده : </b><br/>
    
	<table class="_form" border="0" cellpadding="5" cellspacing="4" width="100%">
		<colgroup valign="middle" width="12%"></colgroup>
		<colgroup valign="middle"></colgroup>
				<tbody><tr>
		 
			<th><label for="field_name">نام درس</label></th><th><label for="field_name">دسته</label></th>
            <th><label for="field_name">استاد</label></th><th><label for="field_name">زمان و تاریخ امتحان</label></th>
            <th><label for="field_name">محل کلاس</label></th><th><label for="field_name">کد درس</label></th> 
            <th><label for="field_name">ظرفیت</label></th>
            
		</tr>
        
            <?
			
			if ($rows>=1){
				
				$lessonname=array();
				$time=array();
				$class=array();
				$serial=array();
				$teacher=array();
				$head=array();
				$cat=array();
				while ($query_run=mysql_fetch_assoc($result) ){
					$lessonname[]=$query_run['name'];
					$time[]=$query_run['time'];
					$teacher[]=$query_run['teacher'];
					$class[]=$query_run['class'];
					$serial[]=$query_run['serial'];
					$cat[]=$query_run['cat'];
					$head[]=$query_run['head'];
				}
				
				for ($i=0; $i < $rows ; $i++){
					echo "<tr>";
					echo "<td>".$lessonname[$i]."</td>";
					echo "<td>".$cat[$i]."</td>";
					echo "<td>".$teacher[$i]."</td>";
					echo "<td>".$time[$i]."</td>";
					echo "<td>".$class[$i]."</td>";
					echo "<td>".$serial[$i]."</td>";
					if ( !$head[$i]==0 ){
						?>
                        <td>
                        <label><center>ظرفیت: <? echo $head[$i]; ?></center><br/></label>
                       <? if ( isset($_SESSION["username"]) ) { ?>
                       		<?  $username=$_SESSION["username"];
							    $query3="SELECT * FROM `entekhabi` WHERE `username` LIKE '$username' AND `lessonid` =$serial[$i] ";
								$resultnew=mysql_query($query3) or die ("cant get queryy");
								if ( !mysql_num_rows($resultnew)>=1 ){
							 ?>
                        <center>
                        <a href="index.php?entekhab=<? echo $serial[$i]; ?>&head=<? echo $head[$i]; ?>" ><input type="button" name="submita" class="text_only has_text button" value="انتخاب درس" /></a></center></td>
                        	<? } else { echo "<center>برداشته شده</center>"; }?>
                        <? } else { ?>
                       <label><center> جهت انتخاب واحد ابتدا باید وارد شوید <br/></center></label><center>
                       <a href="login.php" ><input type="button" class="text_only has_text button" value="ورود" /></a>
                        </center>
                        </td>
                      <?  }
					} else { echo "<td><center><b> ظرفیت تکمیل است </b></cenetr></td>"; }
					echo "</tr>";
					
							}
				
			?>
            
            </tbody></table>
            
            <?

			} else {
				echo "<br/><center><b> هیچ درسی جهت انتخاب واحد در پایگاه داده ها ثبت نشده است </b></center>";
			}
			?>
		




<br/>


<?php  include("pagefooter.php"); ?>