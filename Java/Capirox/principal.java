import java.io.BufferedReader;
import java.io.InputStreamReader;
public class principal{
	public static void main(String args[]) throws Exception {
	
		BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
		String opcao,opcao1,opcao2;
		opcao1 = "";
		opcao = "";
		opcao2 = "";
		while (!opcao1.equals("0")){
		System.out.println("\n"+" 			Menu "+"\n");
		System.out.println("  1   -   Cadastrar um novo objeto");
		System.out.println("  2   -   Ver objetos cadastrados");
		System.out.println(" 						   		 0   - Sair   ");
		opcao1 = reader.readLine();
		if (opcao1.equals("1")){
		while (!opcao.equals("0")){
		System.out.println( "\n" + "Que veiculo deseja cadastrar ? ");
		System.out.println("");
		System.out.println("");
		System.out.println("	1 - Barco" + "\n");
		System.out.println("	2 - Moto" + "\n");
		System.out.println("	3 - Aviao" + "\n");
		System.out.println("	4 - Carro" + "\n");
		System.out.println("	5 - Tanque" + "\n");
		System.out.println("	6 - Onibus" + "\n");
		System.out.println("	7 - Trem" + "\n");
		System.out.println("");
		System.out.println("");
		System.out.println("									0 - Sair");
		System.out.println("");
		opcao = reader.readLine();	
		if (opcao.equals("1")){
			cadastrarBarco();
		}
		if (opcao.equals("2")){
			cadastrarMoto();
		}
		if (opcao.equals("3")){
			cadastrarAviao();
		} 
		if (opcao.equals("4")){
			cadastrarCarro();
		}
		if (opcao.equals("5")){
			cadastrarTanque();
		}
		if (opcao.equals("6")){
			cadastrarOnibus();
		}
		if (opcao.equals("7")){
			cadastrarTrem();
		}
		}
		}
		if (opcao1.equals("2")){
			String y ; 
			System.out.println( "\n" + "Qual objeto deseja ver? ");
			System.out.println("");
			System.out.println("");
			System.out.println("	1 - Barco" + "\n");
			System.out.println("	2 - Moto" + "\n");
			System.out.println("	3 - Aviao" + "\n");
			System.out.println("	4 - Carro" + "\n");
			System.out.println("	5 - Tanque" + "\n");
			System.out.println("	6 - Onibus" + "\n");
			System.out.println("	7 - Trem" + "\n");
			System.out.println("");
			System.out.println("");
			System.out.println("									0 - Sair");
			System.out.println("");
			opcao2 = reader.readLine();
			if (opcao2.equals("1")){
				barco transporte = new barco();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Vela : " + transporte.getVela());
				System.out.println("Assoalho : " + transporte.getAssoalho());
				System.out.println("Material : " + transporte.getMaterial());
			}
			if (opcao2.equals("2")){
				moto transporte = new moto();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Tamanho das rodas : " + transporte.getTamrodas());
				System.out.println("Guidao : " + transporte.getGuidao());
			}
			if (opcao2.equals("3")){
				aviao transporte = new aviao();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Poltronas : " + transporte.getPoltronas());
				System.out.println("Turbinas : " + transporte.getTurbina());
				System.out.println("Empresa : " + transporte.getEmpresa());
			
			}
			if (opcao2.equals("4")){
				carro transporte = new carro();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Pneu : " + transporte.getPneu());
				System.out.println("Cor : " + transporte.getCor());
				System.out.println("Modelo : " + transporte.getModelo());
			
			}
			if (opcao2.equals("5")){
				tanque transporte = new tanque();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Municao : " + transporte.getMunicao());
				System.out.println("Quantidade de pessoas :" + transporte.getQuantidadep());
				System.out.println("Disparos por minuto : " + transporte.getDpm());
			
			}
			if (opcao2.equals("6")){
				onibus transporte = new onibus();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Quantidade de assentos :" + transporte.getAssento());
				System.out.println("Catraca : "+ transporte.getCatraca());
				System.out.println("Quantidade de portas:" + transporte.getPortas());
			
			}
			if (opcao2.equals("7")){
				trem transporte = new trem();
				System.out.println("Chassi : " + transporte.getChassi());
				System.out.println("Motor : " + transporte.getMotor());
				System.out.println("Marca : " + transporte.getMarca());
				System.out.println("Quantidade de vagoes : "+ transporte.getVagoes());
				System.out.println("Lenha :"+ transporte.getLenha());
				System.out.println("Quantidade de cadeiras: "+ transporte.getCadeiras());
			
			}
		}
	}
}
		public static void cadastrarBarco() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			barco transporte = new barco();
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());	
			System.out.println("\n"+"Nome da vela");
			transporte.setVela(reader.readLine());	
			System.out.println("\n"+"Cor do Assoalho");
			transporte.setAssoalho(reader.readLine());	
			System.out.println("\n"+"Qual material?");
			transporte.setMaterial(reader.readLine());	
			
		}
		public static void cadastrarMoto() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			moto transporte = new moto(); 
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());	
			System.out.println("\n"+"Tamanho das Rodas");
			transporte.setTamrodas(reader.readLine());	
			System.out.println("\n"+"Marca do guidao");
			transporte.setGuidao(reader.readLine());	
		}
		public static void cadastrarAviao() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			aviao transporte = new aviao();
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());	
			System.out.println("\n"+"Quantidade de poltronas");
			transporte.setPoltronas(reader.readLine());	
			System.out.println("\n"+"Quantidade de turbinas");
			transporte.setTurbina(reader.readLine());	
			System.out.println("\n"+"Empresa Aerea");
			transporte.setEmpresa(reader.readLine());	
		}
		public static void cadastrarCarro() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			carro transporte = new carro();
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());	
			System.out.println("\n"+"Marca dos pneus");
			transporte.setPneu(reader.readLine());	
			System.out.println("\n"+"Cor");
			transporte.setCor(reader.readLine());	
			System.out.println("\n"+"Nome do Modelo");
			transporte.setModelo(reader.readLine());	
		}
		public static void cadastrarTanque() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			tanque transporte = new tanque();
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());		
			System.out.println("\n"+"Quantidade de municao");
			transporte.setMunicao(reader.readLine());	
			System.out.println("\n"+"Comporta quantas pessoas ?");
			transporte.setQuantidadep(reader.readLine());	
			System.out.println("\n"+"Quantos disparos por minuto");
			transporte.setDpm(reader.readLine());	
		}
		public static void cadastrarOnibus() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			onibus transporte = new onibus();
			String chassi,marca,motor;
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Quantidade de Assentos");
			transporte.setMotor(reader.readLine());		
			System.out.println("\n"+"Quantidade de portas");
			transporte.setPortas(reader.readLine());	
			System.out.println("\n"+"Catraca");
			transporte.setCatraca(reader.readLine());	
		}
		public static void cadastrarTrem() throws Exception{
			BufferedReader reader = new BufferedReader (new InputStreamReader(System.in));
			trem transporte = new trem();
			System.out.println("\n"+"Numero do Chassi");
			transporte.setChassi(reader.readLine());
			System.out.println("\n"+"Nome da marca");
			transporte.setMarca(reader.readLine());
			System.out.println("\n"+"Nome do motor");
			transporte.setMotor(reader.readLine());	
			System.out.println("\n"+"Quantidade de vagoes");
			transporte.setVagoes(reader.readLine());	
			System.out.println("\n"+"Lenha necessaria");
			transporte.setLenha(reader.readLine());	
			System.out.println("\n"+"Cadeiras por vagao");
			transporte.setCadeiras(reader.readLine());	
		}	
}

