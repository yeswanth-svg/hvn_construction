import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class", // Ensure 'class' is used
    content: [
        "./resources/**/*.blade.php", // Add your Blade templates
        "./resources/**/*.js", // Add your JavaScript files
        "./resources/**/*.vue", // If using Vue.js
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
