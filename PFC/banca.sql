-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pfc_forum
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assunto`
--

DROP TABLE IF EXISTS `assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assunto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `grupo` varchar(45) NOT NULL,
  `url_icon` varchar(90) NOT NULL DEFAULT '/imagens/padrao_assu.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assunto`
--

LOCK TABLES `assunto` WRITE;
/*!40000 ALTER TABLE `assunto` DISABLE KEYS */;
INSERT INTO `assunto` VALUES (1,'Pascal','Tudo sobre a linguagem de programaÃ§Ã£o pascal.','1Âº Ano InformÃ¡tica','../imagens/assuntos/eae737f26c64fe742498de74b2c93f29.png'),(2,'Java','Tudo sobre a linguagem de programaÃ§Ã£o java.','2Âº Ano de InformÃ¡tica','../imagens/assuntos/f860d092d6404cea43615397a9e32b07.png'),(3,'PHP.','Tudo sobre a linguagem de programaÃ§Ã£o PHP.','3Âº Ano de InformÃ¡tica','../imagens/assuntos/cf28172ca318db68d271dc711465a2b6.png'),(4,'Sistemas Operacionais','Tudo sobre os sistemas operativos.','1Âº Ano InformÃ¡tica','../imagens/assuntos/71173159c46120b6a29eb50442d0b33a.jpg'),(5,'Banco de Dados','Tudo sobre banco de dados e bases de dados.','2Âº Ano de InformÃ¡tica','../imagens/assuntos/d292368f844281b2fe52de99d7d9cd10.jpg'),(6,'Web Design','Tudo sobre html e afins.','3Âº Ano de InformÃ¡tica','../imagens/assuntos/310ba8c7b90795669bbe296a939c8e9c.gif');
/*!40000 ALTER TABLE `assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_avaliador` int(11) NOT NULL,
  PRIMARY KEY (`id_post`,`id_usuario`),
  KEY `fk_avaliacao_usuario` (`id_usuario`),
  KEY `fk_avaliacao_usuario_av` (`id_avaliador`),
  CONSTRAINT `fk_avaliacao_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`),
  CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `fk_avaliacao_usuario_av` FOREIGN KEY (`id_avaliador`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
INSERT INTO `avaliacao` VALUES (10,8,1),(1,1,7);
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'Como faz pra instalar o pascal?','VÃ¡ neste site: www.comoinstalarpascal.com.br. LÃ¡ tem um passo a passo de como instalar.'),(2,'Como postar cÃ³digo?','Digite as tags (code) e (/code) no inÃ­cio e no fim de seu cÃ³digo respectivamente.'),(3,'Como Ã© banido?','Se tratar desreispeitosamente algum membro do fÃ³rum pode acarretar banimento.'),(4,'Como subir de ranking','Sua conduta no fÃ³rum farÃ¡ vocÃª subir de ranking automaticamente');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_envio` int(11) NOT NULL,
  `envioAtivo` int(1) NOT NULL DEFAULT '1',
  `id_usuario_destino` int(11) NOT NULL,
  `destinoAtivo` int(1) NOT NULL DEFAULT '1',
  `data_envio` datetime NOT NULL,
  `lida` int(1) NOT NULL DEFAULT '0',
  `texto` varchar(500) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`id_usuario_envio`,`id_usuario_destino`),
  KEY `fk_mensagem_envio` (`id_usuario_envio`),
  KEY `fk_mensagem_destino` (`id_usuario_destino`),
  CONSTRAINT `fk_mensagem_envio` FOREIGN KEY (`id_usuario_envio`) REFERENCES `usuario` (`id`),
  CONSTRAINT `fk_mensagem_destino` FOREIGN KEY (`id_usuario_destino`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacao` (
  `id_usuario` int(7) NOT NULL,
  `id_topico` int(7) NOT NULL,
  `tituloTop` varchar(30) NOT NULL,
  KEY `fk_id_usuario` (`id_usuario`),
  KEY `fk_id_topico` (`id_topico`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `fk_id_topico` FOREIGN KEY (`id_topico`) REFERENCES `topico` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacao`
--

LOCK TABLES `notificacao` WRITE;
/*!40000 ALTER TABLE `notificacao` DISABLE KEYS */;
INSERT INTO `notificacao` VALUES (1,2,'Como instalar o pascal 2?');
/*!40000 ALTER TABLE `notificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_topico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` text NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`id_topico`),
  KEY `fk_post_topico` (`id_topico`),
  KEY `fk_post_usuario` (`id_usuario`),
  CONSTRAINT `fk_post_topico` FOREIGN KEY (`id_topico`) REFERENCES `topico` (`id`),
  CONSTRAINT `fk_post_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,1,1,'Oi gente, sou novo aqui, queria saber como faz pra instalar o pascal.\r\nObrigado','2014-11-16 20:27:47',1),(1,2,1,'Ainda nÃ£o entendi como instalar o pascal, poderiam passar um passo a passo ?','2014-11-16 20:28:31',1),(1,3,1,'NÃ£o sei qual o problema deste cÃ³digo:\r\n\r\n(code)\r\n	public static void main(String [] args){\r\n		public void consultar(){\r\n			return nomedoAluno;\r\n		}\r\n	}\r\n(/code)','2014-11-16 20:30:50',1),(2,1,2,'Tem um jeito muito fÃ¡cil, usa um programa chamado pascal installer, Ã© muito bom.','2014-11-16 20:34:38',1),(2,2,3,'Passa o skype que eu o ajudo a instalar, Ã© mais fÃ¡cil do que parece.','2014-11-16 20:44:11',1),(3,1,4,'Usa pascal nÃ£o galera, PhP Ã© muito melhor.','2014-11-16 20:35:09',1),(4,1,5,'Java > todas.','2014-11-16 20:35:30',1),(5,1,7,'Esse pascal installer nÃ£o funcionou para min, prefiro o pascalzin.','2014-11-16 20:36:46',1),(6,1,6,'Esse input do pascal ta validado?','2014-11-16 20:37:26',1),(7,1,1,'Galera ainda nÃ£o consegui instalar, ajuda ai, preciso fazer um trabalho atÃ© amanha, Ã© uma matriz.','2014-11-16 20:38:12',1),(8,1,2,'Pow cara usa o sudo apt-get install pascal, esse funciona.\nQuanto a matrizes, faÃ§a um for dentro de outro for.','2014-11-16 20:39:12',1),(9,1,7,'Matriz tridimensional Ã© a melhor.','2014-11-16 20:39:45',1),(10,1,8,'Ano passado, eu instalei o pascal atravÃ©s do site mesmo : pascal.com','2014-11-16 20:40:42',1),(11,1,1,'Beleza galera, funcionou, eu baixei pelo site pascal.com mesmo. Vlw, atÃ© a prÃ³xima.','2014-11-16 20:42:42',1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topico`
--

DROP TABLE IF EXISTS `topico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_assunto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `visualizacoes` int(11) NOT NULL DEFAULT '0',
  `dt_criacao` date NOT NULL,
  `anonimo` int(11) NOT NULL DEFAULT '0',
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`id_assunto`),
  KEY `fk_topico_assunto` (`id_assunto`),
  KEY `fk_topico_usuario` (`id_usuario`),
  CONSTRAINT `fk_topico_assunto` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id`),
  CONSTRAINT `fk_topico_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topico`
--

LOCK TABLES `topico` WRITE;
/*!40000 ALTER TABLE `topico` DISABLE KEYS */;
INSERT INTO `topico` VALUES (1,1,1,'Como instalar o pascal?',28,'2014-11-16',0,0),(2,1,1,'Como instalar o pascal 2?',5,'2014-11-16',1,1),(3,2,1,'O que estÃ¡ acontecendo com este cÃ³digo?',3,'2014-11-16',0,1);
/*!40000 ALTER TABLE `topico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `dt_nasc` date DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `ativo` int(11) NOT NULL DEFAULT '1',
  `url_foto` varchar(80) NOT NULL DEFAULT '../imagens/usuarios/padrao.jpg',
  `dt_cadastro` date NOT NULL,
  `localidade` varchar(70) NOT NULL,
  `sexo` varchar(1) NOT NULL DEFAULT 'N',
  `resumo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Victor Hugo Cardoso Mendes','victor_mendes00@hotmail.com','admin','admin','598c88273a9a98d947f0c344a388b356','1997-11-11',0,1,'../imagens/usuarios/793fa3b2aca61218fa9491eeb98df4fb.jpg','2014-11-07','Foz do IguaÃ§u - PR','M','Sou o administrador do site :)'),(2,'Wagner Braga dos Santos','wag.07@hotmail.com','profpascal','profpascal','a389d9f875adbad135b677384197992e','1989-11-11',1,1,'../imagens/usuarios/b90e1b7ece9c92d56bc518bb84e34f74.jpg','2014-11-07','Foz do IguaÃ§u - PR','M','Sou monitor de pascal, ganho 350 para isso :)'),(3,'Kassiano Shiguematsu','kassiano.e@hotmail.com','The Nurf','The Nurf','25f35702759e5fb8258bfc230d1a10e5','1998-11-11',1,1,'../imagens/usuarios/448ee27781bab81eb5e4686d321c4a10.jpg','2014-11-07','TÃ³kio - AC','M','Sou japonÃªs'),(4,'Humberto Beneduzzi','humberto.beneduzzi@ifpr.edu.br','profPhP','profPhP','50f0df84a70751bcd62030f26cda1053','1111-11-11',1,1,'../imagens/usuarios/1e9c37ffdef6212cf83ec0b507180df6.png','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(5,'Marcela Turim','marcela.turim@ifpr.edu.br','profJava','profJava','3db5aa4f8d1ad510d8189aa3c8137d92','1111-11-11',1,1,'../imagens/usuarios/61ba74b427598f45b95be31b4c97e542.png','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(6,'Felippe Scheidt','felippe.scheidt@ifpr.edu.br','profValidacao','profValidacao','28d22140fbc6da5bfd394005ccb29ef3','1111-11-11',1,1,'../imagens/usuarios/da4db824f5382265c6563cc371e8149f.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(7,'Ana Paula Wauke','ana.wauke@ifpr.edu.br','profaPascal','profaPascal','ade5fad79f309c768bffd44149dd157f','1111-11-11',1,1,'../imagens/usuarios/95339a45f201ce3058ad192ce2339b12.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(8,'Joaozinho Da Silva','joao.silva@gmail.com','alunoJava','alunoJava','3b7010434c287679277f1a3c0c5c72c4','1111-11-11',1,1,'../imagens/usuarios/c7b54d4feb12dbbc421cdb7c390a97af.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(9,'Nome extremamente grande para bugar o tcc','tantofazoemail.temquesergrandao@dominiogigantossaurico.edu.br.com','usuarioextremamentegrandeparatentarbugartudo','usuarioextremamentegrandeparatentarbugartudo','bd28696aa893aced9563e849ca969270','1111-11-11',1,1,'../imagens/usuarios/padrao.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(12,'Leonardo Costa','leo.costa@gmail.com','LeoCosta','LeoCosta','0ffd651c0eb8fa58ab15bf3895fdba6a','1111-11-11',1,1,'../imagens/usuarios/padrao.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(13,'Xing Teng Song','xing.song@tokyo.drift','Senpai','Senpai','b5630332bba08992404bd484fa9592be','1111-11-11',1,1,'../imagens/usuarios/padrao.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(14,'Chuck o boneco','copiado.Lenhador@hotmail.com','LenhadorFake','LenhadorFake','5e4ca2ee9811397ab6630e9165b5b17a','1111-11-11',1,1,'../imagens/usuarios/1fa1f1c992cb8ecb14210a7777381b9f.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(15,'Timmyyy Turner','timmmee@hotmail.com','LenhadorREAL','LenhadorREAL','1ccff91d829ce065aa190c00d6e7024e','1111-11-11',1,1,'../imagens/usuarios/7eb896148b4b286211421065565977d9.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(17,'xing ling mohamed','xing.tong@japan.jp','otakuMonster','otakuMonster','0a6417cfb4010bc7c1a55c441cedb66e','1111-11-11',1,1,'../imagens/usuarios/b45a7590a8321058530bd854f2855d41.jpg','2014-11-07','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio'),(18,'User para teste','teste@teste.user','teste','teste','00b01eb979a97f0c9edcb52612a5cf8a','1111-11-11',0,1,'../imagens/usuarios/padrao.jpg','2014-11-16','Local Desconhecido','N','Nada conhecido sobre esse usuÃ¡rio');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-16 20:47:01
