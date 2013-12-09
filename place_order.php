<?php include "templates/include/header_without_select.php" ?>

	<section id="middle">

		<div id="container">
					<div >

		<div >
			<div class="header">
				<h1>Подать объявление</h1>
			</div>
			<div class="spacer"></div>
			<center><div><p>
			<form id="place_order_form" action="place_order_make.php" onsubmit="checkfields();return false;" enctype="multipart/form-data" method="post">
				<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
				<table>
				<tbody>
					<tr>
						<td class="label_r"></td>
						<td ></td>
						<td style="float:left;"><input type="checkbox" id="mim" onclick="changename('imya');" checked/><span> Частное лицо </span><input id="mor" type="checkbox" onclick="changename('organ');"/><span> Организация</span></td>
						<td></td>
					</tr>
					<tr>
						<td class="label_r"></td>
						<td class="labl"><span id="imya" style="display:block;">*Ваше имя</span><span id="organ" style="display:none;">*Организация</span></td>
					<?php 
						if(isset($_SESSION['id'])){
							echo '<td width="20%"><input type="text" class="order_input" name="login_r" id="login_r" value="'.$_SESSION['name'].'"></td>';
						}else{
							echo '<td width="20%"><input type="text" class="order_input" name="login_r" id="login_r" ></td>';
						}
					?>						
						<td> <span id="l_er" style="color:red;font-size:10px;visibility:hidden;">Пожалуйста введите Ваше имя(Название организации)</span></td>
					</tr>
					<tr>							
						<td class="label_r"></td>
						<td class="labl">*e-mail</td>
						<?php 
						if(isset($_SESSION['id'])){
							echo	'<td><input type="text" name="email_r" class="order_input" id="email_r" value="'.$_SESSION['email'].'"></td>';
						}else{
							echo	'<td><input type="text" name="email_r" class="order_input" id="email_r"></td>';
						}
						?>
						<td><span id="e_er" style="color:red;font-size:10px;visibility:hidden;">Необходимо ввести корректный e-mail адрес</span></td>
					</tr>	
					<tr>							
						<td class="label_r"></td>
						<td ></td>
						<td style="float:left;">&nbsp;&nbsp;<input type="checkbox" name="nomail" id="nomail"/><span style="font-size:12px;vertical-align:middle;"> не показывать e-mail</span></td>
						<td  width="36%" ></td>
					</tr>					
					<tr>							
						<td class="label_r"></td>
						<td class="labl">*Телефон</td>
						<?php 
						if(isset($_SESSION['id'])){
							echo '<td ><input type="text" name="phone_r" class="order_input" id="phone_r" value="'.$_SESSION['phone'].'"></td>';}else{
							echo '<td ><input type="text" name="phone_r" class="order_input" id="phone_r" ></td>';
						}?>
						<td  width="36%"><span id="p_er" style="color:red;font-size:10px;visibility:hidden;">Введите номер телефона</span></td>
					</tr>
					<tr class="order_sel">
						<td class="label_r"></td>
						<td ></td>
						<td>
							<select name="region"  onchange="loadCity(this)">
								<option>Выберите регион</option>
									<?php 
										foreach ($city as $region => $cityList)
										{
											echo '<option value="' . $region . '">' . $region . '</option>' . "\n";
										}
									?>
							</select>
						</td>
						<td ><span id="city_er" style="color:red;font-size:10px;visibility:hidden;">Выберите город</span></td>						
					</tr>
					<tr class="order_sel">
						<td class="label_r"></td>
						<td ></td>
						<td>
							<select name="city" id="city" disabled="disabled">
								<option></option>
							</select>
						</td>	
						<td ></td>
					</tr>
					<tr class="order_sel">
						<td class="label_r"></td>
						<td ></td>
						<td>					<select name="sfera" onchange="loadSfera(this)">
												<option>Выберите категорию</option>
												<?php 
													foreach ($sferaphp as $podsfera => $sferalist)
													{
														echo '<option value="' . $podsfera . '">' . $podsfera . '</option>' . "\n";
													}
												?>
											</select>
										</td>
						<td></td>
					</tr>
					<tr class="order_sel">
						<td class="label_r"></td>
						<td ></td>
						<td>
							<select name="podsfera" id="podsfera"  disabled="disabled">
								<option></option>
							</select>
						</td>
						<td><span id="sfera_er" style="color:red;font-size:10px;visibility:hidden;">Выберите категорию</span></td>
					</tr>
					<tr>							
						<td class="label_r"></td>
						<td class="labl">*Название объявления</td>
						<td ><input type="text" name="order_name" class="order_input" id="order_name"></td>
						<td  width="36%"><span id="order_er" style="color:red;font-size:10px;visibility:hidden;">Введите название объявления</span></td>
					</tr>
					<tr>							
						<td class="label_r"></td>
						<td class="labl">*Цена</td>
						<td ><input type="text" name="order_amount" class="order_input" id="order_amount"></td>
						<td  width="36%"><span id="am_er" style="color:red;font-size:10px;visibility:hidden;">Введите цену</span></td>
					</tr>	
					<tr>
						<td class="label_r"></td>
						<td class="labl">Фото</td>
						<td>
							<table>
								<tbody  id="order_table">
									<tr id="pho_tr">							
										<td><input type="file" accept="image/jpeg,image/png,image/gif" name="photo0" style="margin-left:4px;" class="order_input" id="photo" onchange="add_input(this,0);"></td>
									</tr>
								</tbody>
							</table>
							</td>
						<td  width="36%"></td>
					</tr>
					<tr class="order_sel">
						<td class="label_r"></td>
						<td class="labl">Описание объявления</td>
						<td colspan=2><textarea name="order_descr" id="order_descr"></textarea></td>
					</tr>
					<tr>					
						<td class="label_r"></td>
						<td class="labl"></td>
						<td style="padding: 12px 7px;"><button class="but_r" type="submit" name="submit">разместить объявление</button></td>
						<td  width="36%"></td>
					</tr>
					</tbody>
				</table>
			</form>	
			</div>
		</div>
</div>
		</div><!-- #container-->
		<div class="spacer"></div>


	</section><!-- #middle-->


<?php include "templates/include/footer.php" ?>
