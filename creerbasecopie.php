<!-- creation base de données et tables il suffit de taper l'adresse localhost/ecme/creerbase.php-->

<?php
//connection:
$link = mysql_connect("localhost","kritsenmtn","Kritsenmtn") or die("Error " . mysql_error($link));

//consultation:

//CREATE DATABASE nom_base DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

//$sql = 'CREATE DATABASE ecme DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
//if (mysql_query($sql, $link)) {
//    echo "Base de données correctement\n";
//} else {
//    echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
//}


$connection = mysql_connect("localhost","kritsenmtn","Kritsenmtn"); 
  if ( ! $connection ) 
  die ("connection impossible"); 
  $mabasededonnee="kritsenmtn"; 
  mysql_select_db($mabasededonnee) or die ("pas de connection"); 
 
 mysql_query("
       create table liste(
id smallint (5) unsigned not null auto_increment,
design varchar(35) not null,
marq varchar(35) not null,
ident INT (6) unsigned not null,
type varchar(35) not null,
ref varchar(35) not null,
affec varchar(35) not null,
appli varchar(35) not null,
datepicker text not null,
datepicker2 text not null,
etat varchar (10) not null,
reso varchar (10) not null,
etend varchar (20) not null,
preci varchar (10) not null,
etal varchar (10) not null,
plage varchar (20) not null,
etal2 varchar (20) not null,
period varchar (10) not null,
tole varchar (20) not null,
coef varchar (10) not null,
erreur varchar (20) not null,
proced varchar (15) not null,
commentaire varchar (500) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");

 mysql_query("
       create table listedeclasser(
id smallint (5) unsigned not null auto_increment,
design varchar(35) not null,
marq varchar(35) not null,
ident INT (6) unsigned not null,
type varchar(35) not null,
ref varchar(35) not null,
affec varchar(35) not null,
appli varchar(35) not null,
datepicker text not null,
datepicker2 text not null,
etat varchar (10) not null,
reso varchar (10) not null,
etend varchar (20) not null,
preci varchar (10) not null,
etal varchar (10) not null,
plage varchar (20) not null,
etal2 varchar (20) not null,
period varchar (10) not null,
tole varchar (20) not null,
coef varchar (10) not null,
erreur varchar (20) not null,
proced varchar (15) not null,
commentaire varchar (500) not null,
raison varchar (50) not null,
commentairedeclasse varchar (500) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");

mysql_query("
       create table fichedevie(
id smallint (5) unsigned not null auto_increment,
ident INT (6) unsigned not null,
datepicker3 text not null,
naturedinter varchar(255) not null,
refdoc varchar(35) not null,
resul varchar (15)not null,
visa varchar (5) not null,
raison varchar (50) not null,
commentairedeclasse varchar (500) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");

mysql_query("
       create table etendue(
id smallint (5) unsigned not null auto_increment,
et_1 varchar(20) not null,
et_2 varchar(6) not null,
et_3 varchar(7) not null,
et_4 varchar(8) not null,
et_5 varchar(8) not null,
et_6 varchar(8) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");




mysql_query("
       create table corespoid(
id smallint (2) unsigned not null auto_increment,
poids varchar(7) not null,
kc varchar(30) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");


?>