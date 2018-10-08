public class tanque extends veiculo{
	private String  municao;
	private String  quantidadep; // quantidade de pessoas que cabe
	private String  dpm; // disparos por minutos
	
	public tanque(){
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}

	public String getMunicao(){
		return this.municao;
	}
	public void setMunicao (String mun){ 
		this.municao =  mun;
	}
	public String getQuantidadep(){
		return this.quantidadep;
	}
	public void setQuantidadep (String qp){
		this.quantidadep = qp ;
	}
	public String getDpm(){
		return this.dpm;
	}
	public void setDpm(String dp){
		this.dpm = dp;
	}
	public void atirar(){
		System.out.println("Atirando");
	}
	public void escalando(){
		System.out.println("Escalando");
	}
}
		
