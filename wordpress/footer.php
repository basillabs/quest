<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quest
 */

?>
	</div><!-- #content -->

		<link rel="stylesheet" href="https://unpkg.com/tachyons@4.7.0/css/tachyons.min.css"/>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/quest/js/spaceship.js"></script>
    <script src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/quest/js/stars.js"></script>

        <script>
    var height = 400;
    var width = 200;
    var padding = {top: 40, bottom: 55, right: 20, left: 20 };
    var selector = "#canvas";

    // liftOff("00");
    // liftOff("01");
    // liftOff("02");

    let goFundMeUrls = document.getElementsByClassName("post-meta");
    goFundMeUrls[1].outerText.substring(13));

    var myHeaders = new Headers();

    var myInit = { method: 'GET',
               headers: myHeaders,
               mode: 'no-cors',
               cache: 'default' };

    const API_SERVER = "https://yb6wv8088h.execute-api.us-east-1.amazonaws.com/dev/scrape?gofundmeurl=";

		goFundMeUrls.forEach(function(url) {
			fetch(API_SERVER+url.outerText.substring(13), myInit)
	      .then(function(response) {
					var id = url.outerText.substring(13));
					function liftOff(id) {
			      generateStars({
			        height: height * 2,
			        width: width * 2,
			        padding: padding,
			        selector: selector + id
			      });

			      generateSpaceship({
			        height: height,
			        width: width,
			        padding: padding,
			        selector: selector + id
			      });
			    }

					liftOff(id);
	    });
		})


    </script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
