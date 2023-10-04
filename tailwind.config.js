import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    light: '#4FD1C5',
                    DEFAULT: '#3B82F6',
                    dark: '#9333EA',
                },
                secondary: {
                    light: '#FCD34D',
                    DEFAULT: '#EC4899',
                    dark: '#7C3AED',
                },
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'], // Example font
            },
            spacing: {
                '72': '18rem',
                '84': '21rem',
                '96': '24rem',
            }
        },
    },
    daisyui: {
        styled: true,
        themes: ["light", "dark", "cyberpunk", "retro",],
        base: true,
        utils: true,
        logs: true,
        rtl: false,
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui')
    ],
};
