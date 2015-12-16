<!DOCTYPE html>
<!-- Gush | GPLv3 | http://git.io/gush -->
<html>
	<head>
		<title>Gush 1.0</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/normalize.css" rel="stylesheet" type="text/css">
		<link href="css/gush.css" rel="stylesheet" type="text/css">
		<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css">
	</head>
	<body class="load">
		<div id="header">
			<h1>Gush</h1>
			<div id="search"><input type="password" id="query" name="query" placeholder="Enter password..."></div>
			<div id="status"></div>
		</div>
		<table id="results"></table>
		<script type="text/mustache" id="infoRow">
		<div class="info_content">
			<ul class="tab-names">
				<li id="info-tab" class="selected"><a href="javascript:void(0);">Details</a></li>
				<li id="file-tab"><a href="javascript:void(0);">File Listing</a></li>
				<li id="comments-tab"><a href="javascript:void(0);">Comments{{#commentsCount}} ({{commentsCount}}){{/commentsCount}}</a></li>
			</ul>
			<div id="info-page" class="tab-contents tab-shown">{{{infoPage}}}</div>
			<div id="file-page" class="tab-contents"></div>
			<div id="comments-page" class="tab-contents"></div>
		</div>
		</script>
		<script type="text/mustache" id="infoPageContent">
			<div class="title">
				<h2>{{torrentName}}</h2>
				<a href="{{magnetLink}}" class="magnet">Download</a>
			</div>
			<p><strong>Trackers{{#loadingTrackers}} (Loading...){{/loadingTrackers}}:</strong></p>
			<ul class="trackers">{{#trackers}}<li>{{trackerName}}</li>{{/trackers}}</ul>
		</script>
		<script type="text/mustache" id="filePageContent">
			<table><thead><tr><th>File</th><th>Size</th></tr></thead><tbody>
			{{#files}}<tr><td>{{filename}}</td><td>{{size}}</td>{{/files}}</tbody></table>
		</script>
		<script type="text/mustache" id="commentsPageContent">
			<p>Long comments are trimmed, click to show the entire comment.</p>
			{{#comments}}<div{{#commentRemainder}} class="expanded"{{/commentRemainder}}>{{commentStart}}{{#commentRemainder}}<span>{{commentRemainder}}</span>{{/commentRemainder}}</div>{{/comments}}
		</script>
		<script>
		window.gushSettings = {
			dataEndpoint: 'data.php',
			numberEngines: <?php 
				define('APP_LOCATION', dirname(getcwd()));
				require_once APP_LOCATION . '/includes/Config.php';
				GushConfig::Load(include APP_LOCATION . '/config.php');
				$config = GushConfig::getData();
				echo count($config['engines'])."\n";
			?>
		};
		</script>
		<script type="text/javascript" src="js/lib/jquery.min.js"></script>
		<script type="text/javascript" src="js/lib/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/lib/moment.min.js"></script>
		<script type="text/javascript" src="js/lib/mustache.min.js"></script>
		<script type="text/javascript" src="js/gush.js"></script>
	</body>
</html>