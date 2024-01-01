/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/**/*.php",
    ],
    theme: {
        fontFamily: {
            sans: ["'Figtree'", ...defaultTheme.fontFamily.sans],
        },

        extend: {},
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
