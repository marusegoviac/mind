/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/App.vue",
    "./src/pages/Signin.vue",
    "./src/pages/Login.vue",
    "./src/pages/Dashboard.vue",
    "./src/pages/Selfcare.vue",
    "./src/pages/Task.vue",
    "./src/pages/Notes.vue",
    "./src/pages/Creernote.vue",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
    fontFamily: {
      sans: [
        '"Inter var", sans-serif',
        {
          fontFeatureSettings: '"cv11", "ss01"',
          fontVariationSettings: '"opsz" 32'
        },
      ],
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'black': '#2F2F2F',
      'gray': '#4F4E4E',
      'medium-gray': '#848484',
      'medium-red': '#FF0000',
      'light-gray': '#DBDBDB',
      'creme': '#F4F0E7',
      'bubble-gum': '#EFD2D0',
      'blue': '#D3E1EE',
      'candy': '#E78886',
      'mint': '#C7D0C6',
      'sunset': '#D16535',
      'midnight': '#3B525F',

    },
    borderRadius: {
      'none': '0',
      'sm': '0.125rem',
      DEFAULT: '0.25rem',
      DEFAULT: '4px',
      'md': '1rem',
      'lg': '3rem',
      'full': '9999px',
      'large': '12px',
    },
  },
  plugins: [],
}

