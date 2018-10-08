class conversao {
	public static void main (String [] args) {	
		int i1;
		Integer i2;
		String s1 = "33";
		String s2 = "21";
		
		// converter de String para int
		i1 = Integer.parseInt(s1);
		System.out.println(i1);
		i2 = Integer.parseInt(s2);
		System.out.println(i2);
		
		//converte de inteiro para String
		
		s1 = i2.toString();
		//i1.toString() nao funciona porque
		// i1 e do tipo primitivo
		
		//transforma para double
		double d1 = i2.doubleValue();
		//transforma para float
		float f1 = i2.floatValue();
		//transforma para int
		i1 = i2.intValue();
		i1 = i2; //da o mesmo resultado
	}
}
