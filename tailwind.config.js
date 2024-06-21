/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public_html/**/*.{php,html,js}",
    "./src/Templates/*.{php,html,js}",
  ],
  theme: {
    extend: {
      gridTemplateRows: {
        "[auto,auto,1fr]": "auto auto 1fr",
      },
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio")],
};
