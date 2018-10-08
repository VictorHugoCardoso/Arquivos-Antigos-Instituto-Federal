import java.sql.*;

public class GerenciadorConexao {
	private static Connection conexao;
	
	public static Connection pegarConexao() throws ClassNotFoundException, SQLException {
			String url = "jdbc:mysql://127.0.0.1/dbreslab";
			String usuario = "root";
			String senha = "bancodedados";
			
			Class.forName("com.mysql.jdbc.Driver");
			conexao = DriverManager.getConnection(url,usuario,senha);
			return(conexao);
	}
}
