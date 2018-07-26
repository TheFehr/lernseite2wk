#!/usr/bin/perl

#
#  ajaxResponder.pl
#  3i Projekt PkGS
#
#  This file is responsible for the REST interface between the webapp and the server/MySQL DB.
#  The client sends a request to this script via AJAX and the script responds with the DB data using JSON encoding.
#
#  Created by Lukas Bischof on 25.04.2017.
#

use v5.10.0;
use warnings;
use DBI;
use diagnostics;
use CGI;
use JSON;
use Encode qw(decode_utf8 encode_utf8);

print "Content-Type: application/json; charset=utf-8\n\n";

sub selectEvents {
	my $db = shift;
	my $sql = "SELECT event.id,
	`event`.kurztext as 'content',
    `event`.titel as 'title',
    `ort`.name as 'ort',
    `ort`.breiten,
    `ort`.laengen as 'laengen',
    `event_event`.prevEvent,
    `event`.anfang as 'date',
    `medien`.`id` as 'mediaId',
    `medien`.`link` as 'mediaLink',
    `medien`.`kurzbeschreibung` as 'mediaDesc',
    `medien`.`typ` as 'mediaType',
    `medien`.`thumbnailLink` as 'mediaThumb'
FROM `event`
JOIN ort  ON ort.id=`event`.ort_idfs
LEFT JOIN event_event ON event_event.`event` = `event`.id
LEFT JOIN `medien` ON `medien`.`eventIDFS` = `event`.id
ORDER BY `event`.`anfang` ASC";

	my $stmt = $db->prepare($sql);
	$stmt->execute() or die $stmt->err_str;

	return $stmt;
}

sub generateMediaHash {
	my ($id, $link, $desc, $type, $thumb) = @_;

	return (
		"id" => $id,
		"link" => $link,
		"desc" => $desc,
		"type" => $type,
		"thumb" => $thumb
	);
}


# my ($db_user, $db_name, $db_pass) = ('INSERT USER NAME', 'INSERT DB NAME', 'INSERT DB PASSWORD');
# When using Docker image:
my ($db_user, $db_name, $db_pass) = ('docker', 'media', 'my-secure-password');
my $db = DBI->connect("DBI:mysql:database=$db_name", $db_user, $db_pass, {RaiseError => 1, PrintError => 1, mysql_enable_utf8 => 1});

$statement = selectEvents($db);
our %databaseData;

_W: while (
	my ($id, $content, $title, $ort,
		$breiten, $laengen, $prevEvent,
		$date, $mediaId, $mediaLink,
		$mediaDesc, $mediaType, $mediaThumb) = $statement->fetchrow_array()
)
{
	if (exists $databaseData{$id}) {
		if (defined $prevEvent) {
			push(@{$databaseData{$id}{"prevEvent"}}, $prevEvent);
		}

		if (defined $mediaId) {
			my %media = generateMediaHash($mediaId, $mediaLink, $mediaDesc, $mediaType, $mediaThumb);
			push @{$databaseData{$id}{"media"}}, \%media;
		}

		next _W;
	}

	my %event = (
		"id" => $id,
		"content" => encode_utf8($content),
		"title" => encode_utf8($title),
		"ort" => encode_utf8($ort),
		"position" => [$breiten, $laengen],
		"date" => $date,
		"prevEvent" => [],
		"media" => []
	);

	if (defined $prevEvent) {
		push(@{$event{"prevEvent"}}, $prevEvent);
	}

	if (defined $mediaId) {
		my %media = generateMediaHash($mediaId, $mediaLink, $mediaDesc, $mediaType, $mediaThumb);
		push @{$event{"media"}}, \%media;
	}

	$databaseData{$id} = \%event;
}

my $json = new JSON;
print $json->encode(\%databaseData);
