# Flat Blocks PRO: Watch for updates to scss source and compile to pro/css
#!/bin/sh
#sass --watch --no-source-map pro/src/scss:pro/css --style compressed --scss
#sass --watch --no-source-map scss:/assets/css /pro/src/scss:/pro/assets/css 
sass --watch --no-source-map ./scss:../assets/css ../pro/src/scss:../pro/assets/css
