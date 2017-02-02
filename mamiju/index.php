
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Projekt: 2.Weltkrieg</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="img/Favicon.ico">
	</head>

	<body>

		<header id="header"><h1>Projekt: 2.Weltkrieg</h1></header>

		<div id="container">

			<main id="center" class="column">
				<article>
				
					
					<h1>Timeline</h1>
					<div class="radioButtons">
						<table>
							<tr>
								<td>1939</td>
								<td>1940</td>
								<td>1941</td>
								<td>1942</td>
								<td>1943</td>
								<td>1944</td>
								<td>1945</td>
							</tr>
								<form method="POST">
									<tr>
										<td><input type="radio" name="radio" value="1939"/></td>
										<td><input type="radio" name="radio" value="1940"/></td>
										<td><input type="radio" name="radio" value="1941"/></td>
										<td><input type="radio" name="radio" value="1942"/></td>
										<td><input type="radio" name="radio" value="1943"/></td>
										<td><input type="radio" name="radio" value="1944"/></td>
										<td><input type="radio" name="radio" value="1945"/></td>
									</tr>
								
						</table>
						
						<input class="timebutton" type="submit" name="button" value="Jahr wählen">
								</form>
								<hr/>
					</div>
					<div>
						
						<?php	
							/*TIMELINE AUSGABEN*/
							if (isset($_POST['button'])){
								if(isset($_POST['radio'])){
									if ($_POST['radio']==1939){
										echo 	"<h3>1939</h3> <p>Deutschland besetzt Danzig und Polen. Die Rote Armee marschiert ebenfalls in Polen, Litauen und Finnland ein. Gewaltsame Besetzung und Aneignung weiterer Gebiete und Errichtung einer deutschen besonderen Besatzungszone, dem Generalgouvernement, in Polen. Massenhafte Verschleppung und Ermordung von jüdischen Polen. Großbritanniens und Frankreichs wollen gegen Deutschland und die Sowjetunion eingreifen, doch dazu kommt es nicht.</p> ";
									}elseif ($_POST['radio']==1940){
										echo "<h3>1940</h3> <p>1940 greift das Deutsche Reich Dänemark und Norwegen an, es folgt anschließend deren Besetzung. Sie marschieren in Belgien, Luxemburg, den Niederlanden und Nordfrankreich  ein. Der so genannte Westfeldzug von Deutschland beginnt. Die Sowjetunion besetzt die baltischen Staaten und das rumänische Bessarabien. Die Deutschen liefern sich einen Luftkampf mit den Britten. Hitler wird Aussenpolitisch tätig und es entsteht der Dreimächtepakt zwischen Italien, Japan und dem Deutschen Reich.  </p>";
									}elseif ($_POST['radio']==1941){
										echo "<h3>1941</h3> <p>1941 wird der Krieg nochmals an vielen Stellen ausgeweitet. Um Italien bei seiner Invasion in Afrika zu unterstützen, befiehlt Hitler den Einsatz deutscher Truppen in Libyen. Ihnen gelingt ein Vorstoß bis Ägypten . Der Einmarsch im Balkan führt zur Invasion Kretas und Griechenlands. Der Deutsche Luftangriff, der Battle of Britain, endet zugunsten der Royal Air Force. Am 22. Juni startet Hitler mit dem Unternehmen „Barbarossa“' den Krieg gegen den zeitweiligen Vertragspartner Sowjetunion. Es kommt zum Bündnis zwischen Vereinigtem Königreich/Großbritannien und der UdSSR. Japan kann durch die Eroberung des südlichen Indochinas bis Malaysia den Druck auf Chinas Nachschubwege erhöhen. Der japanische Vormarsch im Pazifik kommt auf Neu Guinea zum Stehen. Der deutsche Angriff gegen die Sowjetunion kommt vor Moskau und in Stalingrad zum Stillstand und in der Gegenoffensive folgen erstmals größere Geländegewinne auf alliierter Seite. Japan startet den Angriff auf Pearl Harbor und somit ist Amerika zum ersten Mal am Krieg beteiligt.</p>";
									}elseif ($_POST['radio']==1942){
										echo "<h3>1942</h3> <p>Die Deutschen wollen Stalingrad einnehmen, doch sie scheitern. Hitler weigert sich die Truppen zurückzuziehen und sie halten die Stellung bis zur Niederlage. Die Deutschen Truppen wurden von der UdSSR eingekesselt und sie waren zahlenmässig unterlegen. Ebenfalls waren sie für solche Temperaturen nicht vorbereitet. Die Alliierten stranden in Nordafrika und schlagen Deutschland zurück. Japan nimmt eine von den Holländer besetzte Region in Indien eine und Australien, sowie die USA schlagen Japan auf Neu Guinea zurück.</p>";
									}elseif ($_POST['radio']==1943){
										echo "<h3>1943</h3> <p>Die Sowjetische Armeen erreichen den Sieg in Stalingrad, was eine erste bedeutende deutsche Kapitulation bedeutet. Im März erobern deutsche Truppen das Gebiet bis zum mittleren Donez zurück, aber nach mehreren sowjetischen Gegenoffensiven in den folgenden Monaten muss die Wehrmacht an der ganzen Ostfront den Rückzug antreten. Der militärisch unbedeutende Aufstand im Warschauer Ghetto wird ein bleibender moralischer Sieg der jüdischen Häftlinge. Die Atlantikschlacht geht für die deutschen U-Boote verloren. Alliierte Truppen landen in Sizilien. Italien verlässt das Bündnis mit Hitler. Die Lufthoheit der Alliierten in Europa wird immer erdrückender. Mit der Rückeroberung der Salomonen beginnt die amerikanische Taktik des Inselspringens im Pazifik.</p>";
									}elseif ($_POST['radio']==1944){
										echo "<h3>1944</h3> <p>Das Kriegsjahr 1944 ist vor allem durch wichtige Erfolge der Alliierten gekennzeichnet: Im Januar wird der Belagerungsring um Leningrad aufgebrochen. Im Westen gelingt die Invasion in die Normandie; Paris wird befreit. Im Osten gelingt es der Roten Armee die Heeresgruppen Mitte und Süd entscheidend zurückzuwerfen. Erst in Ostpreußen kommt die Offensive im Oktober vorübergehend zum Stehen. In Italien gelangen die Alliierten bis nördlich einer Linie Rimini-Rom voran. Allein in Asien führt eine japanische Offensive in China zu einer Landverbindung nach Indochina und damit zu einem Teilerfolg der Achsenmächte. Aber im Oktober gelingen die Befreiung der Philippinen und die Vernichtung der kaiserlich japanischen Marine.</p>";
									}elseif ($_POST['radio']==1945){
										echo "<h3>1945</h3> <p>Das letzte Kriegsjahr wurde zunächst von einer Konferenz der absehbaren Sieger gekennzeichnet: der Konferenz von Jalta. Die Befreiung der Konzentrationslager war in den folgenden Wochen für die alliierten Soldaten mit fürchterlichen Beobachtungen verbunden. Im Pazifikraum werden die Philippinen, Indochina, Burma und China befreit. Der Sieg in der Schlacht um die Seelower Höhen öffnet den Weg nach Berlin. Im März wird der Rhein überschritten. Am 30. April hisst die Rote Armee eine Fahne auf dem Reichstag. Europa ist befreit. Am 6. August wird die erste Atombombe auf Hiroshima abgeworfen. Nach der Kapitulation des Kaisers wurde der japanischen Armee am 16. August die Einstellung aller Kampfhandlungen befohlen und am 2. September beendet die Unterschriftszeremonie auf dem Schlachtschiff USS Missouri in der Bucht von Tokio den Zweiten Weltkrieg.</p>";
									}
								}else{
									echo "Wählen sie eine Jahreszahl oder ein Thema aus.";
								}
							}
							/*LINKBUTTONS AUSGABEN*/
							if(isset($_POST['naviButton'])){
								if(isset($_POST['button'])){
									/*header("Location: http://localhost/zweiterWKWEB/phpIndex.php");*/
								}
								if($_POST['naviButton']=="Luxemburg"){
									echo "<h3>Luxemburg</h3><p>Luxemburg wurde 1940 von der demokratisch gewählten Grossherzogin Charlotte regiert. Sie haben sich nicht gegen Deutschland verfeindet, nichts desto trotz war das kein Grund für Deutschland nicht anzugreifen. Luxemburg war für Deutschland der Weg nach Frankreich mit dem sie die gefährliche Maginot-Linie der Franzosen umgehen konnten. Die Luxemburger Freiwilligenkompanie stellte sich mutig der überlegenen Streitmacht von Deutschland, doch sie konnten die Einnahme der Hauptstadt nicht verhindern. Frankreich kam den Luxemburgern zu Hilfe, doch sie zogen sich nach kurzen Scharmützeln wieder hinter die Maginot-Linie zurück.</p> ";
								}
								if($_POST['naviButton']=="Niederlande"){
									echo "<h3>Niederlande</h3><p>Kurz nach der Einnahme von Luxemburg ging der Westfeldzug der Deutschen weiter gegen Holland, welche sich nicht für den Krieg vorbereitet hatten. Sie hofften, wie schon im ersten Weltkrieg, ausserhalb des Kriegsgeschehens bleiben zu können. Die Deutschen mussten bei einem Fallschirmjäger Luftlandeunternehmen hohe Verluste einfordern. Nach vier Tagen war fast ganz Holland unter deutscher Besetzung. Die Niederlande kapitulierten kurz darauf, doch es war bereits zu spät um den Luftangriff auf Rotterdam zu stoppen und so kamen 800 Menschen ums Leben. Es wurde eine Niederländische Exilregierung in England gegründet.</p> ";
								}
								if($_POST['naviButton']=="Polen"){
									echo "<h3>Polenfeldzug</h3><p>Der 2. Weltkrieg begann mit dem deutschen Angriff auf Polen am 1. September 1939. Hitler suchte einen Vorwand für den Kriegsbeginn. Er sagte: „In der Nacht vom 31. August auf den 1. September 1939 haben Soldaten aus Polen Deutschland angegriffen.“ Aber das war eine Lüge. Mitglieder der SS hatten sich als Polen ausgegeben. Sie taten so, als würden sie einen deutschen Radiosender überfallen. Sie sagten im Radio: „Der Sender befindet sich in polnischer Hand. Die Stunde der Freiheit ist gekommen!“ Die Wehrmacht griff daraufhin Polen an. Nach vier Wochen musste sich die polnische Armee ergeben. Die Regierung aus Polen musste fliehen. Die Wehrmacht und die SS begingen schwere Verbrechen an der polnischen Bevölkerung. Sie ermordete in kurzer Zeit 60.000 Menschen: Polnische Gebildete, Lehrer, Ärzte, Priester, Adlige, Führer von Gewerkschaften, Linke und Juden. Der Krieg gegen Polen war der Anfang des deutschen Vernichtungskrieges in Osteuropa. Polen wurde geteilt. Der Westen gehörte nun zu Deutschland. Die Mitte war das „Generalgouvernement Polen“. So nannten die Nationalsozialisten das Gebiet von Polen, das von der deutschen Armee besetzt war, aber nicht zu Deutschland gehörte. Der Osten gehörte zur Sowjetunion. Sowjetische Soldaten waren dort einmarschiert. Stalin und Hitler wollten sich die Macht in Polen teilen. Das hatten sie schon vor dem Krieg so abgesprochen. </p> ";
								}
								if($_POST['naviButton']=="Norwegen"){
									echo "<h3>Norwegen</h3><p>Unternehmen Weserübung:</p> <p>Hitler wusste, dass Deutschland noch einen langen Weg vor sich hat und brauchte genügend Ressourcen für sein Vorhaben. Um die Eisenerzversorgung sicher zu stellen und um eine geeignete Position der eigenen Truppen gegen England zu haben, nahmen die Nazis Norwegen ein. Wichtig waren dabei vor allem die Norwegischen Häfen, wie zum Beispiel Narvik. <p/>";
								}
								if($_POST['naviButton']=="Belgien"){
									echo "<h3>Belgien</h3><p>Die Schlacht von Belgien, die auch als die belgische Kampagne bekannt ist, fand über achtzehn Tage in einem Teil der Schlacht von Frankreich im Jahre 1940 statt. Es war eine Offensive Operation der Deutschen im Zweiten Weltkrieg. Die alliierten Armeen hatten geglaubt, dass diese Schlacht Deutschlands Hauptangriff sei, also versuchten sie, die Deutschen in Belgien zu behindern. Die Schlacht endete mit den Deutschen, die Belgien besetzten, nachdem die belgische Armee sich ergeben hatte. Die belgische Kampagne umfasste die Schlacht von Fort Eben-Emael, die die erste taktische Luftschiff-Operation mit Fallschirmjägern war. Es enthielt auch die erste Panzerschlacht (Kampf von Hannut) des Krieges. Der Zusammenbruch der Belgier veranlasste die Alliierten, sich aus dem kontinentalen Europa zurückzuziehen. Die Deutschen fielen am 10. Mai 1940 zum zweiten Mal in Belgien ein. Die Deutschen schlugen gleichzeitig die Niederlande und Belgien und markierten den Beginn der lang erwarteten deutschen Invasion im Westen. Sie begannen ihre westliche Kampagne auf einer breiten Front gegen die neutrale Belgien, Niederlande und Luxemburg.</p>";
								}
								if($_POST['naviButton']=="Frankreich"){
									echo "<h3>Frankreich</h3><p>Nachdem die starken Panzerverbände der deutschen Heeresgruppe B drei Tage nach Beginn der Schlacht um Frankreich am 8. Juni 1640 den Durchbruch durch die französische Verteidigungslinie entlang der Somme und Aisne schaffte, erreichte die untere Seine bei Rouen. Die Heeresgruppe A stieß gleichzeitig in Richtung Marne-Linie vor. Die deutsche Eroberung von Paris hatte in Frankreich am 16. Juni 1940 die Ersetzung der Regierung Reynaud durch die Regierung Pétain zur Folge, die erklärtermaßen eine Fortsetzung des Zweiten Weltkriegs von französischer Seite für aussichtslos hielt. Sie schloss am 22. Juni 1940 mit Hitlerdeutschland den Waffenstillstand von Compiègne. Dieser teilte das französische Staatsgebiet in eine besetzte und eine unbesetzte Zone. Einer deutschen Militärverwaltung unter einem „Militärbefehlshaber in Frankreich“ mit Sitz in Paris, General Otto von Stülpnagel, unterstand Nord- und Westfrankreich mit den wichtigen Industriegebieten im Norden sowie der gesamten Kanal- und Atlantikküste bis zur spanischen Grenze. Die nördlichen Départements Nord und Pas-de-Calais wurden dem deutschen Militärbefehlshaber, General Alexander von Falkenhausen mit Sitz in der belgischen Hauptstadt Brüssel unterstellt. Das Territorium des Reichslands Elsass-Lothringen, das Deutschland 1919 im Friedensvertrag von Versailles an Frankreich hatte abtreten müssen, wurde den Gauleitern der Reichsgaue Baden und Saarpfalz als CdZ-Gebiete „Elsass“ bzw. „Lothringen“ unterstellt. In Frankreichs unbesetztem Süden war der Badeort Vichy im Département Allier ab Juli 1940 Sitz der neuen französischen Regierung mit dem Staatsoberhaupt und Ministerpräsidenten Marschall Henri Philippe Pétain. Dem Vichy-Regime unterstanden ungefähr 40 Prozent des französischen Staatsgebiets mitsamt den Kolonien sowie ein 100.000 Mann starkes Freiwilligenheer, ein bedeutender Teil der Kriegsmarine, der sich in die Häfen des Mittelmeers und der Kolonien zurückgezogen hatte, und eine kleine Luftwaffe.</p>";
								}
								if($_POST['naviButton']=="Jugoslavien"){
									echo "<h3>Jugoslavien</h3><p>Im Balkanfeldzug während des Zweiten Weltkriegs griff die deutsche Wehrmacht am 6. April 1941 das Königreich Jugoslawiens an und besetzte es innerhalb wenigen Wochen. Die Invasion der Wehrmacht wurde von italienischen und ungarischen Truppen unterstützt. Die jugoslawischen Streitkräfte kapitulierten am 17. April. Deutschland war im Krieg mit Großbritannien (Luftschlacht um England) und hatte die Absicht, im Frühsommer 1941 die Sowjetunion anzugreifen. Ursprünglich hatte das NS-Regime gehofft, das neutrale Jugoslawien mit einem Bündnis in seine Einflusssphäre zu bringen und so seine Südflanke zu sichern. Kurz nachdem die jugoslawische Regierung den Dreimächtepakt unterzeichnet hatte, putschte sich aber am 27. März 1941 eine jugoslawische Gegenregierung an die Macht und erklärte das Abkommen für ungültig. So sah sich Hitler veranlasst, gleichzeitig gegen Griechenland und Jugoslawien vorzugehen. Der Balkanfeldzug verzögerte den Beginn des Krieges gegen die Sowjetunion um sechs Wochen und erschwerte den Plan der Wehrmacht, in einem Blitzkrieg noch vor dem Wintereinbruch die Hauptstadt Moskau einzunehmen.</p>";
								}
								if($_POST['naviButton']=="Griechenland"){
									echo "<h3>Griechenland</h3><p>Im Balkanfeldzug während des Zweiten Weltkriegs griff die deutsche Wehrmacht das Königreich Griechenland an, gleichzeitig mit dem Königreich Jugoslawien, am 6.April 1941. Auch sowohl Griechenland wie Jugoslawien wurden innerhalb weniger Wochen besetzt. Die griechischen Streitkräfte kapitulierten am 23. April 1941. Die Kämpfe auf der Insel Kreta, wo britische Truppen gelandet waren, zogen sich bis zum 1. Juni hin. Bereits am 28. Oktober 1940 hatte das faschistische Italien Griechenland angegriffen, war im Griechisch-Italienischen Krieg aber bald in die Defensive geraten und hatte Teile Albaniens preisgeben müssen. Daraufhin wurde bereits im November 1940 von deutscher Seite der Plan zu einem Eingreifen auf dem Balkan zugunsten Italiens gefasst. </p>";
								}
								if($_POST['naviButton']=="Grossbritanien"){
									echo "<h3>Grossbritanien</h3><p>Grossbritanien plante die Erweiterung der Britischen Luftwaffe, der Royal Air Force (RAF). Diese Erweiterung sicherte Grossbritanien eine gute Grundlage zur Verteidigung gegen die ebenfalls sehr starke Luftwaffe der Deutschen. Die Nazis wollten die Kapitulation Grossbritanniens mit einem Luftkampf erzwingen. Dieser Luftkampf wurde als „Battle of Britain“ bekannt, indem die Britten zahlenmässig unterlegen waren, doch ihre Stellung so lange verteidigen konnten bis die Deutschen sich zurückzogen. Die Luftschlacht dauerte vom 10. Juli bis zum 31. Oktober 1940 und war der Grund warum Grossbritanien nicht gleich endete wie die anderen Europäischen Staaten. Hitler wollte, nachdem sie den Luftraum erobert hätten, Grossbritanien so lange bombardieren, bis diese schliesslich aufgeben würden und ein Friedensabkommen unterzeichnen würden. Dieser Plan wurde jedoch wegen den Strapazen bei dem Luftkampf auf unbestimmte Zeit verschoben.</p>";
								}
								if($_POST['naviButton']=="Kreta"){
									echo "<h3>Kreta</h3><p>Das Unternehmen Merkur war eine Schlacht im Zweiten Weltkrieg, die deutsche Fallschirmjäger, unterstützt von Gebirgsjägern zur Einnahme der Insel Kreta durchführten, und zugleich die erste grosse Luftlandeoperation der Geschichte. Da die Briten die deutsche Verschlüsselungsmaschine Enigma auslesen konnten, waren sie über die Angriffspläne in annähernd allen Einzelheiten informiert. Darum ging Freyberg von einem kombinierten Luft-See-Angriff aus und legte die Masse seiner Truppen an die Nordküste in den Bereich Maleme–Chania–Souda-Bucht mit dem Auftrag, Hauptstadt, Flugplatz und Hafen zu halten.  Nach der Einnahme Griechenlands im Verlauf des Balkanfeldzuges 1941 wurde das von alliierten Truppen verteidigte Kreta trotz einem solchen Vorteil durch die Luftflotte 4 der Deutschen, welche aus zwei Fliegerkorps und zwei Luftgau-Kommandos bestand, erobert und blieb bis 1945 besetzt. </p>";
								}
								if($_POST['naviButton']=="Russland"){
									echo "<h3>Russland</h3><p>Deutschland schloss einen Nichtangriffspakt mit Russland, um eine Kampffront weniger zu haben. Zusammen eroberten sie anschliessend Polen und teilten es auf. Sie waren die Feinde der Alliierten, bis sich Deutschland schliesslich auch gegen Russland stellte. Im Deutsch-Sowjetische Krieg bildete die sogenannte Ostfront von 1941 bis 1944 die wichtigste Landfront der Alliierten im Kampf gegen das nationalsozialistische Deutsche Reich und seine Verbündeten. Im damaligen Deutschen Reich wurde er als Russland- oder Ostfeldzug bezeichnet, in der Sowjetunion als grosser Vaterländischer Krieg. Er begann am 22. Juni 1941 mit dem Überfall der deutschen Wehrmacht auf die Sowjetunion und endete nach der Schlacht um Berlin am 8./9. Mai 1945 mit der bedingungslosen Kapitulation der Wehrmacht. Adolf Hitler gab seinen Entschluss zu diesem Angriffskrieg dem Oberkommando der Wehrmacht am 31. Juli 1940 bekannt und befahl am 18. Dezember 1940, ihn bis Mai 1941 unter dem Decknamen „Unternehmen Barbarossa“ militärisch vorzubereiten. Damit wurde bewusst beabsichtigt der am 24. August 1939 geschlossene deutsch-sowjetische Nichtangriffspakt zu brechen. Um für die arische Herrenrasse Lebensraum im Osten zu erobern und den jüdischen Bolschewismus zu vernichten, sollten grosse Teile der sowjetischen Bevölkerung vertrieben, versklavt und getötet werden. Das NS-Regime nahm den millionenfachen Hungertod sowjetischer Kriegsgefangener und Zivilisten bewusst in Kauf, liess sowjetische Offiziere und Kommissare auf der Basis völkerrechtswidriger Befehle ermorden und nutzte diesen Krieg zur damals so bezeichneten „Endlösung der Judenfrage“. Nach anfänglichen deutschen Erfolgen leiteten sowjetische Siege in der Schlacht um Moskau Ende 1941 und vor allem in der Schlacht von Stalingrad 1942/43 Deutschlands vollständige Niederlage ein. Nach dem Zusammenbruch der Heeresgruppe im Sommer 1944, der auf die Eröffnung der lange erwarteten „Zweiten Front“ in Westeuropa durch die westlichen Alliierten folgte, war die Wehrmacht militärisch geschlagen und konnte nur noch hinhaltenden Widerstand leisten. Vor allem wegen der von Deutschen geplanten und ausgeführten Massenverbrechen an der Zivilbevölkerung starben im Kriegsverlauf zwischen 24 und 40 Millionen Bewohner der Sowjetunion sowie etwa 2,7 Millionen deutsche Soldaten.  </p>";
								}
								if($_POST['naviButton']=="Deutschland"){
									echo "<h3>Deutschland</h3><p>1920 erfolgte im Münchner Hofbräuhaus die öffentliche Bekanntgabe der neuen Partei durch Umbenennung der Deutschen Arbeiterpartei (DAP) in Nationalsozialistische Deutsche Arbeiterpartei (NSDAP), welche das Fundament des Aufstiegs von Hitlers war. Er wurde ab 1921 ihr Parteivorsitzender. Er war vor allem dafür geeignet, weil er ein Talent für grosse Reden und Propagandaverbreitung hatte. 1933 wurde die NSDAP in Deutschland gewählt und Hitler stieg immer höher auf, bis er 1934 als Reichskanzler gewählt wurde. Er traf seine politischen Entscheide so, dass er das Recht besitzt, die Gesetze Deutschlands so anzupassen wie es ihm gefällt. Er verbreitete in Deutschland Propaganda über den Judenhass und gründete die Hitlerjugend, welche den Deutschen bereits in jungen Jahren die „richtige“ politische- und allgemeine Lebenseinstellung eintrichtern sollte.Adolf Hitler wurde grössenwahnsinnig und wollte die deutsche Blutlinie so sauber wie möglich halten. Für ihn waren die Juden die grösste Krankheit Deutschlands, gefolgt von allen anderen Ausländern, vor allem südlicher Herkunft. Er wollte die arische Rasse vergrössern und ihnen mehr Lebensraum im Osten verschaffen. Dies waren die Kriegsgründe für den Zweiten Weltkrieg. Zu Beginn schloss er einen Nichtangriffspakt mit Russland, um eine Kampffront weniger zu haben. Zusammen eroberten sie anschliessend Polen und teilten es auf. Bis 194? haben die Deutschen fast ganz Deutschland erobert. Sie haben sich ebenfalls mit Russland verfeindet und den Nichtangriffspakt hinterrücks gebrochen, weil sie schliesslich den Lebensraum im Osten wollten. Nach anfänglichen deutschen Erfolgen leiteten sowjetische Siege in der Schlacht um Moskau Ende 1941 und vor allem in der Schlacht von Stalingrad 1942/43 Deutschlands vollständige Niederlage ein. Deutschland hatte nun mehrere Kampffronten und konnte sich nicht auf eine fixieren. Sie kämpften gegen Russland, in Nordafrika und Schlussendlich auch an der Nordsee von Frankreich. Die Deutschen haben sich an der Romandie stark verschanzt mit Mörsern und Waffen gegen eine Schiff-Invasion. Die Amerikaner und die Briten kamen aber von einer ungünstigeren Seite als gedacht, um einen Überraschungseffekt zu haben. Sie verloren viele Truppen, doch waren erfolgreich mit der Strandung in Frankreich. Von da an wurde Deutschland immer mehr nach innen vertrieben, bis schliesslich nur noch Hitler, seine engster Verwandten und seine Leibsoldaten im Bunker in Berlin übrig blieben. Hitler gab sich einen Kopfschuss weil er nicht als Gefangener sterben wollte und Deutschland, insbesondere Berlin, wurde Zwischen Amerika, England, Frankreich und Russland aufgeteilt. Da Russland immer noch Kommunistisch und im Rückblick auf den Anfang des Zweiten Weltkrieges ein Feind der Alliierten war, führte diese Aufteilung geradewegs zum Kalten Krieg.</p>";
								}
								if($_POST['naviButton'] == "Startseite"){
									echo "<h3>Der 2.Weltkrieg</h3> <p>Der 2. Weltkrieg wurde von den Achsenmächten Deutschland, Italien und Japan, auf der einen Seite, und den Alliierten USA, Großbritannien, Frankreich und der Sowjetunion, auf der anderen Seite geführt. Der 2. Weltkrieg begann am 1. September 1939 mit dem deutschen Angriff auf Polen und endete sechs Jahre später, am 2. September 1945 mit der Kapitulation Japans. Auslöser des Krieges waren deutsche Gebietsansprüche auf Polen. Nach der Niederlage des 1. Weltkrieges hatte das Deutsche Reich Teile seines Gebietes, wie den Polnischen Korridor, an Polen abtreten müssen. Nachdem das Deutsche Reich, unter der Führung von Adolf Hitler und die Sowjetunion, unter der Führung Josef Stalins im August 1939, einen Nichtangriffspakt geschlossen hatten, überfiel die Deutsche Wehrmacht Polen im September 1939 und besetzte den größten Teil des Landes. Ostpolen wurde von der Sowjetunion besetzt. Aufgrund eines Bündnisses mit Polen, erklärten daraufhin Frankreich und Großbritannien Deutschland den Krieg. 1940 setzten die deutschen Truppen ihre Angriffe auf benachbarte Länder fort und besetzten zunächst, im April 1940, Dänemark und Norwegen. Im Mai 1940 eröffnete die Deutsche Wehrmacht eine Großoffensive gegen Frankreich, Belgien und Holland. Innerhalb von sechs Wochen wurden diese Länder besiegt und von deutschen Truppen besetzt. Nur Großbritannien hielt dem deutschen Ansturm stand. Im Juni 1940 erklärte nun auch Italien, das unter der Führung von Benito Mussolini, zusammen mit Deutschland und Japan den Dreimächtepakt geschlossen hatte, den Alliierten den Krieg. Dadurch weitete sich der Krieg auch auf Afrika aus, da Italien und Großbritannien dort Kolonien unterhielten. Im April 1941 wurden auch Jugoslawien und Griechenland von den Achsenmächten besetzt. Schließlich folgte am 22. Juni 1941 der Angriff der Deutschen Wehrmacht und ihrer Verbündeten auf die Sowjetunion, womit der 1939 geschlossene Nichtangriffspakt gebrochen wurde. Ende 1941 weitete sich der bislang europäische Krieg endgültig zu einem Weltkrieg aus, als das Kaiserreich Japan am 7. Dezember 1941 den US-amerikanischen Marinestützpunkt Pearl Harbor überfiel. Anschließend erklärten auch Deutschland und Italien den Vereinigten Staaten von Amerika den Krieg. Ende 1942 wurde der Vormarsch der Achsenmächte gestoppt und die deutschen Truppen erlitten bei den Schlachten von Stalingrad und El Alamein entscheidene Niederlagen, die zum Wendepunkt des Krieges führten. Auch Japan, das große Teile des Pazifik erobert hatte, musste mit den Schlachten von Midway und Guadalcanal schwere Niederlagen hinnehmen und von nun an den Rückzug antreten. Nachdem die Alliierten 1943 in Italien gelandet waren, kapitulierte das Land. 1944 landeten die Alliierten in Frankreich und befreiten Westeuropa. Auch aus Russland wurden die deutschen Truppen verdrängt. Von allen Seiten stießen die Alliierten nun bis nach Deutschland vor und besetzten das Land. Am 30. April 1945 beging Adolf Hitler in Berlin Selbstmord. Anschließend kapitulierte Deutschland, am 8. Mai 1945, wodurch der Krieg in Europa beendet wurde. Japan kämpfte zunächst noch weiter, musste aber nach dem Abwurf zweier Atombomben auf die Städte Hiroshima und Nagasaki ebenfalls kapitulieren. Am 2. September 1945 wurde die Kapitulationsurkunde unterzeichnet und der 2. Weltkrieg damit beendet. Der 2. Weltkrieg war der schlimmste und verlustreichste Krieg in der Geschichte der Menschheit. Zwischen 55 bis 60 Millionen Menschen starben, darunter viele Zivilisten. Zu den schlimmsten Verbrechen des Krieges gehörte der Holocaust, bei dem sechs Millionen Juden von den Nationalsozialisten ermordet wurden. Nach seiner totalen Niederlage verlor Deutschland große Teile seines Gebietes und wurde in zwei Staaten geteilt.</p> <p>Quelle: http://www.geschichte-kinder.de/2-weltkrieg.shtml</p>";
								}
							}
							if(!isset($_POST['naviButton'])){
								if(!isset($_POST['button'])){
									echo "<h3>Der 2. Weltkrieg</h3> <p>Der 2. Weltkrieg wurde von den Achsenmächten Deutschland, Italien und Japan, auf der einen Seite, und den Alliierten USA, Großbritannien, Frankreich und der Sowjetunion, auf der anderen Seite geführt. Der 2. Weltkrieg begann am 1. September 1939 mit dem deutschen Angriff auf Polen und endete sechs Jahre später, am 2. September 1945 mit der Kapitulation Japans. Auslöser des Krieges waren deutsche Gebietsansprüche auf Polen. Nach der Niederlage des 1. Weltkrieges hatte das Deutsche Reich Teile seines Gebietes, wie den Polnischen Korridor, an Polen abtreten müssen. Nachdem das Deutsche Reich, unter der Führung von Adolf Hitler und die Sowjetunion, unter der Führung Josef Stalins im August 1939, einen Nichtangriffspakt geschlossen hatten, überfiel die Deutsche Wehrmacht Polen im September 1939 und besetzte den größten Teil des Landes. Ostpolen wurde von der Sowjetunion besetzt. Aufgrund eines Bündnisses mit Polen, erklärten daraufhin Frankreich und Großbritannien Deutschland den Krieg. 1940 setzten die deutschen Truppen ihre Angriffe auf benachbarte Länder fort und besetzten zunächst, im April 1940, Dänemark und Norwegen. Im Mai 1940 eröffnete die Deutsche Wehrmacht eine Großoffensive gegen Frankreich, Belgien und Holland. Innerhalb von sechs Wochen wurden diese Länder besiegt und von deutschen Truppen besetzt. Nur Großbritannien hielt dem deutschen Ansturm stand. Im Juni 1940 erklärte nun auch Italien, das unter der Führung von Benito Mussolini, zusammen mit Deutschland und Japan den Dreimächtepakt geschlossen hatte, den Alliierten den Krieg. Dadurch weitete sich der Krieg auch auf Afrika aus, da Italien und Großbritannien dort Kolonien unterhielten. Im April 1941 wurden auch Jugoslawien und Griechenland von den Achsenmächten besetzt. Schließlich folgte am 22. Juni 1941 der Angriff der Deutschen Wehrmacht und ihrer Verbündeten auf die Sowjetunion, womit der 1939 geschlossene Nichtangriffspakt gebrochen wurde. Ende 1941 weitete sich der bislang europäische Krieg endgültig zu einem Weltkrieg aus, als das Kaiserreich Japan am 7. Dezember 1941 den US-amerikanischen Marinestützpunkt Pearl Harbor (siehe Foto) überfiel. Anschließend erklärten auch Deutschland und Italien den Vereinigten Staaten von Amerika den Krieg. Ende 1942 wurde der Vormarsch der Achsenmächte gestoppt und die deutschen Truppen erlitten bei den Schlachten von Stalingrad und El Alamein entscheidene Niederlagen, die zum Wendepunkt des Krieges führten. Auch Japan, das große Teile des Pazifik erobert hatte, musste mit den Schlachten von Midway und Guadalcanal schwere Niederlagen hinnehmen und von nun an den Rückzug antreten. Nachdem die Alliierten 1943 in Italien gelandet waren, kapitulierte das Land. 1944 landeten die Alliierten in Frankreich und befreiten Westeuropa. Auch aus Russland wurden die deutschen Truppen verdrängt. Von allen Seiten stießen die Alliierten nun bis nach Deutschland vor und besetzten das Land. Am 30. April 1945 beging Adolf Hitler in Berlin Selbstmord. Anschließend kapitulierte Deutschland, am 8. Mai 1945, wodurch der Krieg in Europa beendet wurde. Japan kämpfte zunächst noch weiter, musste aber nach dem Abwurf zweier Atombomben auf die Städte Hiroshima und Nagasaki ebenfalls kapitulieren. Am 2. September 1945 wurde die Kapitulationsurkunde unterzeichnet und der 2. Weltkrieg damit beendet. Der 2. Weltkrieg war der schlimmste und verlustreichste Krieg in der Geschichte der Menschheit. Zwischen 55 bis 60 Millionen Menschen starben, darunter viele Zivilisten. Zu den schlimmsten Verbrechen des Krieges gehörte der Holocaust, bei dem sechs Millionen Juden von den Nationalsozialisten ermordet wurden. Nach seiner totalen Niederlage verlor Deutschland große Teile seines Gebietes und wurde in zwei Staaten geteilt.</p> <p>Quelle: http://www.geschichte-kinder.de/2-weltkrieg.shtml</p>";
								}
							}
						?>
					</div>
				</article>								
			</main>

			<nav id="left" class="column">
				</br>
				<form method="POST">
				<button class="button" type="submit" name="naviButton" value="Startseite">Startseite</button>	
				<h3>Themen</h3>
				<ul>
						<li><button class="button" type="submit" name="naviButton" value="Luxemburg">Luxemburg</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Niederlande">Niederlande</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Polen">Polen</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Norwegen">Norwegen</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Belgien"/>Belgien</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Frankreich">Frankreich</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Jugoslavien">Jugoslavien</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Griechenland">Griechenland</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Grossbritanien">Grossbritanien</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Kreta"/>Kreta</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Russland">Russland</button></li>
						<li><button class="button" type="submit" name="naviButton" value="Deutschland">Deutschland</button></li>
					</form>
				</ul>

			</nav>

			<div id="right" class="column">
				<?php
					if(!isset($_POST['button']) && !isset($_POST['naviButton'])){
				?>
						<img src="img/2wk2.png" width="100%" height="100% alt="eine grafik">
						<img src="img/2wk.png" width="100%" height="100% alt="eine grafik">
				<?php
					}
				
					if (isset($_POST['button'])){
						if(isset($_POST['radio'])){
							if ($_POST['radio']==1939){							
				?>			
							<img src="img/weginwk.png" width="100%" height="100% alt="eine grafik">
							<img src="img/Karte1939.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1940){
				?>			
							<img src="img/1940Bomber.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1941){
				?>			
							<img src="img/1941Reichstag.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1942){
				?>			
							<img src="img/1942Stalingrad.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1943){
				?>			
							<img src="img/1943Hannover.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1944){
				?>			
							<img src="img/1944Moskau.png" width="100%" height="100% alt="eine grafik">
				<?php
							}elseif ($_POST['radio']==1945){
				?>			
							<img src="img/1945Ende.png" width="100%" height="100% alt="eine grafik">
				<?php
							}
						}	
					}
					if(isset($_POST['naviButton'])){
						if(isset($_POST['button'])){
						}
						if($_POST['naviButton']=="Luxemburg"){
				?>
							<img src="img/LuxemburgBombardiert.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Niederlande"){
				?>
							<img src="img/HollandParagleider.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Polen"){
				?>
							<img src="img/PolenBlitzkrieg.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Norwegen"){
				?>
							<img src="img/NorwegenNarvik.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Belgien"){
				?>
							<img src="img/BelgienInvasion.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Frankreich"){
				?>
							<img src="img/FrankreichRegime.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Jugoslavien"){
				?>
							<img src="img/JugoGefangene.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Griechenland"){
				?>
							<img src="img/Greece.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Grossbritanien"){
				?>
							<img src="img/GBBattleOfB.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Kreta"){
				?>
							<img src="img/KretaLuftschlacht.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Russland"){
				?>
							<img src="img/RusslandSoldaten.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Deutschland"){
				?>
							<img src="img/DeutschlandNazis.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
						if($_POST['naviButton']=="Startseite"){
				?>
						<img src="img/2wk2.png" width="100%" height="100% alt="eine grafik">
						<img src="img/2wk.png" width="100%" height="100% alt="eine grafik">
				<?php
						}
					}			
				?>
			</div>
		</div>
		<div id="footer-wrapper">
			<footer id="footer"><p>Mati, Juli, Milan Quellen: wikipedia.com</p></footer>
		</div>
	</body>
</html>