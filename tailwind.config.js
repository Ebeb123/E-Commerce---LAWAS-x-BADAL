/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    'node_modules/preline/dist/*.js', 
  ],
safelist: [
  'bg-blue-500',
  'bg-yellow-500',
  'bg-green-500',
  'bg-green-700',
  'bg-red-500',
  'bg-red-700',
  'text-white',
  'shadow',
  'rounded'
],  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
    require('preline/plugin'),
  ],
  
}