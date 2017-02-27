<?php
/*
 * Template for displaying footer.
 * 
 * @package Profound
 */
?>

<?php //get_sidebar('footer') ?>

            <?php if(!profound_get_option('disable_footer')): ?>
            <div class="footer-bg-section-pink grid-col-16 clearfix">
                <div id="footer-section" class="footer-section grid-col-16">
                    <?php if(profound_get_option('show_copyright')): ?>
                        <div id="copyright" class="copyright"><?php _e( 'Copyright', 'profound' ) ?> <?php echo date( 'Y' ) ?> Pitch.Asia. All Rights Reserved. | <a href="https://www.pitch.asia/contact" title="Contact Us">Contact Us</a> | <a href="https://www.pitch.asia/about" title="About Us">About Us</a> | <a href="https://www.pitch.asia/privacy" title="Privacy Policy">Privacy Policy</a> | <a href="https://www.pitch.asia/terms" title="Terms and Conditions">Terms &amp; Conditions</a> &nbsp;&nbsp;<a href="https://twitter.com/PitchAsia" target="_blank"><img src="https://www.pitch.asia/wp-content/uploads/twitter-icon-24x24.png" title="Pitch.Asia on Twitter" height="16" width="16"></a>&nbsp;&nbsp;<a href="https://www.linkedin.com/company/pitch-asia" target="_blank" alt="Pitch.Asia on LinkedIn"><img src="https://www.pitch.asia/wp-content/uploads/linkedin-icon-24x24.png" title="Pitch.Asia on LinkedIn" height="16" width="16"></a></div>
                    <?php endif ?>
                        <?php  profound_social_section_show() ?>
                </div>
            </div>
            <?php endif; ?>
			
        </div><!-- wrapper ends -->
    </div><!-- parent-wrapper ends -->
    <?php wp_footer(); ?>
</div>
</body>
</html>