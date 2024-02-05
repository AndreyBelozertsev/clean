/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      xs: "375px",
      sm: "468px",
      md: "540px",
      lg: "720px",
      xl: "960px",
      "2xl": "1140px",
      "3xl": "1200px",
      "4xl": "1360px",
      "5xl": "1550px",
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "20px",
        xs: "16px",
        sm: "16px",
      },
    },
    fontFamily: {
      "inter-800": "Inter-ExtraBold",
      "inter-700": "Inter-Bold",
      "inter-600": "Inter-SemiBold",
      "inter-500": "Inter-Medium",
      "inter-400": "Inter-Regular",
      "inter-300": "Inter-Light",
    },
    extend: {
      colors: {
        "accent-red": "#D64751",
        "accent-blue": "#002283",
        "accent-green": "#02880B",
        "premium": "#D6DBFF",
        "other-blue": "#21359E",
        "other-green": "#D3D0D0",
        "popup-bor": "rgba(18, 19, 22, 0.15)",
        "step-color": "#9F9FA0",
        "step-txt": "#737376",
        "default": "#343330",
        "custom-gray ": "#F1F1F2",
        "custom-gray-text": "#78828E",
        "premium-hover": "#B0BAFF",
        "default-hover": "#DDE1FF",
        "accent-red-hover": "#AC353D",
        "default-active": "#B0B9FF",
      },
      borderRadius: {
        huge: "52px",
        standart: "30px",
      },
      boxShadow: {
        popup:
          "0px 8px 12px 0px rgba(18, 19, 22, 0.15), 0px 0px 1px 0px rgba(18, 19, 22, 0.31)",
      },
      gridTemplateColumns: {
        'thumb-block': '200px 1fr',
        'volunteer-block': '298px 1fr',
      }
    },
  },
  plugins: [],
}
