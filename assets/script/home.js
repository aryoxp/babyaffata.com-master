/**
 * Created with JetBrains PhpStorm.
 * User: aryo
 * Date: 7/12/13
 * Time: 7:28 AM
 * To change this template use File | Settings | File Templates.
 */

$(function() {
    // Handler for .ready() called.
});

$(window).load(function(){
    $( '#brand-slider' ).lemmonSlider({
        'infinite' : true
    });

    $('.next-page').click(function(){
        $( '#brand-slider').trigger('nextPage');
    });

    $('.prev-page').click(function(){
        $( '#brand-slider').trigger('prevPage');
    });
});

