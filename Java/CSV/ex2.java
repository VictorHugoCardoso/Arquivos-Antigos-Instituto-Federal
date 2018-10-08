import java.io.*;

public class ex2 {
	
	public static void main(String[] args) throws Exception {
	
	String arqEntrada = "custo.csv";
	String arqSaida = "venda.csv";
	BufferedWriter arqGravacao = new BufferedWriter(new FileWriter(arqSaida));
	BufferedReader arqLeitura = new BufferedReader(new FileReader(arqEntrada));
	BufferedReader reader = new BufferedReader( new InputStreamReader(System.in));
	String linha = "";
	String codigo = "";
	String nome = "";		
	String linhax ="";
	String y = "";
	
	linha = arqLeitura.readLine();
	arqGravacao.write("Codigo;Nome;Preco_Venda");
	arqGravacao.newLine();
	
	System.out.println("Escreva a Porcentagem de Lucro");
	float luc = Float.parseFloat(reader.readLine());
	
	float precoVenda = 0;	
	int i = 0;
	int posicao = 0;
		
	while ((linha = arqLeitura.readLine()) != null) {
		posicao = 0;
		i = 0;
	
		while (posicao != -1) {
		i = i + 1; 
		posicao = linha.indexOf(";");
					
		if (posicao != -1) {
		linhax = linha.substring(0,posicao);
		linha = linha.substring(posicao+1, linha.length());
					
		if(i == 1) { 
		codigo = linhax;
		arqGravacao.write(codigo + ";");
		}
		else if(i == 4) {
		precoVenda = Float.parseFloat(linhax);
		precoVenda = precoVenda + (precoVenda * luc / 100);
		y = String.valueOf(precoVenda);
		arqGravacao.write(y);
		}
		else if(i == 3) { 
		nome = linhax;
		arqGravacao.write(nome + ";");
		}		
		}
		else if(posicao == -1) {
		arqGravacao.newLine();
		}
				
	}
	}
		arqLeitura.close();

		arqGravacao.close();
	}
}
