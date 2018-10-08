import java.io.BufferedReader;
import java.io.InputStreamReader;
import javax.swing.JOptionPane;

public class vet {
	public static void main(String[] args) throws Exception {
		BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
		String[] valores = new String[12];
		valores[0] = "Janeiro";
		valores[1] = "Feveiro";
		valores[2] = "Marco";
		valores[3] = "Abril";
		valores[4] = "Maio";
		valores[5] = "Junho";
		valores[6] = "Julho";
		valores[7] = "Agosto";
		valores[8] = "Setembro";
		valores[9] = "Outubro";
		valores[10] = "Novembro";
		valores[11] = "Dezembro";
		
		String num1 = null;
		num1 = JOptionPane.showInputDialog("Informe O Numero De Um Mes");
		int x = Integer.parseInt(num1);
		JOptionPane.showMessageDialog(null,valores[x-1]);
		
	}
}
