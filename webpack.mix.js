const mix = require("laravel-mix");

mix.sass("frontend/scss/style.scss", "assets/css");
mix.js("frontend/js/main.js", "assets/js");