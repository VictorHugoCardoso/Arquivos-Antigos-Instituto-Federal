public class aviao extends veiculo{
	
	private String poltronas;
	private String turbina;
	private String empresa;
	
	public aviao(){
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}
	public String getPoltronas(){
		return this.poltronas;
	}
	public void setPoltronas(String polt){
		this.poltronas = polt;
	}
	public String getTurbina(){
		return this.turbina;
	}
	public void setTurbina(String tur){
		this.turbina = tur;
	}
	public String getEmpresa(){
		return this.empresa;
	}
	public void setEmpresa(String emp){
		this.empresa = emp;
	}
	public void voar(){
		System.out.println("Voando");
	}
	public void pouso(){
		System.out.println("Pousando");
	}
}
