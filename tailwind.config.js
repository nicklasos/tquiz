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
                background: '#694cbf',
            },
        },
    },
    plugins: [],
}
