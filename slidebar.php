		<div class="right sidebar">
			
			<div class="white2 menu">
				<div class="ttl">منوی اصلی</div>
				<div class="pd-10">
					<ul class="vul">
                    <? if (isset( $_SESSION['name'] ) ){?>
                    <p align="center"> خوش آمدید <? echo $_SESSION['name']; ?> عزیز
                    <? } ?>
						<li class="first"><a href="index.php" title="صفحه اصلی">صفحه اصلی</a></li>
                        
                    <? if (!isset( $_SESSION['name'] ) ){?>
						<li><a href="login.php" title="داشبورد">ورود دانشجو</a></li>
                    <? } ?>

						<li class="last"><a href="about.php" title="">درباره پروژه</a></li>
					</ul>
				</div>
			</div>
            
			<div class="white2 menu">
		    <div class="ttl">دسته بندی دروس</div>
				<div class="pd-10">
					<ul id="latest_products_list" class="latest_products_list">
                    <li><a href="cat.php?cat=عمومی">عمومی</a></li>
                    <li><a href="cat.php?cat=اختصاصی">اختصاصی</a></li>
                    </ul></div>
			</div>

		</div>