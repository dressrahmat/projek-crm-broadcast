import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],


    theme: {
        extend: {
            fontFamily: {
                lora: ['Lora'],
            },
        },
    },

    plugins: [forms, typography, require("daisyui")],

    daisyui: {
        themes: [{
            mytheme: {
                "primary": "#219C90",
                "secondary": "#FF204E",
                "accent": "#FFC700",
                "neutral": "#191717",
                "base-100": "#EEEEEE",

                "--shadow": "0 4px 8px rgba(0, 0, 0, 0.2)", 

                "--rounded-box": "1rem", // border radius rounded-box utility class, used in card and other large boxes
                "--rounded-btn": "0.5rem", // border radius rounded-btn utility class, used in buttons and similar element
                "--rounded-badge": "1.9rem", // border radius rounded-badge utility class, used in badges and similar
                "--animation-btn": "0.25s", // duration of animation when you click on button
                "--animation-input": "0.2s", // duration of animation for inputs like checkbox, toggle, radio, etc
                "--btn-focus-scale": "0.95", // scale transform of button when you focus on it
                "--border-btn": "1px", // border width of buttons
                "--tab-border": "1px", // border width of tabs
                "--tab-radius": "0.5rem", // border radius of tabs
            },
        }, ],
    },

};
