<?php
	function project_recent_posts( $atts = null, $content = null, $tag = null ) {

    $out = '';

    $args = array( 
        'numberposts' => '4', 
        'post_status' => 'publish', 
        'post_type' => 'project' ,
    );

    $recent = wp_get_recent_posts( $args );

    if ( $recent ) {

        

        foreach ( $recent as $item ) {
            $out .= '<div class="small-12 medium-12 large-6 columns project-item">';
            $out .= get_the_post_thumbnail( $item['ID'] ); 
            $out .= '<div class="text-overlay">';
            $out .= '<a href="' . get_permalink( $item['ID'] ) . '">';
            $out .= get_the_title( $item['ID'] );
            $out .= '</a>';            
            $out .= '</div>';
            $out .= '</div>';
        }

    }

    if ( $tag ) {
        return $out;
    } else {
        echo $out;
    }

}
?>