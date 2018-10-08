public class Peao extends Peca {
	
	public void comer(String direcao){
		if(direcao.equals("D")){
			System.out.println("Comendo peca a direita.");
		}else if(direcao.equals("E")){
			System.out.println("Comendo peca a Esquerda.");
		}else{
			System.out.println("Direcao Invalida.");
		}
	}
}
