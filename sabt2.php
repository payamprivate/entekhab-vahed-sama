<?php

include("db.php");
include("header.php");
include("slidebar.php");
error_reporting(0); ?>

<?php 
	if ( isset($_POST['mid']) ) {
		
		if ( isset($_SESSION['email']) ){
			
		//moshakhsat karbar:
			$name=$_SESSION['name'];
			$lastname=$_SESSION['lastname'];
			$mobile=$_SESSION['mobile'];
			$address=$_SESSION['address'];
			$zipcode=$_SESSION['zipcode'];
			$email=$_SESSION['email'];
			
		//tarikh
			$date=date('dهم ماه M سال Y ساعت: H:i:s',time());
		
		//search vojod dashtane mahsol dar database
			$id=$_POST['mid'];
			$query="SELECT * FROM `mahsolat` WHERE `id` =$id";
			$result = mysql_query( $query )or die("<br/><br/><b>خطا در چک کدرن اطلاعات دیتابیس</b>".mysql_error()) ;
			$numrows=mysql_num_rows($result);
		
		//agar mahsol vojod dasht
			if ($numrows==1){
				$mname=mysql_result($result,0,'name');
				$mdesc=mysql_result($result,0,'decription');
				$mprice=mysql_result($result,0,'price');
				$mnum=mysql_result($result,0,'num');
				
				$peygiri= rand(1000000, 99999999);
				
				// agar mahsol dar anbar mojod bod
				
				if ($mnum>=1){
					$query="INSERT INTO `sam-project`.`sefaresh` ( `id` , `username` , `mahsolid` , `rahgiri` , `date` ) VALUES ( NULL , '$email', '$id', '$peygiri' , '$date');";
					$add=mysql_query($query) or die("خطا در اینسرت کردن اطلاعات به دیتابیس");
					
					echo "<br/><br/><b><center>سفارش شما با موفقیت صورت گرفت کد پیگیری سفارش شما $peygiri</center><b><br/><br/>";
					
					//kam kardan yek adad az mahsol dar database
					$mnum=$mnum-1;
					$query="UPDATE `sam-project`.`mahsolat` SET `num` = '$mnum' WHERE `mahsolat`.`id` =$id;";
					$update=mysql_query($query) or die ("خطا در کم کردن محصول از دیتابیس");
					
					//email dadan bad az takmil sefaresh:
					$message="$name عزیز سفارش شما با موفقیت صورت گرفت , کد پیگیری سفارش شما:$peygiri";
					$subject="ثبت سفارش با موفقیت انجام شد";
					mail($email,$subject,$message);
				
?>


		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">
					<div class="ttl">مشاهده جزئیات سفارش</div>
					<div class="pd-10" id="content-wrapper">
																													<table class="table" border="0" cellpadding="5" cellspacing="2" width="100%">
	<tbody><tr>

		<th width="50%">عنوان</th>
		<th width="6%">تعداد</th>
		<th width="17%">قیمت واحد</th>
		<th width="17%">قیمت کل</th>
	</tr>
		<tr>
		<td><? echo $mname; ?></td>
		<td>1</td>
		<td><? echo $mprice; ?></td>
		<td><? echo $mprice; ?></td>
	</tr>
		<tr>
		<td colspan="3" class="nobg"></td>
		<th align="left">جمع کل</th>
		<td><? echo $mprice; ?></td>
	</tr>
	<tr>
		<td colspan="3" class="nobg"></td>
		<th align="left">هزینه پست و خدمات</th>
		<td>0 ریال</td>
	</tr>
	<tr>
		<td colspan="3" class="nobg"></td>
		<th align="left">تخفیف</th>
		<td>0 ریال</td>
	</tr>
	<tr>
		<td colspan="3" class="nobg"></td>
		<th align="left">مبلغ نهایی سفارش</th>
		<td class="important"><? echo $mprice; ?></td>
	</tr>
</tbody></table>
<table cellpadding="0" cellspacing="10" width="100%">
	<tbody><tr>
		<td valign="top" width="50%">
			<p><span>نام :</span> <? echo $name; ?> </p>
			<p><span>نام خانوادگی :</span> <? echo $lastname; ?></p>
			<p><span>ایمیل :</span> <? echo $email; ?></p>
			<p><span>موبایل :</span> <? echo $mobile; ?></p>
			<p><span>آدرس :</span> <? echo $address; ?> </p>
			<p><span>کد پستی :</span> <? echo $zipcode; ?> </p>
		</td>
		<td valign="top" width="50%">
			<p><span>تاریخ ثبت :</span> <? echo $date; ?></p>
			<p><span>نوع سفارش :</span> پستی</p>
			<p><span>نحوه ارسال :</span> ارسال با پست سفارشی</p>
			<p><span>وضعیت سفارش :</span> <b><span style="color:#FFCC00">ثبت شده</span></b></p>
			<p><span>کد پیگیری :</span> <b dir="ltr">11-13999759556-6299</b></p>
		</td>
	</tr>
</tbody></table>
														</div>
				</div>
							<div class="cb"></div>
				<div class="white shadow menu offers mgt-10">
					<div class="ttl round-10">پرفروش ترین محصولات</div>
					<div class="pd-10">
						<ul class="vul right">
														<li id="offer_400">
								<a href="http://kharid0098.com/product/view/400" onmouseover="offer_info(400)">گوشی 2 سیمکارته طرح آیفون 5s</a>
							</li>
														<li id="offer_76">
								<a href="http://kharid0098.com/product/view/76" onmouseover="offer_info(76)">سیم کارت ریدر</a>
							</li>
														<li id="offer_412">
								<a href="http://kharid0098.com/product/view/412" onmouseover="offer_info(412)">فروش ویژه گوشی موبایل طرح آیفون 5 با سیستم عامل اندروید</a>
							</li>
														<li id="offer_130">
								<a href="http://kharid0098.com/product/view/130" onmouseover="offer_info(130)">تیشرت لاغری مردانه</a>
							</li>
														<li id="offer_104">
								<a href="http://kharid0098.com/product/view/104" onmouseover="offer_info(104)">بلوتوث با قابلیت اتصال به اینترنت</a>
							</li>
													</ul>
						<div id="offer_info" class="left">
						
						</div>
						<div class="cb"></div>
					</div>
				</div>
				<div class="cb"></div>
			</div>
		</div>
		<div class="cb"></div>
<?php
}
				else {
					echo "<br/><br/><b><center>سفارش شما ثبت نشد - محصول مورد نظر شما در انبار موجود نیست</center></b><br/>";
				}
 }
		 } 
			} include("pagefooter.php"); ?>