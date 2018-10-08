public class barco extends veiculo {
	
	private	String vela;
	private String assoalho;
	private	String material;
	
	public barco() {
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}
	
	public String getVela(){
		return this.vela;
	}
	public void setVela(String vel){
		this.vela = vel;
	}
	public String getAssoalho(){
		return this.assoalho;
	}
	public void setAssoalho(String ass){
		this.assoalho = ass;
	}
	public String getMaterial(){
		return this.material;
	}
	public void setMaterial(String mat){
		this.material = mat;
	}
	public void navega(){
		System.out.println("Navegando");
	}
	public void boia(){
		System.out.println("Boiando");
	}
}
		
