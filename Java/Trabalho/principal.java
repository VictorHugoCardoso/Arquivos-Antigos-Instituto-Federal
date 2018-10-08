import javax.swing.JOptionPane;
import java.io.*;

/** @author   Victor Hugo Cardoso Mendes || Joao Henrique Galvan Boeno*/
/** 2º  Informática 2013 */


public class principal{
	public static void main(String[] args) throws Exception
	{
		
		/** Para receber o parametro do nome do arquivo csv */
		String pasta = JOptionPane.showInputDialog("Digite o Nome Da Pasta");
		
		String arqEntrada = pasta+"\\"+pasta+".csv";				/** receber o nome da pasta que é onde esta o arquivo csv e o atribuir a variavel arqEntrada |||| exemplo ||||  pasta : verao2012 || arquivo csv : verao2012  , é atribuido ao arqEntrada verao2012.csv */
		BufferedReader arqLeitura = new BufferedReader(new FileReader(arqEntrada));
		
		String arqEnt =  pasta+"\\"+pasta+".csv";
		BufferedReader arqLeit = new BufferedReader(new FileReader(arqEnt));
		
		String arqEntra =  pasta+"\\"+pasta+".csv";
		BufferedReader arqLeitur = new BufferedReader(new FileReader(arqEntra));
		
		String arqSaida = pasta+"\\"+"index.html";		/** Tudo que for atribuicado ao arqsaida ira mudar no index.html */
		BufferedWriter arqGravacao = new BufferedWriter(new FileWriter(arqSaida));	/** Metodo de criacao do arquivo index.html */
		
	
		/** declaração de variaveis */
		String linha = "";	 /**   linha para ser usado como contador de linhas do arquivo csv */
		String quant = "";		/** quant para fazer a conversao para a var quantidade , que conta a quantidade de fotos na pasta*/

		int x = 0;
		String[] quan = new String[1000];
		
		while ((linha = arqLeitur.readLine()) != null) { /** Enquanto a linha do arquivo csv nao for igual a null o a repeticao continua o q quer dizer que tem nova linha */
		
			quan[x] = linha.substring (0,linha.indexOf(";"));  
			quant = quan[x];
			x++;
		}
		
		int quantidade = Integer.parseInt(quant);         /** conversao de string para int */
		
		String[] fotoses = new String[quantidade + 1];   /** declaracao do vetor que guarda os nomes dos arquivos das fotos*/

		for (int i = 0; i < quantidade + 1 ; i ++){						 /**  for para guardar os nomes dos arquivos das fotos , usando o quantidade como delimitador final  , +1 para descartar a primeira linha*/
			linha = arqLeit.readLine(); 									 /** Ler a linha do arquivo csv */
			fotoses[i] = linha.substring (0,linha.indexOf(";"));   /** pegar do caractere 0 ate o primeiro " ; " e armazenar na posicao selecionada do vetor fotoses */
			linha = linha.replaceAll(fotoses[i]+";","");				 /** substituir tudo da posicao selecionada por " "  pois nao sera utilizada a primeira casa antes do " ; "*/
			fotoses[i] = linha.substring (0,linha.indexOf(";"));	 /** como a 1 casa antes do " ; " foi excluida a casa apos o " ; " e o nome do arquivo das fotos entao é armazenado na posicao do vetor fotoses */
		}	
		
		String[] nomeses = new String[quantidade + 1];    /** declaracao do vetor que guarda os nomes das fotos*/
		String[] descricaoses = new String[quantidade + 1]; /** declaracao do vetor que guarda a descricao das fotos*/
		String[] datases = new String[quantidade + 1]; /** declaracao do vetor que guarda as datas das fotos*/
		
		for (int i = 0; i < quantidade + 1; i ++){   /** for para percorrer todas as fotos existentes na pasta , buscando o nome real das fotos */
			linha = arqLeitura.readLine();             /** Ler a linha do arquivo csv */
			if (!linha.equals("Numero da foto;Nome do arquivo da foto;Data da foto;Titulo da foto;Descricao detalhada da foto")){    /** Linha feita para ignorar a primeira linha do arquivo csv pois ela nao sera importante para nós*/
				String[] n = linha.split(";");            /** metodo split para dividir a linha selecionada do arquivo csv em 1 vetor chamado n para que posteriormente possamos extrair a 3 posicao desse vetor que é onde esta armazenado o nome real da foto */
				nomeses[i] = n[3];      /** atribui ao vetor nomeses o real nome da foto que esta armazenado na 3 posicao do vetor n em que foi usado o metodo split*/
				datases[i] = n[2];
				descricaoses[i] = n[4];
			}
		}
		
		/** Implementacao do codigo html onde sera gravado no arqGravação que é o index.html */
		
		arqGravacao.write("<html>");  	   /** escreve dentro do arquivo index.html */
		arqGravacao.newLine();				/** pula linha no arquivo index.html*/
		
		arqGravacao.write("	<head>");
		arqGravacao.newLine();
		
		arqGravacao.write("	<meta charset=utf-8>");
		arqGravacao.newLine();
		
		arqGravacao.write("	<title> Trabalho Java</title>");
		arqGravacao.newLine();
		
		arqGravacao.write("	</head>");
		arqGravacao.newLine();
		
		arqGravacao.write("	<body>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<h1 align=center>Fotos</h1>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<table align=center cellspacing=80>");
		arqGravacao.newLine();
		
		arqGravacao.write("			<tr align=center>");
		arqGravacao.newLine();
		
		String[] nome = new String[quantidade + 1]; 
		
		for (int i = 0; i < quantidade + 1 ; i ++){		
		
		nome[i] = fotoses[i]+".html";	
		BufferedWriter arqGravac = new BufferedWriter(new FileWriter(pasta+"\\"+nome[i]));
		
		   arqGravac.write("	<html>");
		   arqGravac.newLine();
			
			arqGravac.write("	<head>");
			arqGravac.newLine();
			
			arqGravac.write("		<title>Trabalho</title>");
			arqGravac.newLine();
			
			arqGravac.write("		<meta charset=utf-8 />");
			arqGravac.newLine();
			
			arqGravac.write("		<style>");
			arqGravac.newLine();
			
			arqGravac.write("table{");
			arqGravac.newLine();
			
			arqGravac.write("	padding-top: 20px;");
			arqGravac.newLine();
			
			arqGravac.write("padding-bottom: 20px;}");
			arqGravac.newLine();
			
			arqGravac.write("	</style>");
			arqGravac.newLine();
			
			arqGravac.write("</head>");
			arqGravac.newLine();
			
			arqGravac.write("<body>");
			arqGravac.newLine();

			arqGravac.write("<a href='index.html'>Voltar</a>");
			arqGravac.newLine();
			
			arqGravac.write("<h1 align='center'>"+nomeses[i]+"</h1>");
			arqGravac.newLine();
			
			arqGravac.write("<h3 align='center'>"+datases[i]+"</h3>");
			arqGravac.newLine();
			
			arqGravac.write("<table align='center'>");
			arqGravac.newLine();
			
			arqGravac.write("<tr>");
			arqGravac.newLine();
			
			arqGravac.write("	<td><img src="+fotoses[i]+" width='960' height='539'></td>");
			arqGravac.newLine();
			
			arqGravac.write("	</tr>");
			arqGravac.newLine();
			
			arqGravac.write("	<tr>");
			arqGravac.newLine();
			
			arqGravac.write("	<td align='center'><h2><u>"+descricaoses[i]+"</u></h2></td>");
			arqGravac.newLine();
			
			arqGravac.write("	</tr>");
			arqGravac.newLine();
			
			arqGravac.write("</table>");
			arqGravac.newLine();
			
			arqGravac.write("	</body>");
			arqGravac.newLine();
			
			arqGravac.write("</html>");
			arqGravac.newLine();	
			
			arqGravac.close();
		}
		
		for (int i = 1; i < quantidade + 1 ; i ++){   	/** For para implentar todas as fotos no arquivo html */ 
		
		
			arqGravacao.write("			<td><a href="+fotoses[i]+".html><img src="+fotoses[i]+" width=300 height=200><br><u>"+nomeses[i]+"</a></u></td>"); /** Aqui sera realmente implementada cada foto no arquivo html , cada uma com seu respectivo nome*/
			arqGravacao.newLine();

			int nd = i % 3 ;			/** Logica usada por nós para que pulasse de linha a cada 3 fotos , ou seja criasse uma nova tabela de 3 colunas em baixo da tabela anterior , a cada linha sera uma nova tabela com 3 colunas*/ 
			if (nd == 0){  			/** Toda vez q o resto da divisao por 3 for igual a 0 , ou seja o numero é multiplo de 3 implentara esse codigo que nada mais é do que um fechamento da tabela de cima e criacao da nova tabela*/
							
				arqGravacao.write("			</tr>");
				arqGravacao.newLine();
			
				arqGravacao.write("			</table>");
				arqGravacao.newLine();
				
				arqGravacao.write("			<table align=center cellspacing=80>");
				arqGravacao.newLine();
				
				arqGravacao.write("			<tr align=center>");
				arqGravacao.newLine();
					
			}

		}
		
		/** Enquanto o arquivo nao precisar entrar no if ele se fecha sozinho nesta parte*/
		arqGravacao.write("			</tr>");
		arqGravacao.newLine();
		
		
		arqGravacao.write("			</table>");
		arqGravacao.newLine();
		
		arqGravacao.write("		</body>");
		arqGravacao.newLine();
		
		arqGravacao.write("		</html>");
		arqGravacao.newLine();
	
	
		arqGravacao.close();    /** Fechamento do arqGravacao para eventuais problemas*/
	}
}

