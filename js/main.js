	function loadCity(select)
	{
		var citySelect = $('select[name="city"]');
            citySelect.attr('disabled', 'disabled'); 
            $.getJSON('index.php', {action:'getCity', region:select.value}, function(cityList){              
                citySelect.html('');
                $.each(cityList, function(i){
                    citySelect.append('<option value="' + this + '">' + this + '</option>');
                });
                citySelect.removeAttr('disabled'); 
            });
    }
        function loadSfera(select)
        {
            var podsferaSelect = $('select[name="podsfera"]');
            podsferaSelect.attr('disabled', 'disabled');            
            $.getJSON('index.php', {action:'getpodsfera', sfera:select.value}, function(sferalist){
                podsferaSelect.html('');                
                $.each(sferalist, function(i){
                    podsferaSelect.append('<option value="' + this + '">' + this + '</option>');
                });
                podsferaSelect.removeAttr('disabled');
            });
        }		
		function search_input(par){
			if(par.value=='поиск...'){
				par.value='';
			}
		}
		function se_in(par){
			if(par.value==''){
				par.value='поиск...';
			}
		}
		function login(){
			document.getElementById('loginbox').style.display='block';
			document.getElementById('loginpop').style.display='block';
		}	
		function unlogin(){
			document.getElementById('loginbox').style.display='none';
			document.getElementById('loginpop').style.display='none';
		}
		function place_order(){
			location.href='place_order.php';
		}
		function login_f(){
			lo=document.getElementById('login');
			pa=document.getElementById('pass');
			if(lo.value.length<4){alert('Введите логин');return false;}
			if(pa.value.length<4){alert('Введите пароль');return false;}
			document.getElementById('loginForm').submit();
		}