<?php global $post; ?>
								<a href="<?php the_job_permalink(); ?>" class="list-group-item">
									<span class="CLogo"><?php the_company_logo(); ?></span>
									<i class="fa fa-fw fa-check"></i>&nbsp;&nbsp; <?php the_title(); ?><br>
									<span class="badge"> <date><?php printf( __( '%s ago', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></span>
									<i class="fa fa-fw fa-user"></i>&nbsp;&nbsp;<?php the_company_name( '<strong>', '</strong> ' ); ?><br>
									<i class="fa fa-fw fa-globe"></i>&nbsp;&nbsp;<?php the_job_location( false ); ?>
								</a>