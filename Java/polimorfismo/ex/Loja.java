public class Loja{
	public static void main(String[] args){
	
	Vendedor vend = new Vendedor();	
	float com = vend.calcularComissao(500f,0.15f);
	System.out.println("Comissao de " + com);
	com = vend.calcularComissao(100f);
	System.out.println("Comissao de " + com);
	Vendedor vend1 = new Vendedor();
	com = vend1.calcularComissao(350f);
	System.out.println("Comisssao de " + com);
	}
}
