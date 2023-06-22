const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: null,
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                "e2-blue": {
                    100: "#EFFFFD",
                    300: "#E5E0FF",
                    500: "#8EA7E9",
                    base: "#1998CE",
                    700: "#0C81F6",
                    800: "#7286D3",
                    900: "#425E92",
                },
                "e2-black": "#050708",
                "e2-green": "#10A19D",
                "e2-yellow": "#F2BE22",
                "e2-orange": "#FFB84C",
                "e2-red": "#EA5455",
            },
            keyframes: {
                "slide-rtl": {
                    "0%": { transform: "translateX(100%)" },
                    "100%": { transform: "translateX(0%)" },
                },
            },
            animation: {
                "slide-rtl": "slide-rtl 500ms linear",
            },
        },
        fontFamily: {
            nunito: ["Nunito"],
            oxygen: ["Oxygen"],
            prompt: ["Prompt"],
            sans: ["Figtree", ...defaultTheme.fontFamily.sans],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("flowbite/plugin"),
        require("@tailwindcss/typography"),
    ],
};
