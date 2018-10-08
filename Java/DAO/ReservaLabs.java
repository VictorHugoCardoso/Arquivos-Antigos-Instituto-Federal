import java.util.Scanner;

public class ReservaLabs{
	
		public static void main(String [] args){
			ReservaLabs rl = new ReservaLabs();
			rl.menuPrincipal();
		}
		
		public void menuPrincipal(){
			Scanner scanner = new Scanner(System.in);
			int opcao = -1;
			
			while(opcao != 0 ){
				System.out.println("\n---------------------------------");
				System.out.println("[1] - Gerenciar Laboratorios");
				System.out.println("[2] - Gerenciar Reservas");
				System.out.println("[0] - Sair");
				
				opcao = Integer.parseInt(scanner.nextLine());
				if (opcao == 1){
					ControllerLaboratorio cLab = new ControllerLaboratorio();
					cLab.menu();
				}else if(opcao == 2){
					System.out.println("Gerenciando Reservas...");
				}else if(opcao == 0){
					System.out.println("Ate Logo...");
				}else{
					System.out.println("Opcao Invalida");
				}
			}
		}	
}
