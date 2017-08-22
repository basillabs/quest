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

    let goFundMeUrls = document.getElementsByClassName("post-meta");

    let rocketShipDivs = document.getElementsByClassName("rocket-ship-div");
    let counter = 0;

    let percents = document.getElementsByClassName("percentage-completed");

    let buttons = document.getElementsByClassName("give-button");
    console.log('buttons', buttons);
    let rockets = [];

    for (let i=0; i<rocketShipDivs.length; i++) {
      counter++;
      rocketShipDivs[i].id = "rocket-" + counter;
      rockets.push({
        index: i,
        id: "#" + rocketShipDivs[i].id,
        url: goFundMeUrls[i].outerText.substring(13)
      });
    }

    var myHeaders = new Headers();

    var myInit = { method: 'GET',
               headers: myHeaders,
               cache: 'default' };

    const API_SERVER = "https://yb6wv8088h.execute-api.us-east-1.amazonaws.com/dev/scrape?gofundmeurl=";
    console.log('rockets', rockets);
    rockets.forEach(function(rocket) {
      fetch(API_SERVER+rocket.url, myInit)
        .then((resp) => resp.json())
        .then(function(response) {

					console.log("Response: ", response);
          function liftOff(id) {
            generateStars({
              height: height * 2,
              width: width * 2,
              padding: padding,
              selector: id
            });

            generateSpaceship({
              height: height,
              width: width,
              padding: padding,
              selector: id,
							data: response
            });
          }
        liftOff(rocket.id);

        // Inject correct percentage
        let percentage = (response.current / response.total) * 100;
        percents[rocket.index].innerHTML = Math.round(percentage) + "% Completed";


        // Assign button urls
        buttons[rocket.index].parentNode.action = response.event;



      })
      .catch(function(error) {
        console.log('error', error);
      });
    });


    </script>

<?php wp_footer(); ?>

</body>
</html>
