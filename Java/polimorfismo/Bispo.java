public class Bispo extends Peca {

	public void mover(String direcao, int casas){
		System.out.println("Movendo " + casas + " para a direcao " + direcao);
	}
	
	public void comer(String direcao, int casas){
		System.out.println("Comendo peca adversaria");
		this.mover(direcao, casas);
	}
	
}
