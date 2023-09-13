<?php

  $freelancer_plus_color_scheme_css = '';

  //---------------------------------Logo-Max-height--------- 
  $freelancer_plus_logo_width = get_theme_mod('freelancer_plus_logo_width');

  if($freelancer_plus_logo_width != false){

    $freelancer_plus_color_scheme_css .='.logo .custom-logo-link img{';

      $freelancer_plus_color_scheme_css .='width: '.esc_html($freelancer_plus_logo_width).'px;';

    $freelancer_plus_color_scheme_css .='}';
  }
