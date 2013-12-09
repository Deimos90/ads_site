//Функция проверки заполненности полей и корректности мыла
function thisform(form){
	if(form.email.value == ""){
		alert('Вы не ввели email');
		return false;
	}
	else {
		var email = form.email.value;
		var regV = /[a-z0-9-_]{2,1000}\@[a-z0-9\-\_]{2,100}\.[a-z0-9]{2,4}/gi;
		var result = email.match(regV);
		if(!result){
			alert ('Введите корректный email');
			return false;
		}
		if(form.name.value == ""){
		alert ('Вы не ввели имя');
		return false;
	    }
	   if(form.password.value == ""){
	    alert ('Введите пароль');
		return false;
	}
	   if(form.repassword.value == ""){
	    alert ('Повторите пароль');
		return false;
	}
	  if(form.password.value != form.repassword.value){
	     alert ('Пароли не совпадают');
		 return false;
	  } 
	
 
}
}