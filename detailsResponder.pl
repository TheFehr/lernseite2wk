#!/usr/bin/perl
use v5.10.0;
use warnings;
use DBI;
use diagnostics;
use CGI;
use JSON;
use Encode qw(decode_utf8 encode_utf8);
use Data::Dumper;

print "Content-Type: application/json; charset=utf-8\n";
print "Access-Control-Allow-Origin: *\n\n";

sub selectEvent {
	my $param = (CGI->new())->param('id');
	my $db = shift;
	my $stmt = $db->prepare("SELECT event.id, event.titel, event.anfang, event.ende, event.text, medien.link, medien.kurzbeschreibung, medien.thumbnailLink, medien.typ, medien.id FROM event LEFT JOIN medien ON medien.eventIDFS=event.id WHERE event.id=$param");
	$stmt->execute() or die $stmt->err_str;

	return $stmt;
}

# my ($db_user, $db_name, $db_pass) = ('INSERT USER NAME', 'INSERT DB NAME', 'INSERT DB PASSWORD');
# When using Docker image:
my ($db_user, $db_name, $db_pass) = ('docker', 'media', 'my-secure-password');
my $db = DBI->connect("DBI:mysql:database=$db_name", $db_user, $db_pass, {RaiseError => 0, PrintError => 1, mysql_enable_utf8 => 1});

$statement = selectEvent($db);

my %databaseData;
my $i = 0;
SELECTION: while (my ($id, $title, $anfang, $ende, $text, $link, $kurzbeschr, $thumbLink, $medienTyp, $medienId) = $statement->fetchrow_array() ) {
	if ($statement->rows > 1) {
		if ($i > 0) {
			my %medien = (
				"id" => $medienId,
				"link" => $link,
				"kurzbeschreibung" => encode_utf8($kurzbeschr),
				"thumbnailLink" => $thumbLink,
				"typ" => $medienTyp
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
			"id" => $medienId,
			"link" => $link,
			"kurzbeschreibung" => encode_utf8($kurzbeschr),
			"thumbnailLink" => $thumbLink,
			"typ" => $medienTyp
		}]
	);

	$i++;
}

my $json = new JSON;
print $json->encode(\%databaseData);
