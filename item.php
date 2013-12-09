<?php include "templates/include/header_without_select.php" ?>


	<section id="middle">

		<div id="container">
			<div id="content">
				<?php
					if(isset($_GET['id'])){
						$item=$_GET['id'];
						$query=mysql_query("SELECT * FROM orders WHERE order_id='$item'");
						while($mas=mysql_fetch_array($query)){
							$ff=explode(":",$mas['photo']);
							$ff=explode(".jpg",$ff[0]);
							$item_descr=$mas['order_descr'];
							$item_name=$mas['order_name'];
							$item_holder=$mas['name_holder'];
							$phone=$mas['phone'];
							$item_city=$mas['gorod'];
							$price=$mas['order_amount'];
						}		
					}
				?>
							<div class="spacer"></div>
				<div class="header_advert">
					<?php echo $item_name; ?>
				</div>
				<div class="spacer"></div>
			
			<div class="item_descr" >
					
					<textarea readonly><?php echo $item_descr; ?></textarea>
					<strong>Цена:&nbsp;&nbsp;</strong><span><?php echo $price; ?></span><br>
					<strong>Контактное лицо:&nbsp;&nbsp;</strong><span><?php echo $item_holder; ?></span><br>
					<strong>Телефон:&nbsp;&nbsp;</strong><span><?php echo $phone; ?></span><br>
					<strong>Город:&nbsp;&nbsp;</strong><span><?php echo $item_city; ?></span>
			</div>
			<div class="spacer"></div>
			<div class="item_photo" >
				<?php if($ff[0]==''){$ff[0]='(small)';}
					echo	'<img src="'.$ff[0].'.jpg"/>';
				?>
			</div>
			</div><!-- #content-->
		</div><!-- #container-->
		<div class="spacer"></div>
		<aside id="sideRight">
			<strong>Реклама</strong>
		</aside><!-- #sideRight -->

	</section><!-- #middle-->

<?php include "templates/include/footer.php" ?>
