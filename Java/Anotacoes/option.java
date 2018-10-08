import javax.swing.JOptionPane;

public class option{
	public static void main( String[] args){
		String nome = null;
		int opcao = 0;
		nome = JOptionPane.showInputDialog("Quem é o pika ?");
		if ( nome.equals("joao")) {
			opcao = JOptionPane.showConfirmDialog(null,"Certezinha Fera ?");
			JOptionPane.showMessageDialog(null,"Vai ter que manjar mais das capoeiras");
		}else{
			JOptionPane.showMessageDialog(null,"Victor é o pika");
		}
		
	}
}