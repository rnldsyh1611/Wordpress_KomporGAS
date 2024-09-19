<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox px-lg-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5 text-lg-start align-self-center">
        <?php $preventive_maintenance_logo_settings = get_theme_mod( 'preventive_maintenance_logo_settings','Different Line');
          if($preventive_maintenance_logo_settings == 'Different Line'){ ?>
            <div class="logo">
              <?php if( has_custom_logo() ) preventive_maintenance_the_custom_logo(); ?>
              <?php if( get_theme_mod('preventive_maintenance_site_title_text',true) == 1){ ?>
                <?php if (is_front_page() && is_home()) : ?>
                  <h1 class="text-capitalize">
                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </h1> 
                <?php else : ?>
                    <p class="text-capitalize site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                    </p>
                <?php endif; ?>
              <?php }?>
              <?php $preventive_maintenance_description = get_bloginfo( 'description', 'display' );
              if ( $preventive_maintenance_description || is_customize_preview() ) : ?>
                <?php if( get_theme_mod('preventive_maintenance_site_tagline_text',false)){ ?>
                  <p class="site-description"><?php echo esc_html($preventive_maintenance_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          <?php }else if($preventive_maintenance_logo_settings == 'Same Line'){ ?>
            <div class="logo logo-same-line">
              <div class="row">
                <div class="col-lg-5 col-md-5 align-self-center">
                  <?php if( has_custom_logo() ) preventive_maintenance_the_custom_logo(); ?>
                </div>
                <div class="col-lg-7 col-md-7 align-self-center">
                  <?php if( get_theme_mod('preventive_maintenance_site_title_text',true) == 1){ ?>
                    <?php if (is_front_page() && is_home()) : ?>
                      <h1 class="text-capitalize">
                          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                      </h1> 
                    <?php else : ?>
                        <p class="text-capitalize site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </p>
                    <?php endif; ?>
                  <?php }?>
                  <?php $preventive_maintenance_description = get_bloginfo( 'description', 'display' );
                  if ( $preventive_maintenance_description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('preventive_maintenance_site_tagline_text',false)){ ?>
                      <p class="site-description"><?php echo esc_html($preventive_maintenance_description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php }?>
      </div>
      <div class="col-lg-7 align-self-center">
        <div class="row">
          <div class="location col-lg-6 col-md-5 col-12 align-self-center">
            <?php if( get_theme_mod( 'preventive_maintenance_location_text' ) != '' || get_theme_mod( 'preventive_maintenance_location' ) != '') { ?>
              <div class="row">
                <div class="col-lg-3 col-md-2 align-self-center text-lg-end"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_location_icon','far fa-map')); ?>"></i></div>
                <div class="col-lg-9 col-md-10 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('preventive_maintenance_location_text','')); ?></p>
                  <p class="mb-0 simplex"><?php echo esc_html( get_theme_mod('preventive_maintenance_location','') ); ?></p>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="email col-lg-5 col-md-5 col-12 align-self-center">
            <?php if( get_theme_mod( 'preventive_maintenance_mail_text' ) != '' || get_theme_mod( 'preventive_maintenance_mail' ) != '') { ?>
              <div class="row">
                <div class="col-lg-3 col-md-2 align-self-center text-lg-end"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_envelope_icon','fas fa-envelope-open')); ?>"></i></div>
                <div class="col-lg-9 col-md-10 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('preventive_maintenance_mail_text','')); ?></p>
                  <p class="mb-0 simplex"><a href="mailto:<?php echo esc_html( get_theme_mod('preventive_maintenance_mail','') ); ?>"><?php echo esc_html( get_theme_mod('preventive_maintenance_mail','') ); ?></a></p>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-1 col-md-2 col-12 align-self-center">
            <span class="search-bar">
              <button type="button" class="open-search"><i class="fas fa-search"></i></button>
            </span>
          </div>   
        </div>
    <div class="search-outer">
      <div class="inner_searchbox w-100 h-100">
          <?php get_search_form(); ?>
      </div>
      <button type="button" class="search-close"><?php esc_html_e('CLOSE', 'preventive-maintenance'); ?></button>
    </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
