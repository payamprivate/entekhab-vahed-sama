<?php
include("db.php");
include("header.php");
include("slidebar.php"); ?>

		<div class="left content">
			<div class="inner" id="container">
							<div class="round-10 white shadow mgb-10">
<?php 
	if ( isset($_GET['m']) ) {
		
		if ( isset($_SESSION['email']) ){
			
		//moshakhsat karbar:
			$name=$_SESSION['name'];
			$lastname=$_SESSION['lastname'];
			$mobile=$_SESSION['mobile'];
			$address=$_SESSION['address'];
			$zipcode=$_SESSION['zipcode'];
			$email=$_SESSION['email'];
		
		//search vojod dashtane mahsol dar database
			$id=$_GET['m'];
			$query="SELECT * FROM `mahsolat` WHERE `id` =$id";
			$result = mysql_query( $query )or die("<br/><br/><b>خطا در چک کدرن اطلاعات دیتابیس</b>".mysql_error()) ;
			$numrows=mysql_num_rows($result);
		
		//agar mahsol vojod dasht
			if ($numrows==1){
				$mname=mysql_result($result,0,'name');
				$mdesc=mysql_result($result,0,'decription');
				$mprice=mysql_result($result,0,'price');
				$mnum=mysql_result($result,0,'num');
				
				if ($mnum>=1)
				{
					$tedad=$mnum;
				} else if ($mnum==0){
					$tedad="محصول در انبار موجود نیست";
				}
?>
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
		<th align="left">تعداد محصول در انبار</th>
		<td><? echo $tedad; ?></td>
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
       	    <p><b><span>مشخصات گیرنده سفارش :</span></b></p>
			<p><span>نام :</span> <? echo $name; ?> </p>
			<p><span>نام خانوادگی :</span> <? echo $lastname; ?></p>
			<p><span>ایمیل :</span> <? echo $email; ?></p>
			<p><span>موبایل :</span> <? echo $mobile; ?></p>
			<p><span>آدرس :</span> <? echo $address; ?> </p>
			<p><span>کد پستی :</span> <? echo $zipcode; ?> </p>
		</td>
		<td valign="top" width="50%">
			<p><span></span></p>
            <? if ($mnum>=1){ ?>
			<br/><br/><br/><form method="post" action="sabt2.php" />
            <input type="submit" name="sabt" value="ثبت سفارش" />
            <input type="hidden" name="mid" value="<? echo $id; ?>" />
            </form>
            <? } ?>
			<p><span></span></p>
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
<?php } } else { ?>
<br/><br/><br/><center> کاربر گرامی جهت سفارش شما باید اول در سایت ثبت نام کنید, و سپس با نام کاربری خود در سایت ورود کنید 
<br/>
جهت ثبت نام متیوانید <b><a href="register.php" >اینجا</a></b> را کلیک کنید
</center><br/><br/>
<?php
		 } 
			} include("pagefooter.php"); ?>