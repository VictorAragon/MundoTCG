$(function() {

    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: maxSlider,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "R$ " + $( "#slider-range" ).slider( "values", 0 ) + " -- R$ " + $( "#slider-range" ).slider( "values", 1 ) );

});