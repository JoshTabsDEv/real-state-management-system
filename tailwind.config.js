import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
       
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/livewire/flux-pro/stubs/**/*.blade.php",
        "./vendor/livewire/flux/stubs/**/*.blade.php",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
      
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Geist'],
            },
            colors: {
                'secondary': {
                  200: '#your-color-here',
                  400: '#safsdffa',
                  500:'#sdfasf',
                  700: '#sfsadf'
                },
                primary: '#4CAF50',
              },
        },
    },

    plugins: [
		forms,
		require("daisyui")
	],
};
