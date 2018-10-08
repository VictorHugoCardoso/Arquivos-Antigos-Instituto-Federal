import java.io.*;
import java.io.BufferedReader;

public class ex1 {
	public static void main(String[] args) throws Exception {
		String arqEntrada = "custo.csv";		
		String arqSaida = "venda.csv";
		int linha = 1;
		BufferedWriter arqPreco = new BufferedWriter(new FileWriter(arqSaida));
		BufferedReader arqLeitura = new BufferedReader(new InputStreamReader(System.in));
		String x;
		String lucro;
		
		x = "Codigo;Nome;Preco_Venda";
		arqPreco.write(x);
		arqPreco.newLine();
		
		System.out.println("Insira a margem de lucro a sÁ á ça l ãer aplicada aos produtos");
		lucro = arqLeitura.readLine();
		int Lucro = Integer.parseInt(lucro);
		
		while (linha<10){
		arqPreco.write(x); 
		arqPreco.newLine();
		
		linha++;
		
		}	
		arqPreco.close();
	}
}
