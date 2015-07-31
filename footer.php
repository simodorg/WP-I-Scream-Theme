        </div>
        <footer class="mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <?php if ( !is_404() ) { get_search_form(); } ?>
          </div>
          <div class="mdl-mini-footer--right-section">
            <a href="https://twitter.com/simodorg">
              <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                <span class="visuallyhidden">Twitter</span>
              </button>
            </a>
          </div>
        </footer>
      </main>
      <div class="mdl-layout__obfuscator"></div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>