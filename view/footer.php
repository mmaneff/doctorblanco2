            <div class="col-xs-12 pd-0">
                <footer class="footer-distributed">
	                <div class="footer-right">
		                <a href="https://www.facebook.com/DrBlancoCirugiaEsteticayReparadora?ref=hl"><i class="fa fa-facebook"></i></a>
		              </div>
	                <div class="footer-left">
		                <p class="footer-links">
			                <a href="index.php">info@drblanco.com.ar</a>
		                </p>
		                <p>Copyright 2018 - Todos los derechos reservados</p>
	                </div>
                </footer>
            </div>
        </div>

        <script src="assets/js/jquery-1.11.2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/ini.js"></script>
        <script src="assets/js/jquery.anexsoft-validator.js"></script>
        <script type="text/javascript">
          function initQuoteCarousel() {

            var $quotesWrapper = $(".cust-quotes");
            var $quotes = $quotesWrapper.find("blockquote");

            if (!$quotes.length) {
                return;
            }

            var selectNextQuote = function () {
                // keep move first quote in dom to the end to make continous
                var $quote = $quotesWrapper.find("blockquote:first").detach().appendTo($quotesWrapper);

                setTimeout(selectNextQuote, $quote.data("timeout"));
            };

            setTimeout(selectNextQuote, $quotes.filter(":first").data("timeout"));

          }

          $(function () {
            $("ul.nav li a[href^='#']").click(function(){
                $("html, body").stop().animate({
                    scrollTop: $($(this).attr("href")).offset().top
                }, 400);
            });

            initQuoteCarousel();
          });
        </script>
    </body>
</html>
