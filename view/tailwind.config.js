const colors = require( 'tailwindcss/colors' );
module.exports = {
    purge: {
        content: [ './src/**/*.{js,jsx,ts,tsx}', './index.html' ],
        options: {
            safelist: [ 'bg-blue-500', 'hover:bg-blue-400', 'bg-red-500', 'hover:bg-red-400', 'bg-yellow-500', 'hover:bg-yellow-400', 'bg-green-500', 'hover:bg-green-400', 'bg-gray-500', 'hover:bg-gray-400', 'bg-indigo-500', 'hover:bg-indigo-400', 'bg-purple-500', 'hover:bg-purple-400', 'bg-pink-500', 'hover:bg-pink-400', ],
        },
    },
    darMode: false,
    theme: {
        extend: {},
        colors: {
            ...colors,
            white: '#FFFFFF',
            transparent: 'transparent',
        }
    },
    variants: {
        extend: {},
    },
    plugins: [
        require( '@tailwindcss/forms' ),
    ],
}
