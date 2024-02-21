# Flat Blocks PRO: Package up the theme files, including PRO and plugin(s)

# First build all SCSS into CSS (PRO and standard CSS)
#sass --no-source-map src/scss:assets/css pro/src/scss:pro/assets/css
sass --no-source-map --style=compressed src/scss:assets/css pro/src/scss:pro/assets/css

# Then refresh and build the PRO plugin
cd pro/pro-plugin
#git fetch
#git merge origin/main
npm run build
cd ../..

# Then zip everything up
zip -r flat-blocks-pro.zip assets inc languages parts patterns styles templates *.* pro/assets pro/inc pro/patterns pro/pro-plugin/build pro/pro-plugin/*.php -x "*/\.DS_Store" "*/\.*" *.sh *.map assets/css/blocks assets/css/blocks/*