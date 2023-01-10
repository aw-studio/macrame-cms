const plugin = require('tailwindcss/plugin');

module.exports = {
    content: ['./resources/**/*.{vue,js,ts}', './resources/views/**/*.blade.php'],
    theme: {
        container: {
            center: true,
            padding: {
                md: '40px',
                DEFAULT: '20px',
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: 'white',
            black: 'black',
            success: 'rgb(0 128 0 / <alpha-value>)',
            warning: 'rgb(255 255 0 / <alpha-value>)',
            danger: 'rgb(255 0 0 / <alpha-value>)',
            section: 'rgb(231 231 231 / <alpha-value>)',
            primary: {
                DEFAULT: 'rgb(24 150 255 / <alpha-value>)',
                200: 'rgb(153 208 255 / <alpha-value>)',
                500: 'rgb(24 150 255 / <alpha-value>)',
            },
            secondary: {
                DEFAULT: 'rgb(168 168 168 / <alpha-value>)',
                100: 'rgb(231 231 231 / <alpha-value>)',
                500: 'rgb(168 168 168 / <alpha-value>)',
                900: 'rgb(39 39 39 / <alpha-value>)',
            },
            gray: {
                DEFAULT: 'rgb(168 168 168 / <alpha-value>)',
                100: 'rgb(231 231 231 / <alpha-value>)',
                500: 'rgb(168 168 168 / <alpha-value>)',
                900: 'rgb(39 39 39 / <alpha-value>)',
            },
        },
        fontSize: {
            xs: ['14px', '20px'],
            sm: ['15px', '25px'],
            base: ['16px', '22px'],
            lg: ['20px', '27px'],
            xl: ['24px', '33px'],
            '2xl': ['32px', '38px'],
        },
        extend: {},
    },
    plugins: [
        plugin(function ({ addBase, theme }) {
            addBase({
                body: {
                    '@apply text-secondary-900 text-base': {},
                },
                'h1, h2, h3, h4, p': {
                    maxWidth: '56rem',
                    '@apply mb-8': {},
                },
                'h1, h2, h3, h4': {
                    paddingRight: '10%',
                },
                'p + h1, p + h2, p + h3, p + h4': {
                    '@apply pt-8': {},
                },
                'h1, .h1': {
                    '@apply text-2xl font-semibold': {},
                },
                'h2, .h2': {
                    '@apply text-xl font-semibold': {},
                },
                'h3, .h3': {
                    '@apply text-lg font-semibold': {},
                },
                'h4, .h4': {
                    '@apply text-base font-semibold': {},
                },
                p: {
                    '@apply text-base leading-7 font-light': {},
                },
                '.prose a': {
                    '@apply text-base font-normal max-w-[700px] text-primary hover:text-primary underline':
                        {},
                },
                '.prose ul, .prose ol': {
                    '@apply text-base max-w-[700px] list-outside flex mb-8 ml-4 flex-col gap-4':
                        {},
                },
                '.prose ul': {
                    '@apply list-disc': {},
                },
                '.prose ol': {
                    '@apply list-decimal': {},
                },
                '.prose li': {
                    '@apply relative': {},
                },
                '.prose ul li::marker, .prose ol li::marker': {
                    '@apply absolute pr-4': {},
                },
                '.prose ul>li>p, .prose ol>li>p': {
                    '@apply inline mb-0': {},
                },
            });
        }),
        function ({ addComponents }) {
            addComponents({
                '.container': {
                    maxWidth: '100%',
                    '@screen sm': {
                        maxWidth: '100%',
                    },
                    '@screen md': {
                        maxWidth: '100%',
                    },
                    '@screen lg': {
                        maxWidth: '100%',
                    },
                    '@screen xl': {
                        maxWidth: '1260px',
                    },
                },
            });
        },
    ],
};
