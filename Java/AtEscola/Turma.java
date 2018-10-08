public class Turma{
	private String nome_curso;
	private int ano;
	private int numeroTurma;
	private Aluno[] vetAlunos;
	
	
	public Turma(){
		this.vetAlunos = new Aluno[40];
	}
	
	public String getNome_curso(){
		return this.nome_curso;
	}
	
	public void setNome_curso(String n){
		this.nome_curso = n;
	}
	
	public int getAno(){
		return this.ano;
	}
	
	public void setAno(int a){
		this.ano = a;
	}
	
	public int getNumeroTurma(){
		return this.numeroTurma;
	}
	
	public void setNumeroTurma(int q){
		this.numeroTurma = q;
	}
	
	public Aluno getAluno(int pos){
		return this.vetAlunos[pos];
	}
	
	public void setAluno(int pos, Aluno a){
		this.vetAlunos[pos] = a;
	}
	
}