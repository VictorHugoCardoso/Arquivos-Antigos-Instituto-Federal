// Estruturas de repetição

class repeticao {
	public static void main(String[] args){
		int val1,cont;
		
		if (args.length < 1 )
		{
			System.out.println("O programa precisa de 1 argumento!");
			System.exit(0);
		}
		val1 = Integer.parseInt(args[0]);
		
		// para
		
		System.out.println ("Repetição do tipo FOR");
		
		for (int i = 0; i <= val1; i ++){
			System.out.println(i);
		}
		
		//enquanto
		System.out.println("Repetição do tipo WHILE");
		cont = 0;
		while (cont <= val1){
			System.out.println(cont);
			cont++;
		}
	
		//faça... enquanto (a logica e diferente do repita.. ate que)

 		System.out.println ("Repetição do tipo DO... WHILE:");
		cont = 0;
		do{
			System.out.println(cont);
			cont++;
		}while(cont <= val1);
	}	
}

