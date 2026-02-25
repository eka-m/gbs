<?php
	# Page variables
    $home_page = $args['home_page'] ?? false;
	$footer_dark_text = $args['footer_dark_text'] ?? false;



	# Footer menu variables
	$menu_locations = get_nav_menu_locations();
	$footer_menu = wp_get_nav_menu_object( $menu_locations[multiple_langs( 'footer-menu-en', 'footer-menu-ru' )] );
	$footer_menu_items = wp_get_nav_menu_items( $footer_menu->term_id );



    # Global pages
    $header_footer_page = get_page_by_title( 'GLOBAL - Header & Footer' );
    $header_footer_id = $header_footer_page->ID;

    $contacts_global_page = get_page_by_title( 'GLOBAL - Contacts' );
    $contacts_id = $contacts_global_page->ID;

    $soc_net_page = get_page_by_title( 'CATALOG - Social Networks' );
    $soc_net_id = $soc_net_page->ID;
    $soc_net_fields = get_fields( $soc_net_id );

    $logos_page = get_page_by_title( 'GLOBAL - Logos' );
    $logos_id = $logos_page->ID;

	$page_links = get_page_by_title( 'GLOBAL - Page Links' );
    $page_links_id = $page_links->ID;
?>
  

  
		<footer class='mobile-flex<?php echo $home_page ? " home-footer-outer" : "" ?>'>
			<div class='my-container'>
				<div class='footer-upper'>
					<div class='footer-contacts-title'><?php echo get_field( multiple_langs( 'footer_contacts_title_en', 'footer_contacts_title_ru' ), $header_footer_id ); ?></div>
					<div class='footer-contacts-content'>
						<div>
							<a href='<?php echo get_field( 'contacts_phone', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
								<?php echo get_field( 'contacts_phone', $contacts_id )['title']; ?>
							</a>
						</div>
						<div>
							<a href='<?php echo get_field( 'contacts_email', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
								<?php echo get_field( 'contacts_email', $contacts_id )['title']; ?>
							</a>
						</div>
						<div class='footer-menu-contacts-item'>
							<?php echo get_field( multiple_langs( 'contacts_address_en', 'contacts_address_ru' ), $contacts_id ); ?>
						</div>
					</div>
				</div>

				<div class='footer-mid'>
					<a href="<?php echo site_url( multiple_langs( '', '/ru') ); ?>" class='footer-logo'>
						<img src="<?php echo esc_url( get_field( 'logo_dark', $logos_id ) ); ?>" alt="">
					</a>
                    <div class='footer-menu-socnet'>
                        <?php 
                            foreach( $soc_net_fields as $field_name => $value ) {
                                $sn_image = $value['sn_image_dark'] ?? '';
                                $sn_link  = $value['sn_link'] ?? '#';
                                if ( !empty( $sn_image ) ) {
                                    echo '<a href="' . esc_url( $sn_link ) . '">';
                                    echo '<img src="' . esc_url( $sn_image ) . '" alt="">';
                                    echo '</a>';
                                }
                            }
                        ?>
                    </div>
				</div>

				<div class='footer-lower'>
					<?php echo get_field( multiple_langs( 'copyright_text_en', 'copyright_text_ru' ), $header_footer_id ); ?>
				</div>
			</div>
		</footer>



		<footer class='desktop-flex<?php echo $home_page ? " home-footer-outer" : "" ?>' style='background-color: <?php echo $footer_dark_text ? "white" : "rgba(37, 45, 93, 1)"; ?>'>
			<!-- Footer for the home page only -->
			<div class='my-container footer-home light' style='display: <?php echo $home_page ? "block" : "none"; ?>;'>
				<div class='footer-upper'>
					<div class='footer-about'>
						<div class='footer-about-title'><?php echo get_field( multiple_langs( 'footer_about_title_en', 'footer_about_title_ru' ), $header_footer_id ); ?></div>
						<div class='footer-about-items footer-links'>
							<div>
								<a href="<?php echo esc_url( $footer_menu_items[1]->url ); ?>"><?php echo esc_html( $footer_menu_items[1]->title ); ?></a>
							</div>
							<div>
								<a href="<?php echo esc_url( $footer_menu_items[2]->url ); ?>"><?php echo esc_html( $footer_menu_items[2]->title ); ?></a>
							</div>
							<div>
								<a href="<?php echo esc_url( $footer_menu_items[3]->url ); ?>"><?php echo esc_html( $footer_menu_items[3]->title ); ?></a>
							</div>
							<div>
								<a href="<?php echo esc_url( $footer_menu_items[4]->url ); ?>"><?php echo esc_html( $footer_menu_items[4]->title ); ?></a>
							</div>
						</div>
					</div>

					<div class='footer-contacts'>
						<div class='footer-contacts-title'><?php echo get_field( multiple_langs( 'footer_contacts_title_en', 'footer_contacts_title_ru' ), $header_footer_id ); ?></div>
						<div class='footer-contacts-content'>
							<div class='footer-menu-contacts-item'>
								<?php echo get_field( multiple_langs( 'contacts_address_en', 'contacts_address_ru' ), $contacts_id ); ?>
							</div>
							<div>
								<a href='<?php echo get_field( 'contacts_phone', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
									<?php echo get_field( 'contacts_phone', $contacts_id )['title']; ?>
								</a>
							</div>
							<div>
								<a href='<?php echo get_field( 'contacts_email', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
									<?php echo get_field( 'contacts_email', $contacts_id )['title']; ?>
								</a>
							</div>
						</div>
						<div class='footer-menu-socnet'>
							<?php 
								foreach( $soc_net_fields as $field_name => $value ) {
									$sn_image = $value['sn_image_light'] ?? '';
									$sn_link  = $value['sn_link'] ?? '#';
									if ( !empty( $sn_image ) ) {
										echo '<a href="' . esc_url( $sn_link ) . '">';
										echo '<img src="' . esc_url( $sn_image ) . '" alt="">';
										echo '</a>';
									}
								}
							?>
						</div>
					</div>
				</div>

				<div class='footer-mid-upper'>
					<div class='footer-subsidiary-logos'>
						<a href="<?php echo esc_url( $footer_menu_items[5]->url ); ?>" class='footer-subsidiary-logo'>
							<img src="<?php echo esc_url( get_field( 'gtf_logo', $logos_id ) ); ?>" alt="">
						</a>
						<a href="<?php echo esc_url( $footer_menu_items[6]->url ); ?>" class='footer-subsidiary-logo'>
							<img src="<?php echo esc_url( get_field( 'gtf_express_logo', $logos_id ) ); ?>" alt="">
						</a>
						<a href="<?php echo esc_url( $footer_menu_items[7]->url ); ?>" class='footer-subsidiary-logo'>
							<img src="<?php echo esc_url( get_field( 'gtf_freeport_logo', $logos_id ) ); ?>" alt="">
						</a>
						<span class='footer-subsidiary-logo'>
							<img src="<?php echo esc_url( get_field( 'gtf_trading_logo', $logos_id ) ); ?>" alt="">
						</span>
					</div>
				</div>

				<div class='footer-mid-lower'>
					<img src="<?php echo esc_url( get_field( 'logo_oneline_light', $logos_id ) ); ?>" alt="" class='footer-logo'>
				</div>

				<div class='footer-lower'>
					<div class='footer-copyright'>
						<?php echo get_field( multiple_langs( 'copyright_text_en', 'copyright_text_ru' ), $header_footer_id ); ?>
					</div>
					<div class='footer-privacy-policy footer-links'>
						<a href="<?php echo esc_url( get_field( multiple_langs( 'privacy_policy_link_en', 'privacy_policy_link_ru' ), $page_links_id ) ); ?>">
							<?php echo get_page_name_from_url( esc_url( get_field( multiple_langs( 'privacy_policy_link_en', 'privacy_policy_link_ru' ), $page_links_id ) ) ); ?>
						</a>
					</div>
				</div>
			</div>



			<!-- Footer for all other pages -->
			<div class='my-container footer-regular <?php echo $footer_dark_text ? "dark" : "light"; ?>' style='display: <?php echo $home_page ? "none" : "block"; ?>'>
				<div class='footer-upper'>
					<div class='footer-logo-area'>
                        <a href="<?php echo esc_url( $footer_menu_items[0]->url ); ?>">
                            <img src="<?php echo esc_url( get_field( !$footer_dark_text ? 'logo_light' : 'logo_dark', $logos_id ) ); ?>" alt="">
                        </a>
					</div>

					<div class='footer-about-services'>
						<div class='footer-about'>
							<div class='footer-about-title'><?php echo get_field( multiple_langs( 'footer_about_title_en', 'footer_about_title_ru' ), $header_footer_id ); ?></div>
							<div class='footer-about-items footer-links'>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[1]->url ); ?>"><?php echo esc_html( $footer_menu_items[1]->title ); ?></a>
								</div>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[2]->url ); ?>"><?php echo esc_html( $footer_menu_items[2]->title ); ?></a>
								</div>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[3]->url ); ?>"><?php echo esc_html( $footer_menu_items[3]->title ); ?></a>
								</div>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[4]->url ); ?>"><?php echo esc_html( $footer_menu_items[4]->title ); ?></a>
								</div>
							</div>
						</div>

						<div class='footer-services'>
							<div class='footer-services-title'><?php echo get_field( multiple_langs( 'footer_services_title_en', 'footer_services_title_ru' ), $header_footer_id ); ?></div>
							<div class='footer-services-items footer-links'>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[5]->url ); ?>"><?php echo esc_html( $footer_menu_items[5]->title ); ?></a>
								</div>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[6]->url ); ?>"><?php echo esc_html( $footer_menu_items[6]->title ); ?></a>
								</div>
								<div>
									<a href="<?php echo esc_url( $footer_menu_items[7]->url ); ?>"><?php echo esc_html( $footer_menu_items[7]->title ); ?></a>
								</div>
							</div>
						</div>
					</div>

					<div class='footer-contacts'>
						<div class='footer-contacts-title'><?php echo get_field( multiple_langs( 'footer_contacts_title_en', 'footer_contacts_title_ru' ), $header_footer_id ); ?></div>
						<div class='footer-contacts-content'>
							<div class='footer-menu-contacts-item'>
								<?php echo get_field( multiple_langs( 'contacts_address_en', 'contacts_address_ru' ), $contacts_id ); ?>
							</div>
							<div>
								<a href='<?php echo get_field( 'contacts_phone', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
									<?php echo get_field( 'contacts_phone', $contacts_id )['title']; ?>
								</a>
							</div>
							<div>
								<a href='<?php echo get_field( 'contacts_email', $contacts_id )['url']; ?>' class='footer-menu-contacts-item'>
									<?php echo get_field( 'contacts_email', $contacts_id )['title']; ?>
								</a>
							</div>
						</div>
						<div class='footer-menu-socnet'>
							<?php 
								foreach( $soc_net_fields as $field_name => $value ) {
									$sn_image = $value[$footer_dark_text ? 'sn_image_dark' : 'sn_image_light'] ?? '';
									$sn_link  = $value['sn_link'] ?? '#';
									if ( !empty( $sn_image ) ) {
										echo '<a href="' . esc_url( $sn_link ) . '">';
										echo '<img src="' . esc_url( $sn_image ) . '" alt="">';
										echo '</a>';
									}
								}
							?>
						</div>
					</div>
				</div>

				<div class='footer-lower'>
					<div class='footer-copyright'>
						<?php echo get_field( multiple_langs( 'copyright_text_en', 'copyright_text_ru' ), $header_footer_id ); ?>
					</div>
					<div class='footer-privacy-policy footer-links'>
						<a href="<?php echo esc_url( get_field( multiple_langs( 'privacy_policy_link_en', 'privacy_policy_link_ru' ), $page_links_id ) ); ?>">
							<?php echo get_page_name_from_url( esc_url( get_field( multiple_langs( 'privacy_policy_link_en', 'privacy_policy_link_ru' ), $page_links_id ) ) ); ?>
						</a>
					</div>
				</div>
			</div>
		</footer>



		<?php wp_footer(); ?>
	</body>
</html>