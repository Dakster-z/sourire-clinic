import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                clinic: {
                    bg: '#FAFAFA',
                    subtle: '#F4F7F6',
                    card: '#FFFFFF',
                },
                teal: {
                    50: '#F0FDFA',
                    100: '#CCFBF1',
                    200: '#99F6E4',
                    300: '#5EEAD4',
                    400: '#2DD4BF',
                    500: '#14B8A6',
                    600: '#0D9488', // Target mint/teal #0D9488
                    700: '#0F766E',
                    800: '#115E59',
                    900: '#134E4A',
                },
                navy: {
                    50: '#F0F4F8',
                    100: '#D9E2EC',
                    200: '#BCCCDC',
                    300: '#9FB3C8',
                    400: '#627D98',
                    500: '#334E68',
                    600: '#243B53',
                    700: '#1E3A5F', // Target bleu doux #1E3A5F
                    800: '#152942',
                    900: '#0C1724',
                },
                coral: {
                    50: '#FFF5F4',
                    100: '#FFE6E2',
                    200: '#FFCCC4',
                    300: '#FFADA0',
                    400: '#FF8C7A', // Target accent corail léger #FF8C7A
                    500: '#F86B54',
                    600: '#E04830',
                }
            },
            fontFamily: {
                sans: ['Inter', 'Satoshi', '-apple-system', 'BlinkMacSystemFont', ...defaultTheme.fontFamily.sans],
                display: ['Satoshi', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'clinical': '0 4px 25px -4px rgba(13, 148, 136, 0.08), 0 2px 10px -2px rgba(30, 58, 95, 0.04)',
                'clinical-hover': '0 12px 35px -6px rgba(13, 148, 136, 0.16), 0 4px 15px -2px rgba(30, 58, 95, 0.08)',
                'glow-teal': '0 0 35px rgba(13, 148, 136, 0.28)',
                'glow-coral': '0 0 30px rgba(255, 140, 122, 0.3)',
            },
            animation: {
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'float': 'float 6s ease-in-out infinite',
                'shimmer': 'shimmer 2.5s infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                shimmer: {
                    '100%': { transform: 'translateX(100%)' },
                }
            }
        },
    },
    plugins: [],
};
