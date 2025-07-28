const mix = require("laravel-mix");

mix.sass("frontend/scss/style.scss", "assets/css");
mix.ts("frontend/js/main.ts", "assets/js");
mix.disableNotifications();
