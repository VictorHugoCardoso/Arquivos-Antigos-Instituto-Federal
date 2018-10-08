public class moto extends veiculo{

	private String tamrodas;
	private String guidao;	
	
	public moto(){
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}
	
	public String getTamrodas(){
		return this.tamrodas;
	}
	public void setTamrodas(String rodas){
		this.tamrodas = rodas;
	}
	public String getGuidao(){
		return this.guidao;
	}
	public void setGuidao(String gui){
		this.guidao = gui;
	}

	public void empinar(){
		System.out.println("Empinar");
	}
	public void rodar(){
		System.out.println("Rodar");
	}
}
