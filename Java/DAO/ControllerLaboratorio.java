import java.util.Scanner;
import java.util.Vector;
import java.io.*;

public class ControllerLaboratorio{
	DaoLaboratorio daoLaboratorio;
	
	public ControllerLaboratorio(){
		daoLaboratorio = new DaoLaboratorio();
	}
	public void menu(){
		Scanner scanner = new Scanner(System.in);
		int opcao = -1;
		
		while(opcao != 0){
			System.out.println("\n-------------------------------------------------");
			System.out.println("Gerenciamento de Laboratorios");
			System.out.println("[1] - Cadastrar");
			System.out.println("[2] - Consultar");
			System.out.println("[3] - Alterar");
			System.out.println("[4] - Excluir");
			System.out.println("[5] - Listar Todos");
			System.out.println("[0] - Voltar Ao Menu Anterior");
			System.out.println("\n----------------------------------------------------\n");
			
			opcao = Integer.parseInt(scanner.nextLine());
			if (opcao == 1){
				cadastrar();
			}else
			if (opcao == 2){
				consultar();
			}else
			if (opcao == 3){
				alterar();
			}else
			if (opcao == 4){
				excluir();
			}else
			if (opcao == 5){
				listarTodos();
			}else
			if (opcao == 0){
				System.out.println("Voltando");
			}else{
				System.out.println("ERRO - NENHUM NUMERO POSSIVEL SELECIONADO");
			}
			
		}
	}
	private void cadastrar (){
		Laboratorio lab = new Laboratorio();
		Scanner scanner = new Scanner(System.in);
		System.out.println("-------------------------------------------");
		System.out.println("[Cadastro de Laboratorio]");
		System.out.println("Numero");
		lab.setNumero(Integer.parseInt(scanner.nextLine()));
		
		System.out.println("Qtde de Lugares");
		lab.setLugares(Integer.parseInt(scanner.nextLine()));
		System.out.println("Local");
		lab.setLocal(scanner.nextLine());
		
		daoLaboratorio.inserir(lab);
	}
	private void consultar (){
		Scanner scanner = new Scanner(System.in);
		System.out.println("-----------------------------------------");
		System.out.println("[ Consulta de Laboratorio ]");
		System.out.println("Numero");
		int numero = Integer.parseInt(scanner.nextLine());
		Laboratorio lab = daoLaboratorio.consultar(numero);
		if (lab != null){
			System.out.println("Dados Do Laboratorio");
			System.out.println("Numero: "+ lab.getNumero());
			System.out.println("Qtde de Lugares: "+ lab.getLugares());
			System.out.println("Local: "+ lab.getLocal());
		}else{
			System.out.println("Nao encontrado");
		}
	}
	public  void excluir(){
		Scanner scanner = new Scanner(System.in);
		System.out.println("--------------------------------------------------------------------------------------");
		System.out.println("[ Exclusao de Laboratorio ]");
		System.out.println("Numero:");
		int numero = Integer.parseInt(scanner.nextLine());
		
		int qtde = daoLaboratorio.excluir(numero);
		if(qtde > 0){
			System.out.println("Excluindo!");
		}else{
			System.out.println("Nao Encontrado!");
		}
		
	}
	private void listarTodos (){
		Vector <Laboratorio> resultado = daoLaboratorio.buscarTodos();
		System.out.println("----");
		System.out.println("Cadastrados");
		for (Iterator <Laboratorio> iterator = resultado.iterator(); iterator.hasNext();){
			Laboratorio lab = Iterator.next();
			System.out.println("Numero:" + lab.getNumero() + "  ,Lugares:" + lab.getLugares() + " , Local: " + lab.getLocal());
		}
		
	}
	private void alterar (){
	}
}
