<?php
class CitiesElementor extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return "cities_content";
    }

    public function get_title()
    {
        return 'Города';
    }

    public function get_icon()
    {
        return "eicon-post-content";
    }

    public function get_categories()
    {
        return ["cities_custom_posts"];
    }

    protected function render()
    {
        ?>
        <div class="cities_content"><?php
            ?>
            <h2>Города</h2>
            <div class="row">
            <?php
            $query = new WP_Query( [ 'post_type' => 'cities',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order'   => 'DESC', ] );
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <div class="col">
                    <a href="<?=get_post_permalink()?>">
                    <div class="row d-flex flex-column border rounded m-1">
                        <div class="text-center"><?= get_the_post_thumbnail( get_the_ID(), 'thumbnail',['class' => "img-thumbnail"] ); ?></div>
                        <div class="text-center"><?= get_the_title(); ?></div>
                    </div>
                    </a>
                </div>
                <?php
            }
            wp_reset_postdata();
        ?>
            </div>
        </div>
        <?php
    }
}
