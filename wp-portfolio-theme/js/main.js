/**
 * File main.js.
 *
 * Contains majority of the theme scripts
 */
( function( $ ) {
    
    // directory uri
    template_directory = directory_name.templateUrl;

    // portfolio view image handler
    $( '#portfolio-wrapper .view-image' ).on('click', function() {

        $img_src = $(this).next().find('img').attr('src');
        // clone the title of the portfolio that was clicked on and append it to our container
        $title_div = $(this).next().next().clone();

        $img = $('#view-image-container .content-wrapper img');

        // make the container visible
        $('#view-image-container').css('display', 'flex');

        // append the title 
        $('#view-image-container .content-wrapper').append($title_div);
        // set image src
        $img.attr('src', $img_src);
    });

    // portfolio close view-image
    $('#view-image-container .close').on('click', function() {
        // remove post-title div first
        $(this).next().remove();
        // then hide the whole container
        $(this).parent().parent().css('display', 'none');
    });

    // all hover effects
    $('#header-search-btn').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/search-icon-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/search-icon-normal.png');
    });

    $('#social-facebook').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/facebook-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/facebook.png');
    });

    $('#social-gp').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/gp-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/gp.png');
    });

    $('#social-linkedin').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/linkedin-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/linkedin.png');
    });

    $('#social-pin').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/pin-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/pin.png');
    });

    $('#social-twitter').hover( function() {
        $(this).attr('src', template_directory + '/assets/images/twitter-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/images/twitter.png');
    });

}) ( jQuery );

