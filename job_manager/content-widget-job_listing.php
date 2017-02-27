<li <?php job_listing_class(); ?>>
	<a href="<?php the_job_permalink(); ?>">
		<div class="position">
			<?php the_title(); ?>
		</div>
		<ul class="meta">
			<li class="location"><?php the_job_location( false ); ?></li>
			<li class="company"><?php the_company_name(); ?></li>
			<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php the_job_type(); ?></li>
		</ul>
	</a>
</li>