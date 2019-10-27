    <footer class="main-footer">
      <section class="social">
        <h3>Stay connected and up-to-date:</h3>
        <?php $this->view_component('tweets'); ?>
        <?php $this->view_component('social_media'); ?>
        <?php $this->view_component('newsletter'); ?>
      </section>
      <section class="block footer">
        <p class="copyright">&copy; The Multipack</p>
        <p class="license">
          <span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">The Multipack website</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/">Creative Commons License</a> and is open-sourced on <a href="//github.com/multipack/website" title="Multipack on Github">Github</a>.
        </p>
      </section>
    </footer>
  </div>

  <!-- JavaScript at the bottom for fast page loading -->
  <script src="/js/libs/jquery-1.7.1.min.js"></script>
  <!-- defer tells the browser to wait for DOM load before running -->
  <script defer src="/js/script.min.js"></script>

  <!-- Google Analytics -->
  <script>var _gaq=[['_setAccount','UA-32139617-1'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src='//www.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'))</script>

</body>
</html>
