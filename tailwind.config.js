/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/**/*.js",],
  theme: {
    fontFamily: {
      primary: ["Jost", "sans-serif"],
      secondary: ["Satoshi", "sans-serif"],
    },
    extend: {
      screens: {
        sm: "480px",
        md: "768px",
        lg: "992px",
        xl: "1280px",
        "2xl": "1440px",
        "3xl": "1920px",
      },
      colors: {
        primary: {
          black: "#151515",
          white: "#F5F5F5",
          grey: "#C8C8C8",
          yellow: "#EEBB0C",
          orange: "#EF6818",
        },
      }
    },
  },
  plugins: [],
}

