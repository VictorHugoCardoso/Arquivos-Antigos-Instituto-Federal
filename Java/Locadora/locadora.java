import javax.swing.JFrame;  
import javax.swing.JMenu;  
import javax.swing.JMenuBar;  
import javax.swing.JMenuItem;  
import javax.swing.JOptionPane;  
import java.awt.event.*;  
  
class locadora extends JFrame  
  {  
   private JMenuBar barraMenu = null;  
   private JMenu mnuPrincipal = null;  
   private JMenu mnuRelatorio = null;  
   private JMenu mnuGrupo = null;  
   private JMenuItem mnuSair = null;  //Sub Menu Principal  
   private JMenuItem mnuInclusao = null; //Sub Menu Principal  
   private JMenuItem mnuLocacao = null; //Sub Menu Principal  
   private JMenuItem mnuDevolucao = null; //Sub Menu Principal  
   private JMenuItem mnuSobre = null; //Sub Menu Nome do Grupo  
   private JMenuItem mnuSubRelatorio = null;//Sub Menu Relatorio  
  
  
public locadora()  
    {  
        super();  
        initialize();  
    }  
  
   private void initialize()  
     {  
      this.setTitle("LOCADORA 2PD"); //Titulo Janela Principal  
      this.setJMenuBar(getBarraMenu());  
      this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);  
      this.setSize(800,600); //Tamanho da Janela  
      this.setVisible(true); //Janela Visivel  
      this.setLocationRelativeTo(null);//Centraliza a Janela  
 
  
  
      //Eventos do Menu  
  
      //Sair  
      mnuSair.addActionListener(new ActionListener()  
      {  
       public void actionPerformed(ActionEvent e)  
       {  
        JOptionPane.showMessageDialog(null,"Fechando Aplicativo");  
           System.exit(1);  
       }  
       
    });  
    
		mnuLocacao.addActionListener(new ActionListener() {
		 public void actionPerformed(ActionEvent e)  
       {  
        JOptionPane.showMessageDialog(null,"sdklfuhasdiufhasuihf");  
             
       }  
       
       });
  
  
    //Sobre  
    mnuSobre.addActionListener(new ActionListener()  
    {  
       public void actionPerformed(ActionEvent e)  
       {  
        JOptionPane.showMessageDialog(null,"Lauro Nicolas \nKassiano Shiguematsu \nWagner Braga \nGustavo Diaz","",JOptionPane.INFORMATION_MESSAGE);  
       }  
    });  
  
    mnuSubRelatorio.addActionListener(new ActionListener()  
    {  
       public void actionPerformed(ActionEvent e)  
       {  
  
   JOptionPane.showMessageDialog(null,"!!!!!!!!!!!!!!!!!!!!!!","",JOptionPane.INFORMATION_MESSAGE);    
       }  
    });  
  
  
  
  
     }// Fim initialize  
  
   private JMenuBar getBarraMenu()  
     {  
      if (barraMenu == null)  
        {  
         barraMenu = new JMenuBar();  
         barraMenu.add(getMnuPrincipal());  
         barraMenu.add(getMnuRelatorio());  
         barraMenu.add(getMnuGrupo());  
        }  
  
      return barraMenu;  
     }  
  
   private JMenu getMnuPrincipal()  
     {  
      if (mnuPrincipal == null)  
        {  
         mnuPrincipal = new JMenu("PRINCIPAL");  
         mnuPrincipal.add(getMnuInclusao());  
         mnuPrincipal.add(getMnuLocacao());  
         mnuPrincipal.add(getMnuDevolucao());  
         mnuPrincipal.add(getMnuSair());  
        }  
  
      return mnuPrincipal;  
     }  
  
   private JMenu getMnuRelatorio()  
     {  
      if(mnuRelatorio == null)  
        {  
             mnuRelatorio = new JMenu("RELATORIOS");  
             mnuRelatorio.add(getMnuRElatorio());  
  
        }  
  
      return mnuRelatorio;  
     }  
  
  
   private JMenu getMnuGrupo()  
     {  
      if(mnuGrupo == null)  
        {  
         mnuGrupo = new JMenu("GRUPO");  
         mnuGrupo.add(getMnuSobre());  
        }  
  
      return mnuGrupo;  
     }  
  
  //Inicio dos Menu Itens  
  
   private JMenuItem getMnuSair()  
     {  
      if (mnuSair == null)  
        { mnuSair = new JMenuItem("SAIR"); }  
  
      return mnuSair;  
     }  
  
   private JMenuItem getMnuInclusao()  
     {  
      if(mnuInclusao == null)  
        { mnuInclusao = new JMenuItem("Comprar Filme"); }  
  
      return mnuInclusao;  
     }  
  
   private JMenuItem getMnuLocacao()  
     {  
      if(mnuLocacao == null)  
        { mnuLocacao = new JMenuItem("Aluga Filme"); }  
  
      return mnuLocacao;  
     }  
  
   private JMenuItem getMnuDevolucao()  
     {  
      if(mnuDevolucao == null)  
        { mnuDevolucao = new JMenuItem("Devolver Filme"); }  
  
      return mnuDevolucao;  
     }  
  
  
   private JMenuItem getMnuSobre()  
     {  
      if(mnuSobre == null)  
        { mnuSobre = new JMenuItem("INTEGRANTES DO GRUPO"); }  
  
      return mnuSobre;  
     }  
  
  
      private JMenuItem getMnuRElatorio()  
     {  
      if(mnuSubRelatorio == null)  
        { mnuSubRelatorio = new JMenuItem("GERAR RELATORIO"); }  
  
      return mnuSubRelatorio;  
     }  
  
  public static void main(String[] args)  
     {  
  
         new locadora();  
  
     }  
  
  
  
// Fim main  
  
  }//Fim programa  
