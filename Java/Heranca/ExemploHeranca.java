public class ExemploHeranca {
	public static void main(String[] args) {
		Pessoa p1 = new Pessoa ();
		p1.setNome("Pitty");
		p1.setIdade(4);
		p1.setEmail("pitty@hotmail.com");

		Aluno a1 = new Aluno();
		a1.setNome("Padawan");
		a1.setIdade(16);
		a1.setEmail("pad@wan.net");
		a1.setNota1(5);
		a1.setNota2(7);
		a1.setNota3(8);
		a1.setNota4(9);

		System.out.println(a1.getNome());
		System.out.println(a1.getIdade());
		System.out.println(a1.getEmail());
		System.out.println(a1.calcularMedia());
	}
}
