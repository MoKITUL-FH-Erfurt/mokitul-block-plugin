# Mokitul Activtiy Plugin

This plugin is the mokitul activity plugin for moodle. It uses the core plugin to make calls to the Rest-API.

This plugin requires the core plugin. Please install it first.

## 📺 Demo

![Block-Plugin Demonstration](https://github.com/MoKITUL-FH-Erfurt/meta-mokitul/blob/main/assets/block_plugin_demo.gif)

## Development

1. Change directory into amd/build. Install all node modules if necessary. Transpile and minify javascript using 

    ```bash
    npx babel .\src\lib.js --out-file .\build\lib.js
    ```

    ```bash
    npx uglifyjs .\build\lib.js --module --compress --source-map "url='build/lib.min.js.map', includeSources" --output .\build\lib.min.js
    ```

2. Remove the unnecessary .\build\lib.js file and node modules.

3. Zip the project and upload it to moodle.

## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## License ##

2024 MoKITUL <mokitul@fh-erfurt.de>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.

## Trademarks and Disclaimer

This project is not affiliated with Moodle.
Moodle is a registered trademark. Our project merely develops and provides plugins for use within Moodle.
