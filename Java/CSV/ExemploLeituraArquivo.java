import java.io.*;

public class ExemploLeituraArquivo {
	// Exemplo de leitura de arquivo
	public static void main(String[] args) throws Exception{
		String arqEntrada = "clientes.csv";
		BufferedReader arqLeitura = new BufferedReader(new FileReader(arqEntrada));
		String linha;
		while ((linha = arqLeitura.readLine()) != null) {
			System.out.println(linha);
		}
		arqLeitura.close();
	}
}
