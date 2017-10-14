# MG BoilerPlate WordPress Plugin

This files gives the basic structure to start a new WordPress plugin from scratch.

## Instructions
1. Change the name of `mg-bp-wp-plugin.php` file to the name of the plugin you want to create.
2. Modify the comments in the `mg-bp-wp-plugin.php` file.
3. Set the constant `'MGBPWPPLUGIN_TEXTDOMAIN'`with your text domain.

## Custom Post Types
If you need to create **Custom Post Types** for your plugin you can find a template in the folder `inc/cpts/template.txt`. Copy, paste it in the same directory and change its extension from `.txt` to `.php`.
Just drop all your **Custom Post Type** files in that folder and they will be loaded automatically.

In the template file you will only need to change the values for theses variables:
1. `$cpt_name`: the name of the Custom Post Type
2. `$singular_name`: the singular name for the new entity
3. `$plural_name`: the singular name for the new entity
4. `$supports`: wich features will your Custom Post Type supports? 
*Default: array( 'title', 'editor', 'thumbnail' )*.
5. `$menu_icon`: Set the specific icon for the Custom Post Type => https://developer.wordpress.org/resource/dashicons/#products