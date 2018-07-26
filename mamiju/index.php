<?php
	$yt = array();
	$bild = array();
	$audio = array();
	
	if (isset($_GET['id'])) {
	    $id = $_GET['id'];
	
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, "http://localhost/2wk/detailsResponder.pl?id=$id");
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    
	    $content = curl_exec($ch);
	    curl_close($ch);
	    
	    $parsed = json_decode($content);
	    foreach ($parsed->medien as $key => $media) {
	        switch ($parsed->medien[$key]->typ) {
	            case 'youtube':
	            	array_push($yt, $media);
					break;
	
	            case 'bild':
	            	array_push($bild, $media);
					break;
	
	            case 'audio':
	            	array_push($audio, $media);
					break;
	
	            default:
					break;
	        }
	    }
	    
	    $jahr = explode("-", $parsed->anfang)[0];
	}
	
	$hasImages = !empty($bild);
	$hasVideos = !empty($yt);
	$hasAudios = !empty($audio);
	
	$imagesTag = 'style="display:'.($hasImages ? 'block' : 'none').'"';
	$videosTag = 'style="display:'.($hasVideos ? 'block' : 'none').'"';
	$audiosTag = 'style="display:'.($hasAudios ? 'block' : 'none').'"';
	
	$displaySwitchContainer = $hasImages || $hasAudios || $hasVideos;
	
	$anfang = null;
	if ($parsed->anfang != null) {
		$anfang = strtotime($parsed->anfang);
		$anfang = date("d. F Y");
	} 
	
	$ende = null;
	if ($parsed->ende != null) {
		$ende = strtotime($parsed->ende);
		$ende = date("d. F Y");
		$ende = $ende == $anfang ? null : $ende;
	}
	
	$text = preg_replace("/\\n/", '<br />', $parsed->text);
	echo($test);
?>

<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="css/custom.css" />
	    <link rel="stylesheet" type="text/css" href="src/css/lightbox.css" />
	    <script type="text/javascript" src="index.js"></script>
	</head>
	<body>
	    <div id="text">
	        <p>
		        <?= $text ?>
		    </p>
	        <?php if ($anfang != null): ?>
	        	<footer>
			    	<?= $anfang ?><?php
				    	if ($ende != null) {
					    	echo " bis $ende";
				    	}
			    	?>
		    	</footer>
	        <?php endif; ?>
	    </div>
	    
	    <?php if ($displaySwitchContainer): ?>
	    <div id="switchContainer">
		    <div id="header">
			    <div class="tab active" onclick="switchTab(BILDER, window.event)" <?= $imagesTag ?>>Bilder</div>
			    <div class="tab" onclick="switchTab(VIDEOS, window.event)" <?= $videosTag ?>>Videos</div>
			    <div class="tab" onclick="switchTab(AUDIO, window.event)" <?= $audiosTag ?>>Audio</div>
		    </div>
		    <div id="content">
	        	<div id="images" class="container active">
	        	    <?php foreach ($bild as $bildi): ?>
	        	        <a href="files/<?= $jahr."/bild/".$bildi->link; ?>" data-lightbox="<?= $jahr ?>" data-title="<?= $bildi->kurzbeschreibung; ?>">
	        	            <img src="files/<?= $jahr."/bild/".$bildi->link; ?>" alt="<?= $bildi->kurzbeschreibung; ?>" title="<?= $bildi->kurzbeschreibung; ?>" height="200" />
	        	        </a>
	        	    <?php endforeach; ?>
	        	</div>
	        	
	        	<div id="videos" class="container">
		        	<?php foreach ($yt as $ytu): ?>
					    <div class="video">
					        <iframe height="287" src="<?= $ytu->link ?>" width="320" allowfullscreen></iframe>
					    </div>
					<?php endforeach; ?>
	        	</div>
	        	
	        	<div id="audios" class="container">
		        	<?php foreach ($audio as $audi): ?>
					    <div class="uberschrift" style="margin-top: 10px">
					        <h2><?= $audi->kurzbeschreibung ?></h2>
					    </div>
					    <audio id="audio_with_controls"
					        controls
					        src="files/<?php echo $jahr."/audio/".$audi->link ?>"
					        type="audio/mp3">
					    </audio>
					<?php endforeach; ?>
	        	</div>
		    </div>
	    </div>
	    <?php endif; ?>
	    
	    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	    <script src="src/js/lightbox.js"></script>	
	</body>
</html>
