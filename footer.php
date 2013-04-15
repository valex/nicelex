    </div><!-- #main .wrapper -->
    <footer id="colophon" role="contentinfo">
        <div class="site-info">
            <?php do_action( 'nicelex_credits' ); ?>
            <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'nicelex' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'nicelex' ); ?>"><?php printf( __( 'Proudly powered by %s', 'nicelex' ), 'WordPress' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( __( '%1$s by %2$s.', 'nicelex' ), 'Nicelex Theme', '<a href="http://valex.net.ru/" rel="designer">VAlex</a>' ); ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>