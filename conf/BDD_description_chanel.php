﻿<?php
/* ce fichier décrit chaque colonne de la BDD
jusqu'au firmware 14g la correspondance entre le telnet de la chaudiere et la BDD est identique ,
c'est a dire que par exemple le parametre N°97 du telnet correspond a la colonne c97 de la BDD
a partir du firmware 14i , Hargassner a modifier l'ordre et le nombre de parametre
pour conserver la compatibilité du site avec toutes les versions ,c'est la BDD qui sert de reference.
lors de la reception d'une trame telnet , le fichier stockBDD.php change l'ordre des parametres pour 
les stocker dans la bonne colonne BDD

chaque fichier channel-nanoPK a partir du 14i décrit la correspondance entre le chanel telnet et la colonne BDD
les chanels des 14i, 14j et 14k sont identiques
exemple : 
CHANNEL id='8' name='Leistung' unit='%'/			c134
le parametre N°8 recu du telnet est stocké dans la colonne c134

================================================================================================
les differentes valeurs d'etat (chanel 0)
0	init
1   arret
2   init grille
3   demarrage chaudiere
4   controle allumage residuel
5   allumeur 
6   demarrage combustion/reduction phase allumage
7   combustion
8   veille
9   decendrage dans 7 mn
10  decendrage
11  refroidissement : utilisation chaleur residuelle
12  nettoyage
15	mode manuel
17	assistant de combustion
================================================================================================

colonneBDD		nom_chanel			unité			description */
$BDD = [
'c0'=>['name'=>'ZK',				'unit'=>'',		'desc'=>'etat chaudiere'],
'c1'=>['name'=>'O2',				'unit'=>'%',	'desc'=>'O2 est'],
'c2'=>['name'=>'O2soll',			'unit'=>'%',	'desc'=>'O2 doit'],
'c3'=>['name'=>'TK',				'unit'=>'°C',	'desc'=>'temperature chaudiere est '],
'c4'=>['name'=>'TKsoll',			'unit'=>'°C',	'desc'=>'temperature chaudiere doit'],
'c5'=>['name'=>'TRG',				'unit'=>'°C',	'desc'=>'temperature fumees'],
'c6'=>['name'=>'Taus',				'unit'=>'°C',	'desc'=>'temperature exterieur'],
'c7'=>['name'=>'TA Gem.',			'unit'=>'°C',	'desc'=>'temperature exterieur moyenne'],
'c8'=>['name'=>'TPo',				'unit'=>'°C',	'desc'=>'sonde BT haut'],
'c9'=>['name'=>'TPm',				'unit'=>'°C',	'desc'=>'sonde BT milieu'],
'c10'=>['name'=>'TPu',				'unit'=>'°C',	'desc'=>'sonde BT bas'],
'c11'=>['name'=>'TFW',				'unit'=>'°C',	'desc'=>'?'],
'c12'=>['name'=>'TRL',				'unit'=>'°C',	'desc'=>'température retour après mélangeur'],
'c13'=>['name'=>'TRLsoll',     	 	'unit'=>'°C',	'desc'=>'???température retour après mélangeur doit '],
'c14'=>['name'=>'RLP',				'unit'=>'%',	'desc'=>'?'],
'c15'=>['name'=>'Tplat',			'unit'=>'°C',	'desc'=>'Temp platine???'],
'c16'=>['name'=>'TVL_A',			'unit'=>'°C',	'desc'=>'?'],
'c17'=>['name'=>'TVLs_A',			'unit'=>'°C',	'desc'=>'?'],
'c18'=>['name'=>'TRA',				'unit'=>'°C',	'desc'=>'?'],
'c19'=>['name'=>'TBA',				'unit'=>'°C',	'desc'=>'?'],
'c20'=>['name'=>'TBs_A',			'unit'=>'°C',	'desc'=>'?'],
'c21'=>['name'=>'TVL_1',			'unit'=>'°C',	'desc'=>'temperature depart chauffage est '],
'c22'=>['name'=>'TVL_2',			'unit'=>'°C',	'desc'=>'?'],
'c23'=>['name'=>'TVLs_1',			'unit'=>'°C',	'desc'=>'temperature depart chauffage doit '],
'c24'=>['name'=>'TVLs_2',			'unit'=>'°C',	'desc'=>'?'],
'c25'=>['name'=>'TR1',				'unit'=>'°C',	'desc'=>'??? 18'],
'c26'=>['name'=>'TR2',				'unit'=>'°C',	'desc'=>'??? 20'],
'c27'=>['name'=>'TB1',				'unit'=>'°C',	'desc'=>'temperature Ballon ECS est'],
'c28'=>['name'=>'TBs_1',			'unit'=>'°C',	'desc'=>'temperature Ballon ECS doit'],
'c29'=>['name'=>'TVL_3',			'unit'=>'°C',	'desc'=>'?'],
'c30'=>['name'=>'TVL_4',			'unit'=>'°C',	'desc'=>'?'],
'c31'=>['name'=>'TVLs_3',			'unit'=>'°C',	'desc'=>'?'],
'c32'=>['name'=>'TVLs_4',			'unit'=>'°C',	'desc'=>'?'],
'c33'=>['name'=>'TR3',				'unit'=>'°C',	'desc'=>'?'],
'c34'=>['name'=>'TR4',				'unit'=>'°C',	'desc'=>'?'],
'c35'=>['name'=>'TB2',				'unit'=>'°C',	'desc'=>'?'],
'c36'=>['name'=>'TBs_2',			'unit'=>'°C',	'desc'=>'?'],
'c37'=>['name'=>'TVL_5',			'unit'=>'°C',	'desc'=>'?'],
'c38'=>['name'=>'TVL_6',			'unit'=>'°C',	'desc'=>'?'],
'c39'=>['name'=>'TVLs_5',			'unit'=>'°C',	'desc'=>'?'],
'c40'=>['name'=>'TVLs_6',			'unit'=>'°C',	'desc'=>'?'],
'c41'=>['name'=>'TR5',				'unit'=>'°C',	'desc'=>'?'],
'c42'=>['name'=>'TR6',				'unit'=>'°C',	'desc'=>'?'],
'c43'=>['name'=>'TB3',				'unit'=>'°C',	'desc'=>'?'],
'c44'=>['name'=>'TBs_3',			'unit'=>'°C',	'desc'=>'?'],
'c45'=>['name'=>'TRs_A',			'unit'=>'°C',	'desc'=>'??? 20'],
'c46'=>['name'=>'TRs_1',			'unit'=>'°C',	'desc'=>'??? 22 '],
'c47'=>['name'=>'TRs_2',			'unit'=>'°C',	'desc'=>'?'],
'c48'=>['name'=>'TRs_3',			'unit'=>'°C',	'desc'=>'?'],
'c49'=>['name'=>'TRs_4',			'unit'=>'°C',	'desc'=>'?'],
'c50'=>['name'=>'TRs_5',			'unit'=>'°C',	'desc'=>'?'],
'c51'=>['name'=>'TRs_6',			'unit'=>'°C',	'desc'=>'?'],
'c52'=>['name'=>'SZs',				'unit'=>'%',	'desc'=>'vitesse extracteur doit'],
'c53'=>['name'=>'SZ',				'unit'=>'%',	'desc'=>'vitesse extracteur'],
'c54'=>['name'=>'KeBrstScale',	    'unit'=>'%',	'desc'=>'variable F'],
'c55'=>['name'=>'ESRegler',   		'unit'=>'%',	'desc'=>'regulateur bois ???'],
'c56'=>['name'=>'ESsoll',			'unit'=>'%',	'desc'=>'bois = %air(134) x %F(54) x %K(160)'],
'c57'=>['name'=>'I Es',				'unit'=>'mA',	'desc'=>'conso vis bois'],
'c58'=>['name'=>'I Ra',				'unit'=>'mA',	'desc'=>'pilotage vanne 3 voies 0 ou 3'],
'c59'=>['name'=>'I Aa',				'unit'=>'mA',	'desc'=>'pilotage vanne 3 voies 0 ou 3'],
'c60'=>['name'=>'I Sr',				'unit'=>'mA',	'desc'=>'conso nettoyeur/cendrier'],
'c61'=>['name'=>'I Rein',			'unit'=>'mA',	'desc'=>'conso nettoyeur/cendrier'],
'c62'=>['name'=>'U_Lambda',			'unit'=>'mV',	'desc'=>'conso lambda'],
'c63'=>['name'=>'MWZ Vorl.',		'unit'=>'°C',	'desc'=>'?'],
'c64'=>['name'=>'MWZ Rueckl.',		'unit'=>'°C',	'desc'=>'?'],
'c65'=>['name'=>'MWZ Durchf.',		'unit'=>'',		'desc'=>'?'],
'c66'=>['name'=>'MWZ Leist.', 		'unit'=>'KW',	'desc'=>'	'],
'c67'=>['name'=>'VFS Flow',			'unit'=>'l/min','desc'=>'	'],
'c68'=>['name'=>'VFS Temp',			'unit'=>'°C',	'desc'=>'?'],
'c69'=>['name'=>'IO32 VL',			'unit'=>'°C',	'desc'=>'?'],
'c70'=>['name'=>'SR motor',			'unit'=>'',		'desc'=>'	moteur actionnement grille/ressort'],
'c71'=>['name'=>'SRpos ist',  		'unit'=>'',		'desc'=>'	selection grille ou ressort'],
'c72'=>['name'=>'SR mode',			'unit'=>'',		'desc'=>'	selection du sens de rotation du moteur'],
'c73'=>['name'=>'KaskSollTmp_1',	'unit'=>'°C',	'desc'=>'?'],
'c74'=>['name'=>'KaskSollTmp_2',	'unit'=>'°C',	'desc'=>'?'],
'c75'=>['name'=>'KaskSollTmp_3',	'unit'=>'°C',	'desc'=>'?'],
'c76'=>['name'=>'KaskSollTmp_4',	'unit'=>'°C',	'desc'=>'?'],
'c77'=>['name'=>'KaskIstTmp_1',		'unit'=>'°C',	'desc'=>'?'],
'c78'=>['name'=>'KaskIstTmp_2',		'unit'=>'°C',	'desc'=>'?'],
'c79'=>['name'=>'KaskIstTmp_3',		'unit'=>'°C',	'desc'=>'?'],
'c80'=>['name'=>'KaskIstTmp_4',		'unit'=>'°C',	'desc'=>'?'],
'c81'=>['name'=>'UsePos',			'unit'=>'',		'desc'=>'?'],
'c82'=>['name'=>'UseMotSoll',		'unit'=>'mm',	'desc'=>'?'],
'c83'=>['name'=>'UseMotIst',		'unit'=>'mm',	'desc'=>'?'],
'c84'=>['name'=>'HKZustand_A',		'unit'=>'',		'desc'=>'?'],
'c85'=>['name'=>'HKZustand_1',		'unit'=>'',		'desc'=>'mode de chauffage => 0 été /1 confort /3 reduit/4 arret /9 en cours arret'],
'c86'=>['name'=>'HKZustand_2',		'unit'=>'',		'desc'=>'?'],
'c87'=>['name'=>'HKZustand_3',		'unit'=>'',		'desc'=>'?'],
'c88'=>['name'=>'HKZustand_4',		'unit'=>'',		'desc'=>'?'],
'c89'=>['name'=>'HKZustand_5',		'unit'=>'',		'desc'=>'?'],
'c90'=>['name'=>'HKZustand_6',		'unit'=>'',		'desc'=>'?'],
'c91'=>['name'=>'BoiZustand_A',		'unit'=>'',		'desc'=>'?'],
'c92'=>['name'=>'BoiZustand_1',		'unit'=>'',		'desc'=>'Ballon ECS 0:off , 1:charge, 2:recyclage 	'],
'c93'=>['name'=>'BoiZustand_2',		'unit'=>'',		'desc'=>'?'],
'c94'=>['name'=>'BoiZustand_3',		'unit'=>'',		'desc'=>'?'],
'c95'=>['name'=>'PuffZustand',		'unit'=>'',		'desc'=>'etat BT 3:charge 2:decharge	'],
'c96'=>['name'=>'Puffer_soll',		'unit'=>'',		'desc'=>'Temp BT doit	'],
'c97'=>['name'=>'Mode Fw',			'unit'=>'',		'desc'=>'erreur en cours :'],
											 // 6 = Le cendrier est trop plein
											 // 7 = la grille ne s'ouvre pas
											 // 9 = Surintensité nettoyage échangeur
											// 15 = Sonde Ballon 1 coupée
											// 27 = Température de fumées trop basse
											// 29 = Defaut de combustion, démarrage impossible
											// 32 = Temps de Remplissage dépassé,	
											// 70 = niveau silo bas
											// 93 = cendrier ouvert
											// 229= Nettoyer/Contrôler le détecteur de niveau de granulés
											// 371= Vérifier l'encrassement du foyer, nettoyer si nécessaire
											// 7101= Temps Maxi de charge du Ballon dépassé. Contrôler la position de la sonde, et le débit de la pompe
											// 65402 = Impossible d'ouvrir la connexion au serveur Web
'c98'=>['name'=>'Einschubschn.BSZ',	'unit'=>'',		'desc'=>'heures vis entree chaudiere '],
'c99'=>['name'=>'Verbrauchszähler',	'unit'=>'',		'desc'=>'kg	consommation pellet'],
'c100'=>['name'=>'FRA Zustand',		'unit'=>'',		'desc'=>'	'],
'c101'=>['name'=>'FR1 Zustand',		'unit'=>'',		'desc'=>'mode de commande => 1:  programmé, 2 reduit forcé, 3 confort forcé, 4 arret, 5 soirée , 6 absence brève'],
'c102'=>['name'=>'FR2 Zustand',		'unit'=>'',		'desc'=>'	'],
'c103'=>['name'=>'FR3 Zustand',		'unit'=>'',		'desc'=>'	'],
'c104'=>['name'=>'FR4 Zustand',		'unit'=>'',		'desc'=>'	'],
'c105'=>['name'=>'FR5 Zustand',		'unit'=>'',		'desc'=>'	'],
'c106'=>['name'=>'FR6 Zustand',		'unit'=>'',		'desc'=>'	'],
'c107'=>['name'=>'Ext.HK Soll',		'unit'=>'',		'desc'=>'	'],
'c108'=>['name'=>'Ext.HK Soll_2',	'unit'=>'',		'desc'=>'	'],
'c109'=>['name'=>'Ext.HK Soll_3',	'unit'=>'',		'desc'=>'	'],
'c110'=>['name'=>'Höchste Anf',		'unit'=>'',		'desc'=>'temp depart chaudiere doit'],
'c111'=>['name'=>'LZ LB seit Ent.',	'unit'=>'°C',	'desc'=>'temps combustion est (pour decendrage ?)'],
'c112'=>['name'=>'LZ ES seit Füll.','unit'=>'',		'desc'=>'Min	temps vis pour aspiration est ?(proportionnel a la conso granulé)'],
'c113'=>['name'=>'Anzahl Entasch.',	'unit'=>'',		'desc'=>'nombre decendrage'],
'c114'=>['name'=>'Anzahl SR Beweg.','unit'=>'',		'desc'=>'mouvement grille'],
'c115'=>['name'=>'Lagerstand',		'unit'=>'',		'desc'=>'kg	pellet restant'],
'c116'=>['name'=>'KaskLZLeisMin_1',	'unit'=>'°C',	'desc'=>'?'],
'c117'=>['name'=>'KaskLZLeisMin_2',	'unit'=>'°C',	'desc'=>'?'],
'c118'=>['name'=>'KaskLZLeisMin_3',	'unit'=>'°C',	'desc'=>'?'],
'c119'=>['name'=>'KaskLZLeisMin_4',	'unit'=>'°C',	'desc'=>'?'],
'c120'=>['name'=>'KaskLZLeisMax_1',	'unit'=>'°C',	'desc'=>'?'],
'c121'=>['name'=>'KaskLZLeisMax_2',	'unit'=>'°C',	'desc'=>'?'],
'c122'=>['name'=>'KaskLZLeisMax_3',	'unit'=>'°C',	'desc'=>'?'],
'c123'=>['name'=>'KaskLZLeisMax_4',	'unit'=>'°C',	'desc'=>'?'],
'c124'=>['name'=>'Kask LZLeist_1',	'unit'=>'h',	'desc'=>'?'],
'c125'=>['name'=>'Kask LZLeist_2',	'unit'=>'h',	'desc'=>'?'],
'c126'=>['name'=>'Kask LZLeist_3',	'unit'=>'h',	'desc'=>'?'],
'c127'=>['name'=>'Kask LZLeist_4',	'unit'=>'h',	'desc'=>'?'],
'c128'=>['name'=>'AIN17',			'unit'=>'V',	'desc'=>'?'],
'c129'=>['name'=>'BRT',				'unit'=>'°C',	'desc'=>'??? 98 a l"arret => 110'],
'c130'=>['name'=>'IO32 522',		'unit'=>'mV',	'desc'=>'?'],
'c131'=>['name'=>'IO32 509',		'unit'=>'mV',	'desc'=>'?'],
'c132'=>['name'=>'IO32 510',		'unit'=>'mV',	'desc'=>'?'],
'c133'=>['name'=>'IO32 517',		'unit'=>'°C',	'desc'=>'?'],
'c134'=>['name'=>'Leistung',		'unit'=>'%',	'desc'=>'puissance '],
'c135'=>['name'=>'KasEntaschFreigabe','unit'=>'',	'desc'=>'??? decendrage sup a	'],
'c136'=>['name'=>'I_Lambda',   		'unit'=>'mA',	'desc'=>'intensite lambda'],
'c137'=>['name'=>'TRA_A',			'unit'=>'°C',	'desc'=>'?'],
'c138'=>['name'=>'TRA_1',			'unit'=>'°C',	'desc'=>'temperature interieur Z1 FR35'],
'c139'=>['name'=>'TRA_2',			'unit'=>'°C',	'desc'=>'?'],
'c140'=>['name'=>'TRA_3',			'unit'=>'°C',	'desc'=>'?'],
'c141'=>['name'=>'TRA_4',			'unit'=>'°C',	'desc'=>'?'],
'c142'=>['name'=>'TRA_5',      		'unit'=>'°C',	'desc'=>'?'],
'c143'=>['name'=>'TRA_6',      		'unit'=>'°C',	'desc'=>'?'],
'c144'=>['name'=>'U_lambda_soll',	'unit'=>'mV',	'desc'=>'tension lambda doit'],
'c145'=>['name'=>'BRT Soll',		'unit'=>'°C',	'desc'=>'?'],
'c146'=>['name'=>'Anf. HKR1',		'unit'=>'°C',	'desc'=>'?'],
'c147'=>['name'=>'Anf. HKR2',		'unit'=>'°C',	'desc'=>'?'],
'c148'=>['name'=>'Anf. HKR3',		'unit'=>'°C',	'desc'=>'?'],
'c149'=>['name'=>'Anf. HKR4',		'unit'=>'°C',	'desc'=>'?'],
'c150'=>['name'=>'Anf. HKR5',		'unit'=>'°C',	'desc'=>'?'],
'c151'=>['name'=>'Anf. HKR6',		'unit'=>'°C',	'desc'=>'?'],
'c152'=>['name'=>'Anf. HKR7',		'unit'=>'°C',	'desc'=>'?'],
'c153'=>['name'=>'Anf. HKR8',		'unit'=>'°C',	'desc'=>'?'],
'c154'=>['name'=>'IO32 521',		'unit'=>'mV',	'desc'=>'?'],
'c155'=>['name'=>'BSZ_STEUERUNG',	'unit'=>'h',	'desc'=>'heures mise sous tension'],
'c156'=>['name'=>'BSZ_HEIZUNG',		'unit'=>'h',	'desc'=>'heures chauffage'],
'c157'=>['name'=>'BSZ_ZUENDUNG',	'unit'=>'h',	'desc'=>'heures allumages'],
'c158'=>['name'=>'BSZ_SZ',			'unit'=>'h',	'desc'=>'heures extracteur fumées'],
'c159'=>['name'=>'BSZ_AUSTRAG',		'unit'=>'h',	'desc'=>'heures extracteur silo'],
'c160'=>['name'=>'Regler K',		'unit'=>'',		'desc'=>'regulateur : K'],
'c161'=>['name'=>'BSZ_HEIZUNG_UPD',	'unit'=>'h',	'desc'=>'heures chauffage upd'],
'c162'=>['name'=>'BSZ_ZUENDUNGEN',	'unit'=>'',		'desc'=>'??? 50 a l"arret / env 10 en marche'],
'c163'=>['name'=>'BSZ_LEIST_90',	'unit'=>'h',	'desc'=>'heure puissance > 90%'],
'c164'=>['name'=>'BSZ_GLUTERH',		'unit'=>'h',	'desc'=>'veille /conservation braise ?'],
'c165'=>['name'=>'UseSoll', 		'unit'=>'mm',	'desc'=>'?'],
'c166'=>['name'=>'UseIst', 			'unit'=>'mm',	'desc'=>'?'],
'c167'=>['name'=>'UseStrom',		'unit'=>'mA',	'desc'=>'?'],
'c168'=>['name'=>'Anf. HKR0',		'unit'=>'°C',	'desc'=>'?'],
'c169'=>['name'=>'Anf. HKR9',		'unit'=>'°C',	'desc'=>'?'],
'c170'=>['name'=>'Anf. HKR10',		'unit'=>'°C',	'desc'=>'?'],
'c171'=>['name'=>'Anf. HKR11',		'unit'=>'°C',	'desc'=>'?'],
'c172'=>['name'=>'Anf. HKR12',		'unit'=>'°C',	'desc'=>'?'],
'c173'=>['name'=>'Anf. HKR13',		'unit'=>'°C',	'desc'=>'?'],
'c174'=>['name'=>'Anf. HKR14',		'unit'=>'°C',	'desc'=>'?'],
'c175'=>['name'=>'Anf. HKR15',		'unit'=>'°C',	'desc'=>'?'],
'c176'=>['name'=>'Spreizung',		'unit'=>'°C',	'desc'=>'?'],
'c177'=>['name'=>'max.Leist.P3F.HT','unit'=>'%',	'desc'=>'?'],
'c178'=>['name'=>'TPmo',			'unit'=>'°C',	'desc'=>'?'],
'c179'=>['name'=>'TPmu',			'unit'=>'°C',	'desc'=>'?'],
'c180'=>['name'=>'Puff Füllgrad',	'unit'=>'%',	'desc'=>'% remplissage du Ballon Tampon'],
'c181'=>['name'=>'?',				'unit'=>'',		'desc'=>'Alarme si >2000?'], 
														// 1=rien , 9=debut ou fin ,89 , 8 ,18, 28... ,
														// 2001 ?
														// 2003 Temps de Remplissage dépassé
														// 2009 defaut 
														// 2089 ?
														// 2189 ?
														// 2289 ?
'c182'=>['name'=>'?',				'unit'=>'',		'desc'=>'?'],
'c183'=>['name'=>'?',				'unit'=>'',		'desc'=>'pompe ballon ECS 0 =off, 2=on'],
'c184'=>['name'=>'?',				'unit'=>'',		'desc'=>'?'],
'c185'=>['name'=>'?',				'unit'=>'',		'desc'=>'0 = tremi OK ,2000 = tremi vide'],
'c186'=>['name'=>'?',				'unit'=>'',		'desc'=>'?'],
'c187'=>['name'=>'?',				'unit'=>'',		'desc'=>'?'],
'c188'=>['name'=>'?',				'unit'=>'',		'desc'=>'?'],
];
?>