class ExemploString {
	public static void main (String [] args) {
	
	String s1, s2;
	
	s1 = "Um texto qualquer    ";
	System.out.println ("[" + s1 + "]");
	
	//para ver o tamamanho do String inicial
	System.out.println(s1.length());
	
	//tirar espaços do início e fim do string
	s1 = s1.trim();
	System.out.println("[" + s1 + "]");

	//para ver o tamamanho do String
	System.out.println(s1.length());


	//converter para maiúsculas
	s1 = s1.toUpperCase ();
	System.out.println (s1);

	//converter para letras minúsculas
	s1 = s1.toLowerCase ();
	System.out.println (s1);
	
	//substring dentro de um sring
	s1 = s1.replaceAll("um", "algum");
	System.out.println (s1);


	//extrair substring
	s2 = s1.substring (6,9);
	System.out.println (s2);
	
	
	// index OF descobre a posição da sub string  dentro da string
	s1 = "bill@gates.com";
	s2 = s1.substring (s1.indexOf("@"), s1.length());
	System.out.println (s2);
	

	// index OF descobre a posição da sub string  dentro da string
	s1 = "bill@gates.com";
	s2 = s1.substring (s1.indexOf("@"), s1.length());
	System.out.println (s2);
	
	s2 = s1.substring(0,s1.indexOf("@"));
	System.out.println (s2);
	
	//Converter de outros tipos para String:
	int op = 5;
	s2 = String.valueOf(op);
	System.out.println(s2);
}

}
