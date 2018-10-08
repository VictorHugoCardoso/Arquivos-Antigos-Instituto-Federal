public abstract class Peca {
	
	private String cor;
	public String getCor(){
		return this.cor;
	}
	
	public void setCor(String c){	
		this.cor = c;
		
	}
	
	public void mover(int casas){
		System.out.println("Movendo "+ casas + " casa(s) para a frente.");
	}
}
