<?php

$preventive_maintenance_tp_theme_css = '';

//theme color
$preventive_maintenance_tp_color_option = get_theme_mod('preventive_maintenance_tp_color_option');

if($preventive_maintenance_tp_color_option != false){
$preventive_maintenance_tp_theme_css .=' .top-header, .site-info, #about .media {';
$preventive_maintenance_tp_theme_css .='background-color: '.esc_attr($preventive_maintenance_tp_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_color_option != false){
$preventive_maintenance_tp_theme_css .='#about i.fas.fa-check{';
$preventive_maintenance_tp_theme_css .='color: '.esc_attr($preventive_maintenance_tp_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}

if($preventive_maintenance_tp_color_option != false){
$preventive_maintenance_tp_theme_css .='@media screen and (max-width:1000px){';
$preventive_maintenance_tp_theme_css .='.sidenav{';
	$preventive_maintenance_tp_theme_css .='background-color: '.esc_attr($preventive_maintenance_tp_color_option).';';
$preventive_maintenance_tp_theme_css .='} }';
}

//second-color
$preventive_maintenance_tp_second_color_option = get_theme_mod('preventive_maintenance_tp_second_color_option');

if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='.call i, .email i, .location i, .main-navigation li.menu-item-has-children:hover > ul, #comments input[type="submit"] , span.meta-nav, .next.page-numbers,.page-numbers , #return-to-top:hover,.woocommerce ul.products li.product .onsale, .woocommerce a.button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce a.button, .woocommerce a.button,  .woocommerce a.button.alt,  #theme-sidebar button[type="submit"], #footer button[type="submit"], .more-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover , #about div.exp-no, .menubar .phone-icon i ,.prev.page-numbers,.error-404 [type="submit"] ,.woocommerce span.onsale,wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,.wc-block-cart__submit-container a, .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button,button[type="submit"],#theme-sidebar .wp-block-search .wp-block-search__label:before,#theme-sidebar h3:before, #theme-sidebar h1.wp-block-heading:before, #theme-sidebar h2.wp-block-heading:before, #theme-sidebar h3.wp-block-heading:before,#theme-sidebar h4.wp-block-heading:before, #theme-sidebar h5.wp-block-heading:before, #theme-sidebar h6.wp-block-heading:before{';
$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='a,.logo h1 a, .logo p a, .main-navigation a:hover, .box-content a, .entry-content a,  #theme-sidebar h3, #theme-sidebar h1.wp-block-heading, #theme-sidebar h2.wp-block-heading, #theme-sidebar h3.wp-block-heading, #theme-sidebar h4.wp-block-heading, #theme-sidebar h5.wp-block-heading, #theme-sidebar h6.wp-block-heading , #about h3, .main-navigation .current_page_item > a, .woocommerce-info a:hover, .woocommerce-terms-and-conditions-wrapper a:hover,  #theme-sidebar .wp-block-search .wp-block-search__label,a.added_to_cart.wc-forward,.box-info i {';
$preventive_maintenance_tp_theme_css .='color: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='#about span.short-box,.readmore-btn a{';
	$preventive_maintenance_tp_theme_css .='border-color: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='@media screen and (max-width:1000px) {';
$preventive_maintenance_tp_theme_css .='.toggle-nav button {';
	$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='} }';
}

if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='.page-box,#theme-sidebar section {';
    $preventive_maintenance_tp_theme_css .='border-left-color: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_second_color_option != false){
$preventive_maintenance_tp_theme_css .='.page-box,#theme-sidebar section {';
    $preventive_maintenance_tp_theme_css .='border-bottom-color: '.esc_attr($preventive_maintenance_tp_second_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
//Third color

$preventive_maintenance_tp_third_color_option = get_theme_mod('preventive_maintenance_tp_third_color_option');

if($preventive_maintenance_tp_third_color_option != false){
$preventive_maintenance_tp_theme_css .='.call-detail, #comments input[type="submit"]:hover, span.meta-nav:hover, span.meta-nav:hover, .next.page-numbers:hover, #return-to-top, .woocommerce a.button:hover, .woocommerce button.button.alt:hover,  .woocommerce a.button:hover, .woocommerce button.button:hover,woocommerce a.button.alt:hover, .woocommerce a.button:hover,  .woocommerce a.button.alt:hover ,  #theme-sidebar button[type="submit"]:hover, #footer button[type="submit"]:hover, #slider h6, .more-btn a:hover,wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button:hover,.wc-block-cart__submit-container a:hover, .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover,.wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button:hover{';
$preventive_maintenance_tp_theme_css .='background-color: '.esc_attr($preventive_maintenance_tp_third_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_third_color_option != false){
$preventive_maintenance_tp_theme_css .='.social-media i:hover, .box-content a:hover, .entry-content a:hover, #theme-sidebar a:hover , .timebox i, .wp-block-calendar a:hover, #footer li a:hover, .woocommerce-MyAccount-content a:hover, .wp-block-quote a:hover,.main-navigation .current-menu-item > a,#theme-sidebar .widget_tag_cloud a:hover ,a:hover,#footer p.wp-block-tag-cloud a:hover,#footer .tagcloud a:hover, #footer p.wp-block-tag-cloud a:hover{';
$preventive_maintenance_tp_theme_css .='color: '.esc_attr($preventive_maintenance_tp_third_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_third_color_option != false){
$preventive_maintenance_tp_theme_css .='#about span.short-box, p.wp-block-tag-cloud a#theme-sidebar .tagcloud a:hover, p.wp-block-tag-cloud a :hover, #theme-sidebar .tagcloud a :hover , #footer .tagcloud a:hover, #theme-sidebar .tagcloud a:hover,.post_tag a:hover, #theme-sidebar .widget_tag_cloud a:hover,.readmore-btn a:hover,#footer p.wp-block-tag-cloud a:hover {';
	$preventive_maintenance_tp_theme_css .='border-color: '.esc_attr($preventive_maintenance_tp_third_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}

//preloader

$preventive_maintenance_tp_preloader_color1_option = get_theme_mod('preventive_maintenance_tp_preloader_color1_option');
$preventive_maintenance_tp_preloader_color2_option = get_theme_mod('preventive_maintenance_tp_preloader_color2_option');
$preventive_maintenance_tp_preloader_bg_color_option = get_theme_mod('preventive_maintenance_tp_preloader_bg_color_option');

if($preventive_maintenance_tp_preloader_color1_option != false){
$preventive_maintenance_tp_theme_css .='.center1{';
	$preventive_maintenance_tp_theme_css .='border-color: '.esc_attr($preventive_maintenance_tp_preloader_color1_option).' !important;';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_preloader_color1_option != false){
$preventive_maintenance_tp_theme_css .='.center1 .ring::before{';
	$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_preloader_color1_option).' !important;';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_preloader_color2_option != false){
$preventive_maintenance_tp_theme_css .='.center2{';
	$preventive_maintenance_tp_theme_css .='border-color: '.esc_attr($preventive_maintenance_tp_preloader_color2_option).' !important;';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_preloader_color2_option != false){
$preventive_maintenance_tp_theme_css .='.center2 .ring::before{';
	$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_preloader_color2_option).' !important;';
$preventive_maintenance_tp_theme_css .='}';
}
if($preventive_maintenance_tp_preloader_bg_color_option != false){
$preventive_maintenance_tp_theme_css .='.loader{';
	$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_preloader_bg_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}


$preventive_maintenance_tp_footer_bg_color_option = get_theme_mod('preventive_maintenance_tp_footer_bg_color_option');


if($preventive_maintenance_tp_footer_bg_color_option != false){
$preventive_maintenance_tp_theme_css .='#footer{';
	$preventive_maintenance_tp_theme_css .='background: '.esc_attr($preventive_maintenance_tp_footer_bg_color_option).';';
$preventive_maintenance_tp_theme_css .='}';
}