function muda(){
	if(num > 4){
		num = 1;
	}
	var tag = document.getElementById("img");
	tag.src = "imagens/carro" + num + ".png"
	num++
}

function valida(formulario){
	reset(formulario);
	var elementos = formulario.getElementsByTagName('input');
	//percorrer o vetor de campos do formulario
	for(i=0;i<elementos.length;i++){
		var campo = elementos[i];
		if(campo.getAttribute('class')=='necessario' && campo.value == ""){
			// createElement cria uma nova tag, do tipo span
			var span = document.createElement('span');
			span.innerHTML = "Preencha o campo " + campo.name;
			//parrentNode obtem o pai do elemento campo, que no nosso case é a div
			//appendChild anexa a tag recem criada, ao elemento div
			var div = campo.parentNode;	
			div.appendChild(span);
		}
	}
	return false;
	
}
function reset(formulario){
	var spans = formulario.getElementsByTagName('span');
	for(i=0;i<spans.length;i++){
		spans[i].innerHTML="";
	}
}