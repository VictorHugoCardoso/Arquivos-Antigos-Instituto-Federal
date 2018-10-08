import java.io.*;

public class ExemploEscritaArquivo {
	// Exemplo de escrita em arquivo
	public static void main(String[] args) throws Exception{
		String arqSaida = "arqSaida.txt";
		BufferedWriter arqGravacao = new BufferedWriter(new FileWriter(arqSaida));
		String linha;
		
		linha = "Texto....";
		arqGravacao.write(linha);
		arqGravacao.newLine();
		
		linha = "mais texto.";
		arqGravacao.write(linha);
		arqGravacao.newLine();
		
		linha = "blah, blah, blah,,,,,";
		arqGravacao.write(linha);
		arqGravacao.newLine();
		
		arqGravacao.close();
	}
}
