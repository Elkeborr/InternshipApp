$(function(){ // Start this function when DOM is ready
    // Prevent post on enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    // Start click Listener
    $('#add_search_tag').click(function(e){
        let tagFieldValue = $('.tag').val();

        e.preventDefault();
    })
});