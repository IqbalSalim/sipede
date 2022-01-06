const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                body: ['Poppins']
            },
            animation: ['motion-reduce', 'motion-safe'],
            transitionProperty: {
                'width': 'width',
                'w-min': 'w-min',
            },
            spacing: {
                '18': '4.5rem'
            },
            colors: {

                primary: '#3b82f6',
                secondary: '#14B8A6',
                warning: '#F59E0B',
                success: '#10b981',
                default: '#6B7280',
                danger: '#EF4444',
            },
            outline: {
                primary: '1px solid #3b82f6',
                secondary: '1px solid #EC4899',
                warning: '1px solid #ef4444',
                success: '1px solid #10b981',
            },
            backgroundImage: {
                'hero-pattern': "url('/images/undraw_Email_capture_re_b5ys.svg')",
                'footer-texture': "url('/images/undraw_In_sync_re_jlqd.svg')",
            }

        },
        backgroundSize: {
            'auto': 'auto',
            'cover': 'cover',
            'contain': 'contain',
            '50%': '50%',
            '16': '4rem',
        }

    },
    variants: {
        extend: {
            ringWidth: ['hover', 'active'],
        },
        zIndex: ['hover', 'active'],
        display: ['responsive', 'group-hover', 'group-focus'],

    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
