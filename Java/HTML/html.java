import java.io.*;

public class html {
	
public static void main(String[]args) throws Exception {
    BufferedWriter arqArquivo = new BufferedWriter (new FileWriter ("cores.html"));
    String D;
    String E;
    String F;	
	

	arqArquivo.write("<html>");
	arqArquivo.newLine();
	
	arqArquivo.write("<head>");
	arqArquivo.newLine();

	arqArquivo.write("<title>Tabela de Cores</title>");
	arqArquivo.newLine();
	
	arqArquivo.write( "<meta charset ='utf=8'>");
	arqArquivo.newLine();
	

	arqArquivo.write( "</head>");
	arqArquivo.newLine();
	
	arqArquivo.write("<body>");
	arqArquivo.newLine();
	
	arqArquivo.write(" <table width='400' border='1' align='center'>");
	arqArquivo.newLine();
	
	arqArquivo.write("<tr>");
	arqArquivo.newLine();
	
         arqArquivo.write(" <th width='200' align='center'>Cores</th>");
         arqArquivo.newLine();
	 
	arqArquivo.write(" <th width='200' align='center'> Codigo hexadecimal</th>");
	arqArquivo.newLine();
	
	arqArquivo.write("</tr>");
	arqArquivo.newLine();
	
	for (int a1 = 0; a1<16; a1++) {
		for (int a2 = 0; a2 < 16; a2++) {
			for (int a3 = 0; a3 < 16; a3++) {
				
				D = Long.toString(a1,16);
				E = Long.toString(a2,16);
				F = Long.toString(a3,16);
				
				arqArquivo.write("<tr>");
				arqArquivo.newLine();
				arqArquivo.write("	<td width='200' bgcolor='"+D+"0"+E+"0"+F+"0'></td>");
				arqArquivo.newLine();
				arqArquivo.write("	<td width='200' align='center'>#"+D+"0"+E+"0"+F+"0'</td>");
				arqArquivo.newLine();
				arqArquivo.write("</tr>");
				arqArquivo.newLine();
			}
		}
	}
				
	arqArquivo.write(" </table>");	
	arqArquivo.newLine();
	arqArquivo.write("</body>");
	arqArquivo.newLine();
	arqArquivo.write("</html>");
        arqArquivo.newLine();
	
}	
	
	
}
	
