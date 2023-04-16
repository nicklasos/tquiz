/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                'nunito': ['Nunito', 'ui-sans-serif', 'serif'],
            },
            colors: {
                main: '#621C99',
                header: '#591A8A',
                'join-button': '#7E3AD4',
                'active-menu': '#621C99',
            },
        },
    },
    plugins: [],
}
