<?php
/**
 * The default template part for the product permalink in
 * the content-store template part's product-info loop
 *
 * @since 1.1.0
 * @version 1.1.0
 * @package IT_Exchange
 *
 * WARNING: Do not edit this file directly. To use
 * this template in a theme, simply copy over this
 * file's content to the exchange/content-store/elements
 * directory located in your theme.
 */
?>

<?php do_action( 'it_exchange_content_store_before_permalink_element' ); ?>
    <a class="it-exchange-product-permalink btn btn-default btn-sm" href="<?php it_exchange( 'product', 'permalink', array( 'format' => 'url' ) ); ?>">
        <?php _e( 'View Details', 'it-l10n-ithemes-exchange' ); ?>
    </a>
<?php do_action( 'it_exchange_content_store_after_permalink_element' ); ?>