  <div class="cheatsheet-signup">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="cheatsheet-signup-title">
            Outsmart everyone. Get our cheat sheets in your inbox!
          </h4>

          <div class="row">
            <div class="col-sm-6 col-centered col-xs-12">
              <form id="newsletterSignUp" action="">
                <div class="input-group input-group-lg input-cheatsheet-signup">
                  <input id="newsletterName" name="newsletterName" type="text" class="form-control" required placeholder="Your email address">
                  <span class="input-group-btn">
                    <button id="btn-newsletterSubmit" class="btn btn-default" type="submit">Subscribe</button>
                  </span>
                </div><!-- /input-group -->
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <?php dynamic_sidebar('footer-1'); ?>
        <?php dynamic_sidebar('footer-2'); ?>
        <?php dynamic_sidebar('footer-3'); ?>
        <?php dynamic_sidebar('footer-4'); ?>
      </div>

      <div class="footer-bottom">
        <div class="row">
          <div class="col-md-8 footer-bottom-left">
            <a href="/" class="top-logo" title="Back to front page">
              YOUniversity.my
            </a>
            <h5 class="footer-bottom-tagline">The #1 Comparison Website for Educational Products in Malaysia</h5>
          </div>

          <?php
            $navArgs = array(
              'theme_location'  => 'footer_copyright',
              //'menu' => 'Footer Copyright',
              'container_class' => 'col-md-4 footer-bottom-right',
              'items_wrap'      => '<ul id="%1$s" class="%2$s list-unstyled list-inline footer-bottom-links">%3$s</ul>'
              );
            wp_nav_menu( $navArgs );
          ?>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
