public class meses {

		String[] meses = new String[12];
		
		public meses(){
			atribuir();
		}
		
		private void atribuir(){
			meses[0] = "Janeiro";
			meses[1] = "Feveiro";
			meses[2] = "Marco";
			meses[3] = "Abril";
			meses[4] = "Maio";
			meses[5] = "Junho";
			meses[6] = "Julho";
			meses[7] = "Agosto";
			meses[8] = "Setembro";
			meses[9] = "Outubro";
			meses[10] = "Novembro";
			meses[11] = "Dezembro";
		}
		
		public String lerNomeMes(int x){
			if((x < 1) || (x > 12)){
				return "";
			}else{
				return meses[x-1];
			}
		}
	}
