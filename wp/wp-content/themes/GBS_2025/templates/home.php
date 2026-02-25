<?php
	/**
	 * Template Name: Home
	 * Template Post Type: page
	 */

	get_template_part( 'templates/header', null, array( 'header_dark_text' => false, ) );

	$media_page = get_page_by_title( 'MEDIA - Home/Главная' );
    $media_page_id = $media_page->ID;

	$partners_page = get_page_by_title( 'CATALOG - Partners' );
    $partners_id = $partners_page->ID;
    $partners_fields = get_fields( $partners_id );

	$logos_page = get_page_by_title( 'GLOBAL - Logos' );
    $logos_id = $logos_page->ID;

	$page_links = get_page_by_title( 'GLOBAL - Page Links' );
    $page_links_id = $page_links->ID;

	$careers_page = get_page_by_title( multiple_langs( 'Careers', 'Карьера' ) );
    $careers_id = $careers_page->ID;

	$careers_media_page = get_page_by_title( 'MEDIA - Careers/Карьера' );
    $careers_media_id = $careers_media_page->ID;
?>



<style>
	/* For Chrome, Edge, Safari */
	::-webkit-scrollbar {
		display: none;
	}

	/* For Firefox */
	html {
		scrollbar-width: none; /* Firefox */
	}

	/* Works on the main document */
	body {
		-ms-overflow-style: none;  /* IE and old Edge */
		overflow-y: scroll; /* Still allow scrolling */
	}
</style>



<div id='hero'>
	<img src="<?php echo esc_url( get_field( 'logo_dark', $logos_id ) ); ?>" alt="" class='home-hero-logo'>

	<div id='heroImg' style='background-image: url("<?php echo esc_url( get_field( 'hero_background', $media_page_id ) ) ?>");'></div>

	<img src="<?php echo get_template_directory_uri() . '/img/home-hero-figure-mobile.svg' ?>" alt="" id='heroFigureMobileLeft'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-hero-figure-mobile.svg' ?>" alt="" id='heroFigureMobileRight'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-hero-figure-desktop.svg' ?>" alt="" id='heroFigureDesktopLeft'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-hero-figure-desktop.svg' ?>" alt="" id='heroFigureDesktopRight'>

	<div id='heroTitleButton'>
		<div class='my-container' style='display: flex; flex-direction: column;'>
			<div id='heroTitleUpper'><?php echo get_field( 'hero_title_1' ); ?></div>
			<div id='heroTitleLower'><?php echo get_field( 'hero_title_2' ); ?></div>
			<div id='heroDetailsButtonArea'>
				<a href="<?php echo site_url( '#' ) ?>" id='heroDetailsButton'><?php echo multiple_langs( 'More Details', 'Подробнее' ); ?></a>
			</div>
		</div>
	</div>

	<div id='heroMottoArea'>
		<div class='my-container' style='display: flex; flex-direction: row-reverse;'>
			<div id='heroMotto'><?php echo get_field( 'hero_motto' ); ?></div>
		</div>
	</div>
</div>



<div id='about' style='background-image: url("<?php echo esc_url( get_field( 'about_background', $media_page_id ) ) ?>");'>
	<div id='aboutHorizontalBar'></div>
	<div id='aboutVerticalBar'></div>

	<img src="<?php echo get_template_directory_uri() . '/img/home-about-figure-mobile.svg' ?>" alt="" id='aboutFigureMobileLeft'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-about-figure-mobile.svg' ?>" alt="" id='aboutFigureMobileRight'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-about-figure-desktop.svg' ?>" alt="" id='aboutFigureDesktopLeft'>
	<img src="<?php echo get_template_directory_uri() . '/img/home-about-figure-desktop.svg' ?>" alt="" id='aboutFigureDesktopRight'>

	<div id='aboutFact1' class='my-container about-fact'>
		<div id='aboutFact11'><?php echo get_field( 'about_fact_1_1' ); ?></div>
		<div id='aboutFact12'><?php echo get_field( 'about_fact_1_2' ); ?></div>
		<div id='aboutFact13'><?php echo get_field( 'about_fact_1_3' ); ?></div>
	</div>
	<div id='aboutFact2' class='my-container about-fact'>
		<div id='aboutFact21'><?php echo get_field( 'about_fact_2_1' ); ?></div>
		<div id='aboutFact22'><?php echo get_field( 'about_fact_2_2' ); ?></div>
		<div id='aboutFact23'><?php echo get_field( 'about_fact_2_3' ); ?></div>
	</div>
	<div id='aboutFact3' class='my-container about-fact'>
		<div id='aboutFact31'><?php echo get_field( 'about_fact_3_1' ); ?></div>
		<div id='aboutFact32'><?php echo get_field( 'about_fact_3_2' ); ?></div>
		<div id='aboutFact33'><?php echo get_field( 'about_fact_3_3' ); ?></div>
	</div>
</div>



<div id='principles'>
	<!-- <div id='principlesOverlay'></div> -->

	<div class='my-container'>
		<div id='principlesTitleText' >
			<div id='principlesTitle'><?php echo get_field( 'principles_title' ); ?></div>
			<div id='principlesText'><?php echo get_field( 'principles_text' ); ?></div>
		</div>
	</div>


	<div class='my-container'>
		<div id='principlesPartnersContainer'>
			<div id='principlesPartnersTrack'>
				<?php 
					foreach( $partners_fields as $field_name => $logo_url ) {
						$partner_logo = $logo_url ?? '';
						if ( !empty( $partner_logo ) ) {
							echo '<div class="principles-partner">';
							echo '<img src="' . esc_url( $partner_logo ) . '" alt="" class="white-colorized">';
							echo '</div>';
						}
					}
					foreach( $partners_fields as $field_name => $logo_url ) {
						$partner_logo = $logo_url ?? '';
						if ( !empty( $partner_logo ) ) {
							echo '<div class="principles-partner">';
							echo '<img src="' . esc_url( $partner_logo ) . '" alt="" class="white-colorized">';
							echo '</div>';
						}
					}
				?>

				<svg style="display: none;">
					<defs>
						<filter id="colorize-white">
							<feColorMatrix 
								type="matrix" 
								values="0 0 0 0 1
										0 0 0 0 1
										0 0 0 0 1
										0 0 0 1 0" />
						</filter>
					</defs>
				</svg>
			</div>
		</div>
	</div>

	<!-- <div id='principlesBottomSpacer'></div>
	<div id='principlesBottomImage' style='background-image: url("<?php //echo esc_url( get_field( 'principles_image', $media_page_id ) ) ?>");'></div> -->

	<div id='principlesBottomImageContainer'>
		<div id='principlesBottomImage' style='background-image: url("<?php echo esc_url( get_field( 'principles_image', $media_page_id ) ) ?>");'>
			<img src="<?php echo get_template_directory_uri() . '/img/home-principles-figure.svg'; ?>" alt="" id='homePrinciplesFigure'/>
		</div>
	</div>

</div>



<div id='services'>
	<div class='my-container'>
		<div id='servicesTitle'><?php echo get_field( 'services_title' ); ?></div>
		<div id='serviceCards'>
			<div class='service-card' style='background-image: url("<?php echo esc_url( get_field( 'service_background_1', $media_page_id ) ) ?>");'>
				<div id='serviceOverlay1' class='service-overlay'></div>
				<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_link_en', 'gtf_link_ru' ), $page_links_id ) ); ?>" class='service-card-logo-link'>
					<img src="<?php echo esc_url( get_field( 'gtf_logo', $logos_id ) ); ?>" alt="" class='service-card-logo'>
				</a>
				<div class='service-card-text'>
					<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_link_en', 'gtf_link_ru' ), $page_links_id ) ); ?>">
						<?php echo get_field( 'services_text_1' ); ?>
					</a>
				</div>
			</div>

			<div class='service-card' style='background-image: url("<?php echo esc_url( get_field( 'service_background_2', $media_page_id ) ) ?>");'>
				<div id='serviceOverlay2' class='service-overlay'></div>
				<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_express_link_en', 'gtf_express_link_ru' ), $page_links_id ) ); ?>" class='service-card-logo-link'>
					<img src="<?php echo esc_url( get_field( 'gtf_express_logo', $logos_id ) ); ?>" alt="" class='service-card-logo'>
				</a>
				<div class='service-card-text'>
					<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_express_link_en', 'gtf_express_link_ru' ), $page_links_id ) ); ?>">
						<?php echo get_field( 'services_text_2' ); ?>
					</a>
				</div>
			</div>
			
			<div class='service-card' style='background-image: url("<?php echo esc_url( get_field( 'service_background_3', $media_page_id ) ) ?>");'>
				<div id='serviceOverlay3' class='service-overlay'></div>
				<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_freeport_link_en', 'gtf_freeport_link_ru' ), $page_links_id ) ); ?>" class='service-card-logo-link'>
					<img src="<?php echo esc_url( get_field( 'gtf_freeport_logo', $logos_id ) ); ?>" alt="" class='service-card-logo'>
				</a>
				<div class='service-card-text'>
					<a href="<?php echo esc_url( get_field( multiple_langs( 'gtf_freeport_link_en', 'gtf_freeport_link_ru' ), $page_links_id ) ); ?>">
						<?php echo get_field( 'services_text_3' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>



<div id='homeNews'>
    <div class='my-container'>
        <div id='homeNewsTitle'><?php echo multiple_langs( 'Latest news', 'Последние новости' ) ?></div>

        <?php
			$news_array = array(
				'post_type'      => multiple_langs( 'news-item', 'news-item-ru' ),
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC'
			);
			$news_query = new WP_Query($news_array);

		if ($news_query->have_posts()) : ?>
			<div id='homeNewsPosts'>
				<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
					<div class='home-news-post' >
						<a href='<?php the_permalink(); ?>' class='home-news-post-link'>
							<div class='home-news-post-image' style='background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>);'>
								<div class='home-news-post-image-overlay'></div>
							</div>
							<div class='home-news-post-content'>
								<div class='home-news-post-date mobile-block'><?php echo get_the_date( 'd.m.Y' ); ?></div>
								<div class='home-news-post-title'><?php the_title(); ?></div>
								<div class='home-news-post-date desktop-block'><?php echo get_the_date( 'd.m.Y' ); ?></div>
							</div>
						</a>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
    </div>
</div>



<div id='careersVacancies'>
	<div class='my-container'>
		<img src="<?php echo esc_url( get_field( 'careers_vacancies_img', $careers_media_id ) ); ?>" alt="">
		<div id='careersVacanciesContent'>
			<div id='careersVacanciesTextContent'>
				<div id='careersVacanciesTitle'><?php echo esc_html( get_field( 'careers_vacancies_title', $careers_id ) ); ?></div>
				<div id='careersVacanciesSubtitle'><?php echo esc_html( get_field( 'careers_vacancies_subtitle', $careers_id ) ); ?></div>
				<div id='careersVacanciesText'><?php echo esc_html( get_field( 'careers_vacancies_text', $careers_id ) ); ?></div>
			</div>

			<?php
				$vacancies_array = array(
					'post_type'      => multiple_langs( 'vacancy', 'vacancy-ru' ),
					'posts_per_page' => 3,
					'orderby'        => 'date',
					'order'          => 'DESC'
				);
				$vacancies_query = new WP_Query($vacancies_array);
			if ($vacancies_query->have_posts()) : ?>
				<div id='homeVacancyCards'>
					<?php while ($vacancies_query->have_posts()) : $vacancies_query->the_post(); ?>
						<div class='home-vacancy-card' >
							<a href='<?php the_permalink(); ?>' class='home-vacancy-link'>
								<div>
									<div class='home-vacancy-position'><?php echo esc_html( get_field( 'position' ) ); ?></div>
									<div class='home-vacancy-country'><?php echo esc_html( get_field( 'vacancy_filter_location' ) ); ?></div>
								</div>
								<div>
									<img src="<?php echo getLogoLightByCompanyName( esc_html( get_field( 'company' ) ), $logos_id ); ?>" alt="" class='home-vacancy-card-logo'>
								</div>
							</a>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>

			<?php else : ?>
				<div id='careersVacanciesButtonArea'>
					<a href="<?php echo esc_url( get_field( multiple_langs( 'vacancies_link_en', 'vacancies_link_ru' ), $page_links_id ) ); ?>" id='careersVacanciesButton'>
						<?php echo multiple_langs( 'Vacancies', 'Вакансии' ); ?>
					</a>
				</div>

			<?php endif; ?>
		</div>
	</div>
</div>



<div id='jsGlobalParams' data-sectionbullets-fadein-delay='3375'></div>



<?php get_template_part( 'templates/footer', null, array( 'home_page' => true, 'footer_dark_text' => false ) ); ?>