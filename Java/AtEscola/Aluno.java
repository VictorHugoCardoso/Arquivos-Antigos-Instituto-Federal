public class Aluno{

	private String nome;
	private String matricula;
	private float nota1,nota2,nota3,nota4;
	
	
	public String getNome(){
		return this.nome;
	}
	
	public void setNome(String n){
		this.nome = n;
	}
	
	public String getMatricula(){
		return this.matricula;
	}
	
	public void setMatricula(String m){
		this.matricula = m;
	}
	
	public float getNota1(){
		return this.nota1;
	}
	
	public float getNota2(){
		return this.nota2;
	}
	
	public float getNota3(){
		return this.nota3;
	}
	
	public float getNota4(){
		return this.nota4;
	}
	
	public void setNota1(float n){
		this.nota1 = n;
	}
	
	public void setNota2(float n){
		this.nota2 = n;
	}
	
	public void setNota3(float n){
		this.nota3 = n;
	}
	
	public void setNota4(float n){
		this.nota4 = n;
	}
	
	public float Calcular_media(){
		float media =(this.nota1+this.nota2+this.nota3+this.nota4)/4;
		return media;
	}
	
}