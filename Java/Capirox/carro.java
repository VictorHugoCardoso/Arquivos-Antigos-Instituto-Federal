public class carro extends veiculo{
	private String pneu;
	private	String cor;
	private	String modelo;
	
	public carro(){
		super();
		System.out.println("Criando Objeto...");
	}
	public String getPneu(){
		return this.pneu;
	}
	public void setPneu(String p){
		this.pneu = p;
	}
	public String getCor(){
		return this.cor;
	}
	public void setCor(String c){
		this.cor = c;
	}
	public String getModelo(){
		return this.cor;
	}
	public void setModelo(String m){
		this.modelo = m;
	}
	public void andar(){
		System.out.println("Andando");
	}
	public void estragar(){
		System.out.println("Estragui");
	}
}
