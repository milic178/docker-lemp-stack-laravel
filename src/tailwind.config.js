/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
    extend: {
        colors : {
            "customColorBlue": "rgb(50,138,241)"
        }
    },
  },
  plugins: [],
}

