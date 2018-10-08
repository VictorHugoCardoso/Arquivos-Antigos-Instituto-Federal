import java.sql.*;
import java.util.Vector;

public class DaoLaboratorio{

	private Connection conn;
	private Statement st;
	
	private void conectar(){
		try{
			conn = GerenciadorConexao.pegarConexao();
			st = conn.createStatement();
		}catch(ClassNotFoundException e){
			System.out.println(e.getMessage());
		}catch(SQLException e){
			System.out.println(e.getMessage());
		}
	}
	
	private void desconectar(){
		try{
			st.close();
			conn.close();
		}catch(SQLException e){
			System.out.println("OCORREU UM ERRO AO FECHAR A CONEXAO");
		}
		
		
	}
	public void inserir(Laboratorio lab){
		try{
		conectar();
		String comando = "INSERT INTO tblaboratorios VALUES("+ lab.getNumero() + ","+ lab.getLugares() + ",'" + lab.getLocal() +"')";
		st.executeUpdate(comando);
		System.out.println("Inserido!");
		}catch (SQLException e){
		System.out.println("Erro ao inserir:"+e.getMessage());
		}finally{
			desconectar();
		}
	}
	public Laboratorio consultar(int numero){
		conectar();
		ResultSet rs;
		String comando = "SELECT * FROM tblaboratorios WHERE numero = " + numero + ";";
		Laboratorio lab = null;
		try{
			rs = st.executeQuery(comando);
			if(rs.next()){
				lab = new Laboratorio();
				lab.setNumero(rs.getInt("numero"));
				lab.setLugares(rs.getInt("lugares"));
				lab.setLocal(rs.getString("local"));
			}
		}catch(SQLException e){
			System.out.println("Erro ao consultar: " + e.getMessage());
			desconectar();
		}
		return lab;
	}
	public int excluir(int numero){
			conectar();
			String comando = "DELETE FROM tblaboratorios WHERE numero =" + numero + ";";
			int qtde = 0;
			try{
				st.executeUpdate(comando);
				qtde = st.getUpdateCount();
			}catch (SQLException e){
				System.out.println("Erro ao excluir:" + e.getMessage());	
			}finally{
				desconectar();
			}
			return qtde;
		}
	public Vector <Laboratorio> buscarTodos(){
		conectar();
		Vector<Laboratorio> resultados = new Vector<Laboratorio>();
		ResultSet rs;
		try{
			rs = st.executeQuery("SELECT * FROM tblaboratorios order by numero");
			while(rs.next()){
				Laboratorio lab = new Laboratorio();
				lab.setNumero(rs.getInt("numero"));
				lab.setLugares(rs.getInt("lugares"));
				lab.setLocal(rs.getString("local"));
				resultados.add(lab);
			}
		}catch(SQLException e){
			System.out.println("Erro ao consultar:"+ e.getMessage());
		}finally{
			desconectar();
		}
		return resultados;
	}
}
