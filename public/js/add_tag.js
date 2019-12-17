$(function(){ // Start this function when DOM is ready
    // Prevent post on enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $tagArray = [];
    // Start click Listener
    $('#add_search_tag').click(function(e){

        // Take tag value and append in list
        let tagFieldValue = $('.tag').val();

        // Start when value isn't empty
        if(tagFieldValue != ''){
            // Find ul-list and make li
            let tagList = $('.tag-list');
            let listItem = $('<li />',{
                class: "tag-item",
                text: tagFieldValue
            });
            // Push value into array
            $tagArray.push(tagFieldValue);
            // Append li into ul and clear value
            listItem.appendTo(tagList);
            $('.tag').val('');

            $('#tags-hidden').val($tagArray);
            console.log("hidden input value: " + $('#tags-hidden').val());
        }
        

        e.preventDefault();
    })
});