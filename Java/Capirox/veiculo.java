public class veiculo{ 
	private String chassi;
	private String motor;	
	private String marca;
	
	public veiculo(){
	}
	
	public String getChassi(){
		return this.chassi;
	}
	public void setChassi (String chas){
		this.chassi = chas;
	}
	public String getMotor(){
		return this.motor;
	}
	public void setMotor(String mot){
		this.motor = mot;
	}
	public String getMarca(){
		return this.marca;	
	}
	public void setMarca(String marc){
		this.marca = marc;
	}

	public void acelerar(){
		System.out.println("Acelerar");
	}
	public void abastecer(){
		System.out.println("Abastecer");
	}
	public void marcha(){
		System.out.println("Trocar Marcha");
	}
}
