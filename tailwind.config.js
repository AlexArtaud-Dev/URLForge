import withMT from "@material-tailwind/html/utils/withMT";

/** @type {import('tailwindcss').Config} */
export default withMT({
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php'
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    '50': '#f9f4ff',
                    '100': '#f2e6ff',
                    '200': '#e6d2ff',
                    '300': '#d3aeff',
                    '400': '#b87bff',
                    '500': '#9d49ff',
                    '600': '#8825f8',
                    '700': '#7315db',
                    '800': '#6317b2',
                    '900': '#52148f',
                    '950': '#400080',
                },
            },
            flex: {
                '1': '1 1 0%',
                '2': '2 2 0%',
                '3': '3 3 0%',
                '4': '4 4 0%',
                '5': '5 5 0%',
                '6': '6 6 0%',
                '7': '7 7 0%',
                '8': '8 8 0%',
                '9': '9 9 0%',
                '10': '10 10 0%',
                '11': '11 11 0%',
                '12': '12 12 0%',
                '13': '13 13 0%',
                '14': '14 14 0%',
                '15': '15 15 0%',
            },
        },
    },
    plugins: [],
});

