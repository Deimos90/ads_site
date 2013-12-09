<?php

require_once('log.php'); 
require_once('include/config.php'); 
require('include/paging.inc.php');
?>

<?php include "templates/include/header_without_select.php" ?>

<section id="middle">
<script>
function place_order(){
	location.href='place_order.php';
}
</script>

		<div id="container">	
			<div id="content">
			<div class="spacer"></div>
			<div class="pro_left_menu">
				<div class="pro_me_item"><span><a href="pro_adv.php">Мои обьявления</a></span></div>
				<div class="pro_me_item"><span><a href="profile.php">Личные данные</a></span></div>
			</div>
			<div>
				
			</div>
			</div><!-- #content-->

			<div id="content">
							<div class="spacer"></div>
				<div class="header_zz">
					<ul class="desc">
						<li class="tag_n1" >
							Название
						</li>

						<li class="tag_n11">
							Фото
						</li>


						<li class="tag_n13">
							Цена
						</li>	
					<li class="tag_n13">
							Дата
						</li>
						<li class="tag_n14">
							Изменить
						</li>						
					</ul>
				</div>

			
		<div class="z_zz">
		<?php	
			$_PAGING = new Paging($_DB);

			if(isset($_SESSION['id'])){
				$id=$_SESSION['id'];
				$r = $_PAGING->get_page("SELECT * FROM orders WHERE id_user='$id'");
			//	$query=mysql_query("SELECT * FROM orders");
			if(mysql_num_rows(mysql_query("SELECT * FROM orders WHERE id_user='$id'"))!=0)
			{
				while($mas = $r->fetch_assoc())
				{
				//	while($mas=mysql_fetch_array($query)){
						$ff=explode(":",$mas['photo']);
						$ff=explode(".jpg",$ff[0]);
						$ff=$ff[0].'(small).jpg';
						echo '<div class="adv"><div class="tag_n1"><a href="item.php?id='.$mas['order_id'].'">'.$mas['order_name'].'</a>('.$mas['gorod'].')</div>';
						echo '<div class="tag_n11"><img src="'.$ff.'"/></div>';
						echo '<div class="tag_n13"><center>'.$mas['order_amount'].'</center></div>';
						echo '<div class="tag_n14">'.$mas['data'].'</div>';
						echo '<div class="tag_n15"><a href="pro_adv_up.php?id='.$mas['order_id'].'&price='.$mas['order_amount'].'&name='.$mas['order_name'].'&descr='.$mas['order_descr'].'">изменить</a><br><a href="del.php?id='.$mas['order_id'].'">удалить</a></div>';
						echo '</div><div class="space_tt"></div>';
				}
				echo 'Страницы: '.$_PAGING->get_prev_page_link().' '.$_PAGING->get_page_links().' '.$_PAGING->get_next_page_link().'&nbsp;&nbsp;&nbsp;&nbsp;';
					echo ''.$_PAGING->get_result_text().' объявлений<p>';
			}else{
						echo '<div class="adv"><center>По вашему запросу ничего не найдено.</center></div>';						
				
					}


			}
?>													

		</div>	
			</div><!-- #content-->
		</div><!-- #container-->
		<div class="spacer"></div>


	</section><!-- #middle-->
<?php include "templates/include/footer.php" ?>