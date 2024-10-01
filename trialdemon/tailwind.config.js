module.exports = {
  content: [
    './public/*',
    './public/blog/*'
  ],
  theme: {
    extend: {
      colors: {
        "bookmark-purple": "#0856ec",
        "bookmark-purple2": "#0e2de3",
        "purple-highlight": "#001B9D",
        "error-red": "#ff5959",
        "gradient-1": "#00A0FD",
        "gradient-2": "#00C694",
        "bookmark-red": "#FA5959",
        "bookmark-blue": "#242A45",
        "bookmark-grey": "#6B7280",
        "bookmark-white": "#f7f7f7",
        "announcement": "#181c24",
        "newBlue": "#1e3662"
      },
    },
    fontFamily: {
      Inter: ["Inter, sans-serif"],
      Roboto: ['Roboto', 'sans-serif'],
      Unica: ['Unica-One', 'sans-serif'],
      Mono: ['Roboto-Mono', 'sans-serif'],
      Montserrat: ['Montserrat', 'sans-serif'],
      Nunito: ['Nunito-Sans', 'sans-serif'],

    },
    container: {
      center: true,
      padding: "1rem",
      screens: {
        lg: "1124px",
        xl: "1124px",
        "2xl": "1124px",
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
