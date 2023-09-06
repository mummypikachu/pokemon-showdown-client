<?php
$config = array();
// Define your configuration directly in the script
$psconfig = array(
    'routes' => array(
        'client' => 'sigmatic-showdown.win:8080',
        // Other route configurations
    ),
    // Other configuration settings
);

// Rest of your script



$host = strtolower(strval(@$_REQUEST['host']));
if (preg_match('/^([a-z0-9-_\.]*?)\.psim\.us$/', $host, $m)) {
    $config['host'] = $m[1];
    if ($config['host'] === 'logs') {
        die; // not authorized
    }
    if ($config['host'] === 'sim') {
        die; // not authorized
    }
}


$protocol = @$_REQUEST['protocol'] ?? 'http:';
$portType = ($protocol === 'http:' ? 'port' : 'httpport');
if ($protocol === 'http:') $config['http'] = true;


if (@$config['redirect']) {
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<script>
parent.location.replace(<?= json_encode($config['redirect']) ?>);
</script>
<?php
	die();
}

// For Internet Explorer.
// See http://www.p3pwriter.com/LRN_111.asp
// See also http://stackoverflow.com/questions/389456/cookie-blocked-not-saved-in-iframe-in-internet-explorer
//
// The privacy fields specified here should be accurate.
header('P3P: CP="NOI CUR ADM DEV COM NAV STA OUR IND"');
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<script src="/js/lib/jquery-2.1.4.min.js"></script>
<body>
<script>

var configHost = <?php echo json_encode($config['host']) ?>;
var config = <?php echo json_encode(json_encode($config)) ?>;
var yourOrigin = <?php echo json_encode($protocol . '//' . $host) ?>;
var myOrigin = 'http://<?php echo $psconfig['routes']['client'] ?>';

function postReply (message) {
	if (window.parent.postMessage === postReply) return;
	return window.parent.postMessage(message, yourOrigin);
}
function messageHandler(e) {
	if (e.origin !== yourOrigin) return;
	var data = e.data;

	// data's first char:
	// T: store teams
	// P: store prefs
	// R: GET request
	// S: POST request

	switch (data.charAt(0)) {
	case 'T':
		try {
			localStorage.setItem('showdown_teams', data.substr(1));
		} catch (e) {}
		break;
	case 'P':
		try {
			localStorage.setItem('showdown_prefs', data.substr(1));
		} catch (e) {}
		break;
	case 'R':
	case 'S':
		var rq = JSON.parse(data.substr(1));
		$.ajax({
			type: (data.charAt(0) === 'R' ? 'GET' : 'POST'),
			url: rq[0],
			data: rq[1],
			success: function(ajaxdata) {
				postReply('r' + JSON.stringify([rq[2], ajaxdata]));
			},
			dataType: rq[3]
		});
		break;
	}
}

window.addEventListener('message', messageHandler);
if (configHost !== 'showdown') postReply('c' + config);
var storageAvailable = false;
try {
	var testVal = '' + Date.now();
	localStorage.setItem('showdown_allow3p', testVal);
	if (localStorage.getItem('showdown_allow3p') === testVal) {
		postReply('a1');
		postReply('p' + localStorage.getItem('showdown_prefs'));
		postReply('t' + localStorage.getItem('showdown_teams'));
		storageAvailable = true;
	}
} catch (err) {}

if (!storageAvailable) {
	postReply('a0');
}

if (location.protocol + '//' + location.hostname !== myOrigin) {
	// This happens sometimes, but we'll pretend it doesn't
}

</script>
