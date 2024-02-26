# Flat Blocks PRO: Package up the theme files, including PRO and plugin(s)

# First build all SCSS into CSS (PRO and standard CSS)
#sass --no-source-map src/scss:assets/css pro/src/scss:pro/assets/css
sass --no-source-map --style=compressed src/scss:assets/css pro/src/scss:pro/assets/css

# Then refresh and build the PRO plugin
cd pro/plugins/xs-animation
npm run build
cd ../../..

# Then zip everything up except certain files
zip -r flat-blocks-pro.zip assets inc languages parts patterns styles templates *.* pro/assets pro/inc pro/patterns pro/plugins/xs-animation/build pro/plugins/xs-animation/*.php -x "*/\.DS_Store" "*/\.*" *.sh *.map assets/css/blocks assets/css/blocks/*