			function changename(par){
				if(par=='imya'){
					document.getElementById('imya').style.display='block';
					document.getElementById('organ').style.display='none';					
					document.getElementById('mor').checked=false;					
				}
				else{
					document.getElementById('imya').style.display='none';
					document.getElementById('organ').style.display='block';					
					document.getElementById('mim').checked=false;								
				}
			}
			function checkfields(){
				if(document.getElementById('login_r').value.match(/^[0-9_а-я_a-z]+$/i) && document.getElementById('login_r').value.length>=2){_sstyle('l_er','hidden');}else{_sstyle('l_er','visible');return false;}
				if(document.getElementById('email_r').value.match(/^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i) && document.getElementById('email_r').value.length>7){_sstyle('e_er','hidden');}else{_sstyle('e_er','visible');return false;}
				if(document.getElementById('phone_r').value.match(/^[0-9]+$/i) && document.getElementById('phone_r').value.length>=6){_sstyle('p_er','hidden');}else{_sstyle('p_er','visible');return false;}
				if(document.getElementById('order_name').value.match(/^[0-9_а-я_a-z]+$/i) && document.getElementById('order_name').value.length>=3){_sstyle('order_er','hidden');}else{_sstyle('order_er','visible');return false;}
				if(document.getElementById('order_amount').value.match(/^[0-9]+$/i)){_sstyle('am_er','hidden');}else{_sstyle('am_er','visible');return false;}
				if(document.getElementById('city').value!=''){_sstyle('city_er','hidden');}else{_sstyle('city_er','visible');return false;}
				if(document.getElementById('podsfera').value!=''){_sstyle('sfera_er','hidden');}else{_sstyle('sfera_er','visible');return false;}
				el=document.getElementById('photo');
				if(document.getElementById('photo').value==''){el.parentNode.removeChild(el);}
				document.getElementById('place_order_form').submit();
			}
			function _sstyle(elem,par){
				document.getElementById(elem).style.visibility=par;
			}
			function add_input(par,i){
				if(par.value!=''){
					elem=document.createElement('tr');
					elem.id='photo'+(i*1+1);
					dfs='photo'+(i*1);
					elem.style.width='100%';
					if(i*1==0){
						document.getElementById('order_table').insertBefore(elem,document.getElementById('pho_tr').nextSibling);
					}else{
						document.getElementById('order_table').insertBefore(elem,document.getElementById(dfs).nextSibling);						
					}
					
					$('#'+elem.id).html('<td ><input type="file" accept="image/jpeg,image/png,image/gif" style="margin-left:4px;" name="'+elem.id+'" class="order_input" id="photo" onchange="add_input(this,'+(i*1+1)+');"></td>');
				
				}
			}
			function checkfields_reg(){
				if(document.getElementById('email').value.match(/^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i) && document.getElementById('email').value.length>7){}else{alert('Введите ваш email');return false;}
				if(document.getElementById('name').value.match(/^[0-9_а-я_a-z]+$/i) && document.getElementById('name').value.length>2){}else{alert('Введите ваше имя');return false;}
				if(document.getElementById('password').value.match(/^[0-9_а-я_a-z]+$/i) && document.getElementById('password').value.length>8){}else{alert('Пароль должен состоять минимум из 8 символов');return false;}
				if(document.getElementById('password').value!=document.getElementById('repassword').value){alert('Введенные пароли не совпадают');return false;}
				if(document.getElementById('phone').value.match(/^[0-9]+$/i) && document.getElementById('phone').value.length>6){}else{alert('Введите ваш номер телефона');return false;}
				document.getElementById('regist').submit();
			}
