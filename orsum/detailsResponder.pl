#!/usr/bin/perl
use v5.10.0;
use warnings;
use DBI;
use diagnostics;
use CGI;
use JSON;
use Encode qw(decode_utf8 encode_utf8);

print "Content-Type: application/json; charset=utf-8\n\n";

my $response = <<'END_RESPONSE';
{
	"id": 2, 
	"titel": "Custom titel",
	"anfang": "2017-03-17T08:43:42.719Z",
	"ende": null,
	"text": "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.",
	"medien": [{
		"link": "http://www.google.com",
		"kurzbeschreibung": "Ein Kriegsgerät",
		"thumbnailLink": "http://www.google.com"
	}]
}
END_RESPONSE


print $response;

my $param = (CGI->new())->param('id');
# print $param;

# use v5.10.0;
# use warnings;
# use DBI;
# use diagnostics;
# use CGI;
# use JSON;
# use Encode qw(decode_utf8 encode_utf8);
# 
# print "Content-Type: application/json; charset=utf-8\n\n";
# 
# sub selectEvents {
# 	my $db = shift;
# 	my $stmt = $db->prepare("SELECT events.ID as 'id', events.content as 'content', events.title as 'title', ort.name as 'ort', ort.breiten as 'breiten', ort.laengen as 'laengen', bewegung.ID as 'bewegung', events.moveIndex as 'moveIndex', monat.monat as 'monat', (SELECT jahre.jahr FROM jahre WHERE jahre.ID=monat.jahrIDFS) as 'jahr' FROM `events` JOIN ort ON ort.ID = events.ortIDFS JOIN bewegung ON bewegung.ID = events.bewegungIDFS JOIN monat ON monat.ID = events.monatIDFS ORDER BY (SELECT jahre.jahr FROM jahre WHERE jahre.ID=monat.jahrIDFS) ASC, monat.monat ASC");
# 	$stmt->execute() or die $stmt->err_str;
# 	
# 	return $stmt;
# }
# 
# 
# my ($db_user, $db_name, $db_pass) = ('3i', 'orsumIchnographiae', 'wurst');
# my $db = DBI->connect("DBI:mysql:database=$db_name", $db_user, $db_pass, {RaiseError => 0, PrintError => 0, mysql_enable_utf8 => 1});
# 
# $statement = selectEvents($db);
# 
# my %databaseData;
# while (my ($id, $content, $title, $ort, $breiten, $laengen, $bewegung, $moveIndex, $monat, $jahr) = $statement->fetchrow_array() ) {
# 	my %event = (
# 		"id" => $id,
# 		"content" => encode_utf8($content),
# 		"title" => encode_utf8($title),
# 		"ort" => encode_utf8($ort),
# 		"position" => [$breiten, $laengen],
# 		"monat" => $monat,
# 		"jahr" => $jahr,
# 		"moveIndex" => $moveIndex
# 	);
# 	
# 	if (exists $databaseData{$bewegung}) {
# 		push($databaseData{$bewegung}, \%event);
# 	} else {
# 		$databaseData{$bewegung} = [\%event];
# 	}
# }
# 
# my $json = new JSON;
# print $json->encode(\%databaseData);
