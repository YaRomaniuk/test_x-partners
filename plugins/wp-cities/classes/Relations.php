<?php
class Relations
{
    public function __construct()
    {
        add_action( 'add_meta_boxes', [$this,'add_relations_box']);
        add_action('save_post',  [$this,'save_relations'],10,3);
    }


    function add_relations_box() {
        add_meta_box(
            'relations_cities',
            'Город',
            [$this,'actions_box_html'],
            'realty' ,
            'side'
        );
    }
    function actions_box_html(){
        $cities = get_post_meta(get_the_ID(),'cities',true);
        ?>
        <div id="taxonomy-relations_cities">
             <ul id="checklist" class='list categorychecklist form-no-clear'>
                 <?php
                 $query_cities = get_posts( [ 'post_type' => 'cities' ] );
                 foreach ($query_cities as $city){
                     ?>
                     <li>
                         <label><input type='radio' <?=($cities == $city->ID)?'checked':''?> name='cities' value="<?=$city->ID;?>"><?=$city->post_title;?></label>
                     </li>
                     <?php
                 }
                 ?>
           </ul>
        </div>
    <?php
    }
    function save_relations($post_id, $post){
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( 'realty' != $_POST['post_type'] )
            return;

        if ( isset( $_POST['cities'] ) ) {
            update_post_meta( $post_id, 'cities', $_POST['cities'] );
        }
    }
}