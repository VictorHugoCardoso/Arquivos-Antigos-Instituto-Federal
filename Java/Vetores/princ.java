import java.io.InputStreamReader;
import java.io.BufferedReader;
import javax.swing.JOptionPane;

public class princ {
		public static void main(String[] args) throws Exception {
			BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
			int num1 = 0 ;
			do{
			System.out.println("Informe o numero de um mes");
			num1 = Integer.parseInt(reader.readLine());
			meses mes = new meses();
			String mese = mes.lerNomeMes(num1);
			if( mese.equals("")) {
					JOptionPane.showMessageDialog(null,"Valor Invalido");
			}else{
					JOptionPane.showMessageDialog(null,"O Mes E :"+ mese);
			}
			}while( num1 != 0 );
		}
	}
