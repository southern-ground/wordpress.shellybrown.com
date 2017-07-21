<?php
function newfashion_fnc_import_remote_demos() { 
   return array(
      'newfashion' => array( 'name' => 'newfashion',  'source'=> 'http://wpsampledemo.com/newfashion/newfashion.zip' ),
   );
}

add_filter( 'pbrthemer_import_remote_demos', 'newfashion_fnc_import_remote_demos' );



function newfashion_fnc_import_theme() {
   return 'newfashion';
}
add_filter( 'pbrthemer_import_theme', 'newfashion_fnc_import_theme' );

function newfashion_fnc_import_demos() {
   $folderes = glob( WPO_THEME_DIR.'/inc/import/*', GLOB_ONLYDIR ); 

   $output = array(); 

   foreach( $folderes as $folder ){
      $output[basename( $folder )] = basename( $folder );
   }
   
   return $output;
}
add_filter( 'pbrthemer_import_demos', 'newfashion_fnc_import_demos' );

function newfashion_fnc_import_types() {
   return array(
         'all' => 'All',
         'content' => 'Content',
         'widgets' => 'Widgets',
         'page_options' => 'Theme + Page Options',
         'menus' => 'Menus',
         'rev_slider' => 'Revolution Slider',
         'vc_templates' => 'VC Templates'
      );
}
add_filter( 'pbrthemer_import_types', 'newfashion_fnc_import_types' );
