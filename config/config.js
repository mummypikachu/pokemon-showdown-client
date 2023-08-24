var Config = Config || {};

/* version */ Config.version = "0";

Config.bannedHosts = ['cool.jit.su', 'pokeball-nixonserver.rhcloud.com'];

Config.whitelist = [
	'wikipedia.org',

	// The full list is maintained outside of this repository so changes to it
	// don't clutter the commit log. Feel free to copy our list for your own
	// purposes; it's here: https://play.pokemonshowdown.com/config/config.js

	// If you would like to change our list, simply message Zarel on Smogon or
	// Discord.
];

// `defaultserver` specifies the server to use when the domain name in the
// address bar is `Config.routes.client`.
Config.defaultserver = {
	id: 'showdown',
	host: 'sigmatic-showdown.win',
	port: 8000,
	httpport: 80,
	altport: 0,
	registered: false
};


Config.roomsFirstOpenScript = function () {
};


/*** Begin automatically generated configuration ***/
Config.version = "0.11.2 (01c1518e/6e393be7)";

Config.routes = {
	root: 'pokemonshowdown.com',
	client: 'sigmatic-showdown.win:8080',
	dex: 'sigmatic-dex.herokuapp.com/testclient.html',
	replays: 'replay.pokemonshowdown.com',
	users: 'pokemonshowdown.com/users',
};
/*** End automatically generated configuration ***/
