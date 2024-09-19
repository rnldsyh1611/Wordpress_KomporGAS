<?php
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-lg-3 col-md-7 col-12 align-self-center">
	    		<?php if( get_theme_mod( 'preventive_maintenance_call_text' ) != '' || get_theme_mod( 'preventive_maintenance_call' ) != '') { ?>
		          <div class="row call-detail">
		            <div class="col-lg-9 col-md-8 col-8 align-self-center call">
		              <p class="infotext"><?php echo esc_html( get_theme_mod('preventive_maintenance_call_text','') ); ?></p>
		              <p class="mb-0"><a href="tel:<?php echo esc_html( get_theme_mod('preventive_maintenance_call','') ); ?>"><?php echo esc_html( get_theme_mod('preventive_maintenance_call','') ); ?></a></p>
		            </div>
		            <div class="col-lg-3 col-md-4 col-4 align-self-center phone-icon"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_call_icon','fas fa-phone')); ?>"></i></div>
		          </div>
	        	<?php } ?>
	      	</div>
	      	<div class="col-lg-1 col-md-1 col-0 align-self-center"></div>
	    	<div class="menubox col-lg-8 col-md-4 col-12 align-self-center">
	      		<div class="innermenubox">
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="preventive_maintenance_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','preventive-maintenance'); ?></span></button>
	          			</div>
	         	 		<div id="mySidenav" class="nav sidenav">
	            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'preventive-maintenance' ); ?>">
				              	<?php
				                  	wp_nav_menu( array(
					                    'theme_location' => 'primary-menu',
					                    'container_class' => 'main-menu clearfix' ,
					                    'menu_class' => 'clearfix',
					                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
					                    'fallback_cb' => 'wp_page_menu',
				                  	) );
				              	 ?>
	              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="preventive_maintenance_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','preventive-maintenance'); ?></span></a>
		            		</nav>
		          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	    </div>
  	</div>
</div>
