<?php
defined( 'ABSPATH' ) || exit;

get_header();

?>

    <div class="wrapper" id="page-wrapper">

        <div class="container" id="content" tabindex="-1">

            <div class="row">
                <main class="site-main" id="main">

                    <?php
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'templates/content','realty');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    }
                    ?>

                </main>

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<?php
get_footer();
