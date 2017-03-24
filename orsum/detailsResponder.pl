#!/usr/bin/perl
use v5.10.0;
use warnings;
use DBI;
use diagnostics;
use CGI;
use JSON;
use Encode qw(decode_utf8 encode_utf8);
use Data::Dumper;

print "Content-Type: application/json; charset=utf-8\n\n";

sub selectEvent {
	my $param = (CGI->new())->param('id');
	my $db = shift;
	my $stmt = $db->prepare("SELECT event.id, event.titel, event.anfang, event.ende, event.text, medien.link, medien.kurzbeschreibung, medien.thumbnailLink FROM event LEFT JOIN medien ON medien.eventIDFS=event.id WHERE event.id=$param");
	$stmt->execute() or die $stmt->err_str;
	
	return $stmt;
}

my ($db_user, $db_name, $db_pass) = ('3i', 'media', 'wurst');
my $db = DBI->connect("DBI:mysql:database=$db_name", $db_user, $db_pass, {RaiseError => 0, PrintError => 1, mysql_enable_utf8 => 1});

$statement = selectEvent($db);

my %databaseData;
my $i = 0;
SELECTION: while (my ($id, $title, $anfang, $ende, $text, $link, $kurzbeschr, $thumbLink) = $statement->fetchrow_array() ) {
	if ($statement->rows > 1) {
		if ($i > 0) {
			my %medien = (
				"link" => $link,
				"kurzbeschreibung" => $kurzbeschr,
				"thumbnailLink" => $thumbLink
			);
			
			push($databaseData{"medien"}, \%medien);
			
			$i++;
			next SELECTION;
		}
	}
	
	%databaseData = (
		"id" => $id,
		"titel" => encode_utf8($title),
		"anfang" => encode_utf8($anfang),
		"ende" => encode_utf8($ende),
		"text" => encode_utf8($text),
		"medien" => [{
			"link" => $link,
			"kurzbeschreibung" => $kurzbeschr,
			"thumbnailLink" => $thumbLink
		}]
	);
	
	$i++;
}

my $json = new JSON;
print $json->encode(\%databaseData);
