/** @type {import('tailwindcss').Config} */

const plugin = require('tailwindcss/plugin');

module.exports = {
    content: ['./resources/**/*.vue', './resources/views/**/*.blade.php'],
    theme: {
        borderRadius: {
            full: '9999px',
            lg: '19px', // TODO:
            md: '15px',
            sm: '11px',
            DEFAULT: '8px',
            xs: '3px',
        },
        colors: {
            transparent: 'transparent',
            white: 'white',
            black: 'black',
            gray: {
                50: '#F6F7FA',
                100: '#F8F9FB',
                200: '#E5E7EF',
                300: '#D6D8E2',
                400: '#e1e3eb',
                500: '#AFAEB9',
                700: '#3c3c47',
                800: '#1f1f2c',
                900: '#090914',
                DEFAULT: '#AFAEB9',
            },
            green: {
                500: '#4E9060',
                signal: '#4BDB9C',
                DEFAULT: '#4BDB9C',
            },
            gradient: {
                'red-300': '#FF8A93',
                'red-500': '#FF7882',
                'red-700': '#FF5E6A',
                'orange-300': '#FFB770',
                'orange-500': '#FEAD5E',
                'orange-700': '#FF9C3D',
            },
            red: {
                100: '#FFDADD',
                500: '#FF7782',
                signal: '#F74B6D',
                DEFAULT: '#FF7782',
            },
            yellow: {
                signal: '#F8DB60',
                DEFAULT: '#F8DB60',
            },
            indigo: {
                500: '#031266',
                900: '#120F30',
                DEFAULT: '#031266',
            },
            orange: {
                100: '#FFEEDF',
                300: '#FFD4AA',
                500: '#FEAD5E',
                700: '#FF9126',
                DEFAULT: '#FEAD5E',
            },
            purple: {
                500: '#9F46E4',
                DEFAULT: '#9F46E4',
            },
            pink: {
                500: '#FE4CA6',
                DEFAULT: '#FE4CA6',
            },
            blue: {
                500: '#0064FB',
                DEFAULT: '#0064FB',
            },
            lightblue: {
                500: '#48DAFD',
                DEFAULT: '#48DAFD',
            },
            turkise: {
                500: '#16DB7E',
                DEFAULT: '#16DB7E',
            },
            grasgreen: {
                500: '#00B83A',
                DEFAULT: '#00B83A',
            },
            lightorange: {
                500: '#FEA800',
                DEFAULT: '#FEA800',
            },
            darkorange: {
                500: '#FF7512',
                DEFAULT: '#FF7512',
            },
        },
        fontFamily: {
            sans: ['DM Sans', 'sans-serif'],
            code: ['Source Code Pro', 'DM Sans', 'sans-serif'],
        },
        fontSize: {
            xs: ['9px', '15px'],
            sm: ['11px', '17px'],
            base: ['14px', '24px'],
            lg: ['16px', '24px'],
            xl: ['20px', '30px'],
            '2xl': ['28px', '38px'],
        },
        boxShadow: {
            DEFAULT: '0px 0px 19px 0px rgba(0,0,0,0.08)',
            primary: '0px 6px 9px -4px rgba(255,116,76,0.6)',
            sm: '0px 2px 4px 0px rgba(0,0,0,0.05)',
        },
        screens: {
            sm: '640px',
            // => @media (min-width: 640px) { ... }

            md: '768px',
            // => @media (min-width: 768px) { ... }

            lg: '1024px',
            // => @media (min-width: 1024px) { ... }

            xl: '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1730px',
            // => @media (min-width: 1730px) { ... }
        },
        extend: {
            gridTemplateColumns: {
                app: '300px 1fr',
            },
        },
    },
    plugins: [
        plugin(function ({ addBase }) {
            addBase({
                'h1, .h1': {
                    '@apply text-2xl font-medium md:text-2xl': {},
                },
                'h2, .h2': {
                    '@apply text-xl md:text-xl font-medium': {},
                },
                'h3, .h3': {
                    '@apply text-base lg:text-lg font-medium': {},
                },
                'h4, .h4': {
                    '@apply text-base font-medium': {},
                },
            });
        }),
    ],
};
