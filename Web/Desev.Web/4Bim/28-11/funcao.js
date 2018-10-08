function aumenta(form){
	reset(form);
	var clique = input.getElementsByTagName('input');
	for(i=0;i<elementos.length;i++){
		var campo = elementos[i];
		if(campo.getAttribute('class') == 'necessario' && campo.value == ""){
			//createElement cria uma nova tag, do tipo span
			span = document.createElement('span');
			// innerHTML é uma forma de por texto na tag.
			span.innerHTML = "Preencha o campo "+campo.name;
			// ParentNode obtem o pai do elemento campo
			// AppendChild anexa a tag recem criada, ao elemento div.
			// pode ser derta forma : campo.parentNode.appendChild(span); ou -->
			var div = campo.parentNode;
			div.appendChild(span);
		}
	}
	return false;
}

