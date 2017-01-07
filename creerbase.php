<!-- creation base de données et tables il suffit de taper l'adresse localhost/ecme/creerbase.php-->

<?php
//connection:
$link = mysql_connect("localhost","root","motdepasse") or die("Error " . mysql_error($link));

//consultation:

//CREATE DATABASE nom_base DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

$sql = 'CREATE DATABASE ecme DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
if (mysql_query($sql, $link)) {
    echo "Base de données correctement\n";
} else {
    echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
}


$connection = mysql_connect("localhost","root","motdepasse"); 
  if ( ! $connection ) 
  die ("connection impossible"); 
  $mabasededonnee="ecme"; 
  mysql_select_db($mabasededonnee) or die ("pas de connection"); 
 
 mysql_query("create table liste(
id smallint (5) unsigned not null auto_increment,
design varchar(40) not null,
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

 mysql_query("create table listedeclasser(
id smallint (5) unsigned not null auto_increment,
design varchar(40) not null,
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

mysql_query("create table fichedevie(
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

mysql_query("create table etendue(
id smallint (5) unsigned not null auto_increment,
NC tinytext not null,
et_1 varchar(20) not null,
et_2 varchar(6) not null,
et_3 varchar(7) not null,
et_4 varchar(8) not null,
et_5 varchar(8) not null,
et_6 varchar(8) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");



INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','0,5 g à 1,5 kg','0515','50 g','100 g','1 kg','1,2 kg','1,5 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','1 g à 400 g','1400','50 g','100 g','150 g','200 g','400 g');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','5 g à 2,2 kg','522','50 g','500 g','1,2 kg','2 kg','2,2 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','20 g à 3 kg','203','50 g','100 g','1 kg','2 kg','3 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','40 g à 6 kg','406','50 g','1 kg','2 kg','5 kg','6 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','25 g à 12 kg','2512','50 g','2 kg','5 kg','7 kg','9 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','40 g à 12 kg','4012','50 g','2 kg','5 kg','7 kg','9 kg');
INSERT INTO etendue(id, NC, et_1, et_2, et_3, et_4, et_5, et_6) VALUES ('','50 g à 15 kg','5015','50 g','2 kg','5 kg','7 kg','9 kg');

mysql_query("create table corespoid(
id smallint (2) unsigned not null auto_increment,
poids varchar(7) not null,
kc varchar(30) not null,
PRIMARY KEY(ID),INDEX (id),UNIQUE (id))
ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci");

INSERT INTO corespoid(id, poids, kc) VALUES ('','50 g','KC2');
INSERT INTO corespoid(id, poids, kc) VALUES ('','100 g','KC3');
INSERT INTO corespoid(id, poids, kc) VALUES ('','150 g','KC2-KC3');
INSERT INTO corespoid(id, poids, kc) VALUES ('','200 g','KC5');
INSERT INTO corespoid(id, poids, kc) VALUES ('','400 g','KC5-KC6');
INSERT INTO corespoid(id, poids, kc) VALUES ('','500 g','KC4');
INSERT INTO corespoid(id, poids, kc) VALUES ('','1 kg','KC1');
INSERT INTO corespoid(id, poids, kc) VALUES ('','1,2 kg','KC1-KC6');
INSERT INTO corespoid(id, poids, kc) VALUES ('','1,5 kg','KC1-KC4');
INSERT INTO corespoid(id, poids, kc) VALUES ('','2 kg','KC7');
INSERT INTO corespoid(id, poids, kc) VALUES ('','2,2 kg','KC5-KC7');
INSERT INTO corespoid(id, poids, kc) VALUES ('','3 kg','KC1-KC7');
INSERT INTO corespoid(id, poids, kc) VALUES ('','5 kg','KC8');
INSERT INTO corespoid(id, poids, kc) VALUES ('','6 kg','KC1-KC8');
INSERT INTO corespoid(id, poids, kc) VALUES ('','7 kg','KC7-KC8');
INSERT INTO corespoid(id, poids, kc) VALUES ('','9 kg','KC1-KC3-KC4-KC5-KC6-KC7-KC8');
?>
