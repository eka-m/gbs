<?php
    # Page variables
    $header_dark_text = $args['header_dark_text'] ?? false;



    # Header menu variables
    $menu_locations = get_nav_menu_locations();
    $primary_menu = wp_get_nav_menu_object( $menu_locations[multiple_langs( 'primary-menu-en', 'primary-menu-ru' )] );
    $primary_menu_items = wp_get_nav_menu_items( $primary_menu->term_id );

    $menu_items_by_parent = [];
    // Separating main menu and sub-menu items
    foreach ($primary_menu_items as $item) {
        $parent_id = $item->menu_item_parent ? $item->menu_item_parent : 0; // Main items are put inside the 0 sub-array
        $menu_items_by_parent[$parent_id][] = $item;
    }



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
?>



<!DOCTYPE html>
<html lang="<?php echo multiple_langs( 'en', 'ru' ); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div id='headerWrapper'>
        <header id='myHeader'>
            <div class='my-container'>
                <div class='upper-navbar'>
                    <div id='headerLogoArea'>
                        <a href="<?php echo site_url( multiple_langs( '', '/ru') ); ?>">
                            <img src="<?php echo esc_url( get_field( !$header_dark_text ? 'logo_light' : 'logo_dark', $logos_id ) ); ?>" alt="" id='headerMainLogo'>
                        </a>
						<svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="<?php echo multiple_subs( 'header-logo-arrow-visible', 'header-logo-arrow-visible', 'header-logo-arrow-visible' ); ?>">
                            <path d="M1 1L9 9L1 17" stroke="white" stroke-width="2"/>
						</svg>
                        <img src="<?php echo esc_url( get_field( multiple_subs( 'gtf_logo', 'gtf_express_logo', 'gtf_freeport_logo' ), $logos_id ) ); ?>" alt="" class='header-subs-logo<?php echo multiple_subs( ' header-subs-logo-visible', ' header-subs-logo-visible', ' header-subs-logo-visible' ); ?>'>
                    </div>

                    <div id='langBurger'>
                        <span id='headerLang'>
                            <img src="<?php echo esc_url( get_field( !$header_dark_text ? 'lang_light' : 'lang_dark', $logos_id ) ); ?>" alt="">
                            <span class='<?php echo !$header_dark_text ? 'light' : 'dark'; ?>'><?php echo multiple_langs( 'EN', 'RU' ); ?></span>
                        </span>

                        <span id='burger'>
                             <div id="burgerBarTop" class="<?php echo !$header_dark_text ? 'bg-light' : 'bg-dark'; ?>"></div>
                             <div id="burgerBarMiddle" class="<?php echo !$header_dark_text ? 'bg-light' : 'bg-dark'; ?>"></div>
                             <div id="burgerBarBottom" class="<?php echo !$header_dark_text ? 'bg-light' : 'bg-dark'; ?>"></div>
                        </span>

                        <div id='headerLangModal'>
                            <div id='headerLangModalTitleOuter'>
                                <div id='headerLangModalTitleInner'>
                                    <span><?php echo multiple_langs( 'Choose language', 'Выберите язык' ); ?></span>
                                    <img src="<?php echo get_template_directory_uri() . '/img/close-modal-small.svg' ?>" alt="" id='closeLangModal'>
                                </div>
                            </div>
                            <div id='headerLangModalItems'>
                                <a href='<?php echo site_url( switch_lang( '' ) ); ?>' class='header-lang-modal-item-outer<?php echo multiple_langs( ' active', ''); ?>'>
                                    <span class='header-lang-modal-item-inner-1'>English</span>
                                    <span class='header-lang-modal-item-inner-2'>EN</span>
                                </a>
                                <a href='<?php echo site_url( switch_lang( 'ru/' ) ); ?>' class='header-lang-modal-item-outer<?php echo multiple_langs( '', ' active'); ?>'>
                                    <span class='header-lang-modal-item-inner-1'>Русский</span>
                                    <span class='header-lang-modal-item-inner-2'>РУ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id='primaryMenuModal'>
            <div id='primaryMenuUpper'>
                <img src="<?php echo get_template_directory_uri() . '/img/close-modal-small.svg' ?>" alt="" class='mobile-flex close-menu-modal'>
                <img src="<?php echo get_template_directory_uri() . '/img/close-modal-large.svg' ?>" alt="" class='desktop-flex close-menu-modal'>
                <img src="<?php echo esc_url( get_field( 'logo_dark', $logos_id ) ); ?>" alt="" id='primaryMenuUpperLogo' class='desktop-flex'>
            </div>

            <div id='primaryMenuContent'>
                <div id='primaryMenuItems'>
                    <?php
                        foreach( $menu_items_by_parent[0] as $item ) {
                            echo '<div class="primary-menu-item"><a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
                            if ( !empty( $menu_items_by_parent[$item->ID] ) ) {
                                echo '<div class="primary-menu-subitems">';
                                foreach( $menu_items_by_parent[$item->ID] as $subItem ) {
                                    echo '<div><a href="' . esc_url( $subItem->url ) . '">' . esc_html( $subItem->title ) . '</a></div>';
                                }
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                    ?>
                </div>

                <div id='primaryMenuContacts'>
                    <div id='primaryMenuContactsTitleContent'>
                        <div id='primaryMenuContactsTitle'><?php echo get_field( multiple_langs( 'header_menu_contacts_title_en', 'header_menu_contacts_title_ru' ), $header_footer_id ); ?></div>
                        <div id='primaryMenuContactsContent'>
                            <div class='primary-menu-contacts-item'>
                                <?php echo get_field( multiple_langs( 'contacts_address_en', 'contacts_address_ru' ), $contacts_id ); ?>
                            </div>
                            <div>
                                <a href='<?php echo get_field( 'contacts_phone', $contacts_id )['url']; ?>' class='primary-menu-contacts-item'>
                                    <?php echo get_field( 'contacts_phone', $contacts_id )['title']; ?>
                                </a>
                            </div>
                                <div>
                                <a href='<?php echo get_field( 'contacts_email', $contacts_id )['url']; ?>' class='primary-menu-contacts-item'>
                                    <?php echo get_field( 'contacts_email', $contacts_id )['title']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id='primaryMenuSocNet'>
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
            </div>
        </div>
    </div>

    
