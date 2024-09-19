 <?php

    $preventive_maintenance_scroll_position = get_theme_mod( 'preventive_maintenance_scroll_top_position','Right');
    if($preventive_maintenance_scroll_position == 'Right'){
        $preventive_maintenance_tp_theme_css .='#return-to-top{';
            $preventive_maintenance_tp_theme_css .='right: 20px;';
        $preventive_maintenance_tp_theme_css .='}';
    }else if($preventive_maintenance_scroll_position == 'Left'){
        $preventive_maintenance_tp_theme_css .='#return-to-top{';
            $preventive_maintenance_tp_theme_css .='left: 20px;';
        $preventive_maintenance_tp_theme_css .='}';
    }else if($preventive_maintenance_scroll_position == 'Center'){
        $preventive_maintenance_tp_theme_css .='#return-to-top{';
            $preventive_maintenance_tp_theme_css .='right: 50%;left: 50%;';
        $preventive_maintenance_tp_theme_css .='}';
    }

		// related post
	$preventive_maintenance_related_post_mob = get_theme_mod('preventive_maintenance_related_post_mob', true);
	$preventive_maintenance_related_post = get_theme_mod('preventive_maintenance_remove_related_post', true);
	$preventive_maintenance_tp_theme_css .= '.related-post-block {';
	if ($preventive_maintenance_related_post == false) {
	    $preventive_maintenance_tp_theme_css .= 'display: none;';
	}
	$preventive_maintenance_tp_theme_css .= '}';
	$preventive_maintenance_tp_theme_css .= '@media screen and (max-width: 575px) {';
	if ($preventive_maintenance_related_post == false || $preventive_maintenance_related_post_mob == false) {
	    $preventive_maintenance_tp_theme_css .= '.related-post-block { display: none; }';
	}
	$preventive_maintenance_tp_theme_css .= '}';

	// slider btn
	$preventive_maintenance_slider_button_mob = get_theme_mod('preventive_maintenance_slider_button_mob', true);
	$preventive_maintenance_slider_button = get_theme_mod('preventive_maintenance_slider_button', true);
	$preventive_maintenance_tp_theme_css .= '#slider .more-btn {';
	if ($preventive_maintenance_slider_button == false) {
	    $preventive_maintenance_tp_theme_css .= 'display: none;';
	}
	$preventive_maintenance_tp_theme_css .= '}';
	$preventive_maintenance_tp_theme_css .= '@media screen and (max-width: 575px) {';
	if ($preventive_maintenance_slider_button == false || $preventive_maintenance_slider_button_mob == false) {
	    $preventive_maintenance_tp_theme_css .= '#slider .more-btn { display: none; }';
	}
	$preventive_maintenance_tp_theme_css .= '}';

	//return to header mobile				
	$preventive_maintenance_return_to_header_mob = get_theme_mod('preventive_maintenance_return_to_header_mob', true);
	$preventive_maintenance_return_to_header = get_theme_mod('preventive_maintenance_return_to_header', true);
	$preventive_maintenance_tp_theme_css .= '.return-to-header{';
	if ($preventive_maintenance_return_to_header == false) {
	    $preventive_maintenance_tp_theme_css .= 'display: none;';
	}
	$preventive_maintenance_tp_theme_css .= '}';
	$preventive_maintenance_tp_theme_css .= '@media screen and (max-width: 575px) {';
	if ($preventive_maintenance_return_to_header == false || $preventive_maintenance_return_to_header_mob == false) {
	    $preventive_maintenance_tp_theme_css .= '.return-to-header{ display: none; }';
	}
	$preventive_maintenance_tp_theme_css .= '}';

	$preventive_maintenance_footer_widget_image = get_theme_mod('preventive_maintenance_footer_widget_image');
	if($preventive_maintenance_footer_widget_image != false){
		$preventive_maintenance_tp_theme_css .='#footer{';
			$preventive_maintenance_tp_theme_css .='background: url('.esc_attr($preventive_maintenance_footer_widget_image).');';
		$preventive_maintenance_tp_theme_css .='}';
	}

	//Social icon Font size
$preventive_maintenance_social_icon_fontsize = get_theme_mod('preventive_maintenance_social_icon_fontsize','20');
$preventive_maintenance_tp_theme_css .='.social-media a i{';
$preventive_maintenance_tp_theme_css .='font-size: '.esc_attr($preventive_maintenance_social_icon_fontsize).'px;';
$preventive_maintenance_tp_theme_css .='}';

// site title and tagline font size option
$preventive_maintenance_site_title_font_size = get_theme_mod('preventive_maintenance_site_title_font_size', 30); {
$preventive_maintenance_tp_theme_css .='.logo h1 a, .logo p a{';
$preventive_maintenance_tp_theme_css .='font-size: '.esc_attr($preventive_maintenance_site_title_font_size).'px !important;';
	$preventive_maintenance_tp_theme_css .='}';
}

$preventive_maintenance_site_tagline_font_size = get_theme_mod('preventive_maintenance_site_tagline_font_size', 15);{
$preventive_maintenance_tp_theme_css .='.logo p{';
$preventive_maintenance_tp_theme_css .='font-size: '.esc_attr($preventive_maintenance_site_tagline_font_size).'px;';
	$preventive_maintenance_tp_theme_css .='}';
}

	$preventive_maintenance_related_product = get_theme_mod('preventive_maintenance_related_product',true);
		if($preventive_maintenance_related_product == false){
			$preventive_maintenance_tp_theme_css .='.related.products{';
				$preventive_maintenance_tp_theme_css .='display: none;';
			$preventive_maintenance_tp_theme_css .='}';
		}


	//======================= MENU TYPOGRAPHY ===================== //


$preventive_maintenance_menu_font_size = get_theme_mod('preventive_maintenance_menu_font_size', 15);{
$preventive_maintenance_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
$preventive_maintenance_tp_theme_css .='font-size: '.esc_attr($preventive_maintenance_menu_font_size).'px;';
	$preventive_maintenance_tp_theme_css .='}';
}

$preventive_maintenance_menu_text_tranform = get_theme_mod( 'preventive_maintenance_menu_text_tranform','Uppercase');
    if($preventive_maintenance_menu_text_tranform == 'Uppercase'){
		$preventive_maintenance_tp_theme_css .='.main-navigation a {';
			$preventive_maintenance_tp_theme_css .='text-transform: uppercase;';
		$preventive_maintenance_tp_theme_css .='}';
	}else if($preventive_maintenance_menu_text_tranform == 'Lowercase'){
		$preventive_maintenance_tp_theme_css .='.main-navigation a {';
			$preventive_maintenance_tp_theme_css .='text-transform: lowercase;';
		$preventive_maintenance_tp_theme_css .='}';
	}
	else if($preventive_maintenance_menu_text_tranform == 'Capitalize'){
		$preventive_maintenance_tp_theme_css .='.main-navigation a {';
			$preventive_maintenance_tp_theme_css .='text-transform: capitalize;';
		$preventive_maintenance_tp_theme_css .='}';
	}

//======================= slider Content layout ===================== //

$preventive_maintenance_slider_content_layout = get_theme_mod('preventive_maintenance_slider_content_layout', 'CENTER-ALIGN'); 
$preventive_maintenance_tp_theme_css .= '#slider .carousel-caption{';
switch ($preventive_maintenance_slider_content_layout) {
    case 'LEFT-ALIGN':
        $preventive_maintenance_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $preventive_maintenance_tp_theme_css .= 'text-align:center; left: 15%; right: 15%';
        break;
    case 'RIGHT-ALIGN':
        $preventive_maintenance_tp_theme_css .= 'text-align:right; left: 35%; right: 15%';
        break;
    default:
        $preventive_maintenance_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
}
$preventive_maintenance_tp_theme_css .= '}';

//sale position
$preventive_maintenance_scroll_position = get_theme_mod( 'preventive_maintenance_sale_tag_position','right');
if($preventive_maintenance_scroll_position == 'right'){
$preventive_maintenance_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $preventive_maintenance_tp_theme_css .='right: 25px !important;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_scroll_position == 'left'){
$preventive_maintenance_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $preventive_maintenance_tp_theme_css .='left: 25px !important; right: auto !important;';
$preventive_maintenance_tp_theme_css .='}';
}

//Font Weight
$preventive_maintenance_menu_font_weight = get_theme_mod( 'preventive_maintenance_menu_font_weight','500');
if($preventive_maintenance_menu_font_weight == '100'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 100;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '200'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 200;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '300'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 300;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '400'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 400;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '500'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 500;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '600'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 600;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '700'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 700;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '800'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 800;';
$preventive_maintenance_tp_theme_css .='}';
}else if($preventive_maintenance_menu_font_weight == '900'){
$preventive_maintenance_tp_theme_css .='.main-navigation a{';
    $preventive_maintenance_tp_theme_css .='font-weight: 900;';
$preventive_maintenance_tp_theme_css .='}';
}


// header
$preventive_maintenance_slider_arrows = get_theme_mod( 'preventive_maintenance_slider_arrows');
if($preventive_maintenance_slider_arrows != true){
    $preventive_maintenance_tp_theme_css .='.page-template-front-page .menubar{';
        $preventive_maintenance_tp_theme_css .='position:static;';
    $preventive_maintenance_tp_theme_css .='}';
}