import java.io.BufferedReader;
import java.io.InputStreamReader;

public class LerDados {
	public static void main(String[] args) throws Exception {
		BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
		//System.in: entrada padrao(teclado)
		//InputStreamReader: captura um fluxo de informacao de entrada
		//BufferedReader: buffer de leitura
		
		String linha = "";
		while (!linha.equals("S")) {
			System.out.println("Digite algo ( S para sair ): ");
			linha = reader.readLine();
			System.out.println("Voce Digitou: " + linha + "\n");
		}
	}
}
