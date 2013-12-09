<?php

require_once('login.php'); 
require_once('city.php'); // подключаем список с городами
require_once('sfera.php'); 
require_once('mount.php'); 
require('paging.inc.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// возвращаем список городов
if ($action == 'getCity')
{
    if (isset($city[$_GET['region']]))
    {
        echo json_encode($city[$_GET['region']]); // возвраащем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите область'));
    }

    exit;
}
if ($action == 'getpodsfera')
{
    if (isset($sferaphp[$_GET['sfera']]))
    {
        echo json_encode($sferaphp[$_GET['sfera']]); // возвраащем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите сферу'));
    }

    exit;
}
if ($action == 'postResult')
{
    echo '<pre>' . htmlspecialchars(print_r($_POST, true)) . '</pre>';
    exit;
}
?>

<?php include "templates/include/header.php" ?>

	<section id="middle">

		<div id="container">
			<div id="content">
							<div class="spacer"></div>
				<div class="header_z">
					<ul class="desc">
						<li class="tag_n1" >
							Название
						</li>

						<li class="tag_n11">
							Фото
						</li>

						<li class="tag_n12">
							Описание
						</li>
					

						<li class="tag_n13">
							Цена
						</li>	

						<li class="tag_n14">
							Дата
						</li>							
					</ul>
				</div>
			
		<div>
		<?php	
			$_PAGING = new Paging($_DB);
			if(isset($_POST['search'])){
				$ss=$_POST['search'];
				$r = $_PAGING->get_page("SELECT * FROM orders WHERE order_name LIKE '%$ss%'");
			//	$query=mysql_query("SELECT * FROM orders");
				if(mysql_num_rows(mysql_query("SELECT * FROM orders WHERE order_name LIKE '%$ss%'"))!=0){
				while($mas = $r->fetch_assoc())
				{
				//	while($mas=mysql_fetch_array($query)){
						$ff=explode(":",$mas['photo']);
						$ff=explode(".jpg",$ff[0]);
						$ff=$ff[0].'(small).jpg';
						echo '<div class="adv"><div class="tag_n1"><a href="item.php?id='.$mas['order_id'].'">'.$mas['order_name'].'</a>('.$mas['gorod'].')</div>';
						echo '<div class="tag_n11"><img src="'.$ff.'"/></div>';
						echo '<div class="tag_n12">'.$mas['order_descr'].'</div>';
						echo '<div class="tag_n13"><center>'.$mas['order_amount'].'</div>';
						echo '<div class="tag_n14">'.$mas['data'].'</div>';
						echo '</div><div class="space_t"></div>';
					}
									echo 'Страницы: '.$_PAGING->get_prev_page_link().' '.$_PAGING->get_page_links().' '.$_PAGING->get_next_page_link().'&nbsp;&nbsp;&nbsp;&nbsp;';
				echo ''.$_PAGING->get_result_text().' объявлений<p>';
			}else{
				echo '<div class="adv">По вашему запросу ничего не найдено.</div>';
			}
			}
		?>													

		</div>	
			</div><!-- #content-->
		</div><!-- #container-->
		<div class="spacer"></div>
		<aside id="sideRight">
			<strong>Adv:</strong>
		</aside><!-- #sideRight -->

	</section><!-- #middle-->

<?php include "templates/include/footer.php" ?>
