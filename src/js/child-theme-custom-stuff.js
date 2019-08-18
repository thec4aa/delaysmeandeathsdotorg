// var countup = require('countup.js');
 
// var output = countup.without([1, 2, 3], 1);
// console.log(output);


// Adding class for skyline fade-in 
// Steve Lambert November 16, 2017 
(function($) {

    $(function() {
      var $window = $(window),
        $body = $('body');
      // Disable animations/transitions until the page has loaded.
         $body.addClass('is-loading');

        $window.on('load', function() {
          window.setTimeout(function() {
            $body.removeClass('is-loading');
          }, 100);
          console.log("bing" );

        });
      });
})(jQuery);

// Day and Death Calculations


function getDayCount(){
    dateTaskForce = new Date('15 Sept 2016 GMT-0800') // PST is GMT-0800
    dateToday = new Date(); // get the time -- based on the users computer, not the server!
    diffSeconds = Math.abs(dateToday - dateTaskForce)/1000; // calculate diff in seconds (Date objects use milliseconds)
    numberDays = diffSeconds/86400;  // 86400 seconds in one day
    numberDays = Math.floor(numberDays); // convert to integer
    return numberDays; // return
}


function getDeathCount(){
    days = getDayCount(); 
    deathToll = days*0.9095890411; 
    deathToll = Math.floor(deathToll); // convert to integer
    return deathToll;
}

// Check if we're on the home page. If so, run the countup JS
if (document.querySelector('.home') !== null)
{
     // Class exists


  // CountUp Stuff

  // outCubic Easing Function
  var easingFn = function(t, b, c, d) {
  var ts = (t /= d) * t;
  var tc = ts * t;
  return b + c * (tc + -3 * ts + 3 * t);
  }

  var options = {
    useEasing: true,
    easingFn: easingFn,
    useGrouping: true,
    separator: ',',
    decimal: '.',
  };


  var deathTollCountUp = new CountUp('deathcount', 0, getDeathCount(), 0, 18, options);
    if (!deathTollCountUp.error) {
    deathTollCountUp.start();
    } else {
      console.error(deathTollCountUp.error);
  }

  var numberDaysCountUp = new CountUp('daycount', 0, getDayCount(), 0, 10.5, options);
    if (!numberDaysCountUp.error) {
    numberDaysCountUp.start();
    } else {
      console.error(numberDaysCountUp.error);
  }

}
