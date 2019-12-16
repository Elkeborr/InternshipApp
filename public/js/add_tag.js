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

        // Take tag value and append in list
        let tagFieldValue = $('.tag').val();

        if(tagFieldValue != ''){
            let tagList = $('.tag-list');
            let listItem = $('<li />',{
                text: tagFieldValue
            });

            listItem.appendTo(tagList);
            $('.tag').val('');
        }
        
        e.preventDefault();
    })
});