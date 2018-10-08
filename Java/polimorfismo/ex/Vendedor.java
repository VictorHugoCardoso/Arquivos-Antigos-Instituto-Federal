public class Vendedor {
	
	public float calcularComissao(float Venda){
		float comissao = (Venda * 0.05f) + 20f;
		return comissao;
	}
	
	public float calcularComissao(float Venda, float perc){
		float comissao = Venda * perc;
		return comissao;
	}
	
}
	
