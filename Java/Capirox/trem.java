public class trem extends veiculo{
	private String  vagoes;
	private	String  lenha;
	private String  cadeiras;
	
	public trem(){
		super();
		System.out.println("Criando Objeto..." + "\n" );
	}
	
	public String getVagoes(){
		return this.vagoes;
	}
	public void setVagoes(String vag){
		this.vagoes = vag ;
	}
	public String getLenha(){
		return this.lenha;
	}
	public void setLenha(String l){
		this.lenha = l;
	}
	public String getCadeiras(){
		return this.cadeiras;
	}
	public void setCadeiras(String cad){
		this.cadeiras = cad ;
	}
	public void freia(){
		System.out.println("Freiando");
	}
}
