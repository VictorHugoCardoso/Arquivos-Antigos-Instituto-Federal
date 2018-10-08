public class onibus extends veiculo{
	private String  assento;
	private String catraca;
	private String  portas;
	
	public onibus(){
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}

	public String getAssento(){
		return this.assento;
	}
	public void setAssento(String as){
		this.assento = as;
	}
	public String getCatraca(){
		return this.catraca;
	}
	public void setCatraca(String cat){
		this.catraca = cat;
	}
	public String getPortas(){
		return this.portas;
	}
	public void setPortas(String port){
		this.portas = port;
	}
	public void transportar(){
		System.out.println("Transportando");
	}
}	
