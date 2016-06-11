<?php
global $wp_query;

if ( post_password_required() ) {
    return;
}

if ( have_comments() ) {
    echo '<div class="comment-box">';

    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<h3 class="comments-popup-link text-center">';
        comments_popup_link(  '0 '. __( 'Comments', 'sentio' ),
                              '1 '. __( 'Comment', 'sentio' ),
                              '% '. __( 'Comments', 'sentio' ) );
        echo '</h3>';
}

$args = array(
    'walker'            => null,
    'max_depth'         => '',
    'style'             => 'ul',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => 'Odpowiedz <i class="icon-313 text-alpha"></i>', //ZMIENIONE
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 75,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5', //or html5 @since 3.6
    'short_ping'        => true // @since 3.6
);

echo '<'.$args['style'].' id="comments" class="clean-list comments-loop">';
    wp_list_comments( $args );
echo '</'.$args['style'].'>';

printf( '<div class="comments-pagination align-right">%s</div>'
    , paginate_comments_links( array( 'prev_next' => false, 'echo' => false ) ) );
echo '</div>';

}
$args = array(
    'id_form'           => 'commentform',
    'id_submit'         => 'comment-submit',
    'title_reply'       => __( 'Dodaj komentarz', 'sentio' ), //ZMIENIONE
    'title_reply_to'    => __( 'Dodaj komentarz do %s', 'sentio' ), //ZMIENIONE
    'cancel_reply_link' => __( 'Anuluj odpowiedź', 'sentio' ), //ZMIENIONE
    'label_submit'      => __( 'Dodaj komentarz', 'sentio' ), //ZMIENIONE
    'format'             => 'html5'
);
comment_form($args);