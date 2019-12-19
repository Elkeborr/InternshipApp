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
                class: "tag-item"
                // ,text: tagFieldValue
            });
            // Make link for removing a tag
            let removeListItem = $("<a />", {
                href: 'javascript:void(0);',
                class: 'tag-remove'
                ,text: tagFieldValue
            });
            // Push value into array
            $tagArray.push(tagFieldValue);
            // Append li into ul and clear value
            removeListItem.appendTo(listItem);
            listItem.appendTo(tagList);
            $('.tag').val('');

            $('#tags-hidden').val($tagArray);
            console.log("hidden input value: " + $('#tags-hidden').val());
        }
        e.preventDefault();
    })

    $('.tag-list').on('click',"a.tag-remove", function(e){
        let tagRemoveLink = $(this);
        let tagListItem = $(this).parent();
        // console.log(tagListItem);
        // Get text of item you want to remove
        let removeVal = $(this).parent().text();

        // Remove item from array
        $tagArray = $.grep($tagArray, function(newTagArray){
            return newTagArray != removeVal;
        })

        // Put new array in hidden field
        $('#tags-hidden').val($tagArray);
        tagRemoveLink.remove();
        tagListItem.remove();
        console.log("hidden input value: " + $('#tags-hidden').val());

        e.preventDefault();
    })
});