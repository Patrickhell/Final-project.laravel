/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
      ],
      theme: {
        extend: {
            colors: {
                'bd_primary-color': '#00c3a5'
            }
        },
      },
      plugins: [
          require('flowbite/plugin')
      ],
}

