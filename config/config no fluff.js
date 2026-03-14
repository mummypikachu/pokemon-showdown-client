var Config = Config || {};

// Default server configuration (auto-select WS or WSS)
var wsProtocol = (location.protocol === 'https:') ? 'wss' : 'ws';
var defaultPort = (location.protocol === 'https:') ? 443 : 8000;

Config.defaultserver = {
    id: 'showdown',
    host: 'sigmatic-showdown.tailb96039.ts.net',
    port: defaultPort,
    protocol: wsProtocol
};

// Routes (can keep minimal)
Config.routes = {
    client: 'sigmatic-showdown.tailb96039.ts.net',
    dex: 'dex.pokemonshowdown.com',
    replays: 'replay.pokemonshowdown.com',
    users: 'pokemonshowdown.com/users'
};