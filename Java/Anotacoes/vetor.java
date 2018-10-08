public class vetor {
	//declara um vetor de String, mas nao pode popular aqui
	public String[] itens;
	
	public static void main (String[] args) {
		//declara um vetor de inteiros ja atribuindo valores
		
			int[] valores = {4,7,1,34,9};
			System.out.println(valores[1]);
			
			//declara um vetor de String com 3 posicoes, depois popula cada posicao
			String[] nomes = new String[3];
			nomes[0] = "nome1";
			nomes[1] = "nome2";
			nomes[2] = "nome3";
			System.out.println(nomes[1]);
			//popula o vetor "itens" que foi declarado no inicio da classe 
			//veja que neste caso que e necessario criar um objeto para atribuir valores ao vetor
			TesteArray ta = new TesteArray();
			ta.itens = new String[5];
			ta.itens[0] = "xyz";
			ta.itens[1] = "yyy";
		}
	}

