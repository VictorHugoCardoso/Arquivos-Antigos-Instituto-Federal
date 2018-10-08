import java.io.*;

public class TrataExcecoes {

	public static void main (String[] args) {
		TrataExcecoes tr1 = new TrataExcecoes();
		tr1.lerArquivo();
	}

	public void lerArquivo(){
	
		try{
		String arqEntrada = "arqEntradaaa.txt";
		BufferedReader arqLeitura = new BufferedReader(new FileReader(arqEntrada));
		String linha;

		while((linha = arqLeitura.readLine()) != null) {
			System.out.print(linha + "\n");
		}
		}catch(FileNotFoundException e1){
			System.out.println("Erro...  Arquivo Nao Encontrado");
			System.out.println("Descricao do erro: " + e1.getMessage());
		}catch(Exception e2){
			System.out.println("Erro...");
			System.out.println("Descricao do erro: " + e2.getMessage());
		}finally{
			System.out.println("FIM DE EXECUCAO.");
		}

	}
}
