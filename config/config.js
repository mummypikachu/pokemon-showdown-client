var Config = Config || {};

// Default server configuration

Config.defaultserver = {
    id: 'showdown',
    host: 'sigmatic-showdown.tailb96039.ts.net', // your Tailscale hostname
	port: 8000,
	httpport: 8000,
	altport: 80,
};

// Minimal routes for frontend
Config.routes = {
    client: 'sigmatic-showdown.tailb96039.ts.net',
    dex: 'dex.pokemonshowdown.com',
    replays: 'replay.pokemonshowdown.com',
    users: 'pokemonshowdown.com/users'
};/*** Begin automatically generated configuration ***/
Config.version = "0.11.2 (8905f36e)";

Config.routes = {
	root: 'pokemonshowdown.com',
	client: 'sigmatic-showdown.tailb96039.ts.net',
	dex: 'sigmatic-dex.herokuapp.com/testclient.html',
	replays: 'replay.pokemonshowdown.com',
	users: 'pokemonshowdown.com/users',
};
/*** End automatically generated configuration ***/