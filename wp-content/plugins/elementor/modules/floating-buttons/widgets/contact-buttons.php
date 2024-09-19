<?php

namespace Elementor\Modules\FloatingButtons\Widgets;

use Elementor\Modules\FloatingButtons\Base\Widget_Contact_Button_Base;
<<<<<<< HEAD
use Elementor\Plugin;
=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Elementor Contact Buttons widget.
 *
 * Elementor widget that displays contact buttons and a chat-like prompt message.
 *
 * @since 3.23.0
 */
class Contact_Buttons extends Widget_Contact_Button_Base {

	public function get_name(): string {
		return 'contact-buttons';
	}

	public function get_title(): string {
		return esc_html__( 'Single Chat', 'elementor' );
	}

<<<<<<< HEAD
	public function get_style_depends(): array {
		return [ 'widget-floating-buttons' ];
	}
=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
}
