<?php
function if2e_custom_header_fonts() {
    $font_url = if2e_get_font_url();
    if ( ! empty( $font_url ) )
        wp_enqueue_style( 'if2e-fonts', esc_url_raw( $font_url ), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'if2e_custom_header_fonts' );
