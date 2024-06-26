/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Montserrat Alternates', 'ui-sans-serif', 'system-ui'],
            },

            backgroundImage: {
                'logo': "url('./../../public/assets/img/logo.jpeg')",
            }
        },
    },
    plugins: [],
}
