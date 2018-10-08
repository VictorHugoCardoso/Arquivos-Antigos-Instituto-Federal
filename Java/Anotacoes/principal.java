import java.io.*;
public class principal{
	public static void main(String[] args) throws Exception {

		/** Um exemplo de um <b>simples</b> de <i>comentário</i> com o JavaDoc 
		*/

		String arqSaida = "cores.html";
		BufferedWriter arqGravacao = new BufferedWriter(new FileWriter(arqSaida));	

		arqGravacao.write("<html>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<meta charset=utf-8>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<title>Tabela com Java</title>");
		arqGravacao.newLine();
		
		arqGravacao.write("		</head>");
		arqGravacao.newLine();
		
		arqGravacao.write("	<body>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<h2 align=center>Tabela de cores HTML</h2>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<table width=400 align=center border=1>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<tr>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<th width=200 align=center>Cor</th>");
		arqGravacao.newLine();
		
		arqGravacao.write("		<th width=200 align=center>Codigo Hexadecimal</th>");
		arqGravacao.newLine();
		
		arqGravacao.write("		</tr>");
		arqGravacao.newLine();
		
		String vet[] = new String[16];
		vet[0]="0";
		vet[1]="1";
		vet[2]="2";
		vet[3]="3";
		vet[4]="4";
		vet[5]="5";
		vet[6]="6";
		vet[7]="7";
		vet[8]="8";
		vet[9]="9";
		vet[10]="A";
		vet[11]="B";
		vet[12]="C";
		vet[13]="D";
		vet[14]="E";
		vet[15]="F";
		
		for( int a = 0; a < 16 ; a++  ){
		
			for( int b = 0; b < 16 ; b++  ){

				for( int c = 0; c < 16 ; c++  ){
					arqGravacao.write("	<tr>");
					arqGravacao.newLine();
					arqGravacao.write("	<td bgcolor=#"+vet[a]+"0"+vet[b]+"0"+vet[c]+"0></td>");
					arqGravacao.newLine();
					arqGravacao.write("	<td align='center'>#"+vet[a]+"0"+vet[b]+"0"+vet[c]+"0</td>");
					arqGravacao.newLine();
					arqGravacao.write(" </tr>");
					arqGravacao.newLine();
				
				}
			}
		}
		
		arqGravacao.write("</table>");
		arqGravacao.newLine();
		
		arqGravacao.write("</body>");
		arqGravacao.newLine();
		
		arqGravacao.write("</html>");
		arqGravacao.newLine();

		arqGravacao.close();
	}
}
