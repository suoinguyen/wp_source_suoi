<?php
get_header();

$current_object = get_queried_object();
?>
    <div class="columns-container list-products-container taxonomy-list-products-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                }
                ?>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <?php
                $variable = get_field('list_banner',$current_object);
                if($variable){
                    ?>
                    <div class="col-md-12">
                        <!-- category-slider -->
                        <div class="category-slider">
                            <ul class="owl-carousel owl-style2" data-dots="false" data-loop="false" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                                <?php
                                foreach ($variable as $item){
                                    ?>
                                    <li>
                                        <img src="<?php echo $item['url']?>" alt="category-slider">
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- ./category-slider -->
                    </div>
                    <?php
                }
                ?>

                <div class="content-wrapper">
                    <span id="nav-button-push"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <!-- .left colunm -->
                    <div class="column col-xs-12 col-sm-3" id="left_column">
                        <!-- block category -->
                        <div class="block left-module">
                            <p class="title_block"><?php _e('Danh mục sản phẩm', _TEXT_DOMAIN)?></p>
                            <div class="block_content">
                                <!-- layered -->
                                <div class="layered layered-category">
                                    <div class="layered-content">
                                        <ul class="tree-menu-1">
                                            <?php
                                            $cate = get_categories(array(
                                                'taxonomy'=>'products_taxonomy',
                                                'hide_empty'   => 0,
                                            ));
                                            dropdown_cat($cate);
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ./layered -->
                            </div>
                        </div>
                        <!-- ./block category  -->
                        <!-- TAGS -->
                        <div class="block left-module">
                            <p class="title_block">TAGS</p>
                            <div class="block_content">
                                <!-- List tags -->
                                <?php list_tag()?>
                            </div>
                        </div>
                        <!-- ./TAGS -->
                    </div>
                    <!-- ./left colunm -->
                    <!-- Center colunm-->
                    <?php get_template_part('parts/common/content', 'common-list-products')?>
                    <!-- ./ Center colunm -->
                </div>
            </div>
            <!-- ./row-->
        </div>
    </div>
<?php
    get_footer();
?>