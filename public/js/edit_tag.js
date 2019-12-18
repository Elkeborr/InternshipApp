$(function(){ // Start this function when DOM is ready
    // Prevent post on enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    $tagArray = [];

    let listItems = Array.from(document.querySelectorAll('a.tag-remove'));
    
    // Put all text from .tag-remove into the array
    for(var i = 0; i < listItems.length; i++){
        $tagArray.push(listItems[i].text);
    }

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
            console.log($tagArray)
        }
        e.preventDefault();
    })

    $('.tag-list').on('click',"a.tag-remove", function(e){

        let tagRemoveLink = $(this);
        let tagListItem = $(this).parent();

        // Get text of item you want to remove
        let removeVal = $(this).parent().text();

        // Remove item from array
        $tagArray = $.grep($tagArray, function(newTagArray){
            return newTagArray != removeVal;
        })

        // Put new array in hidden field and remove old link and listitem
        $('#tags-hidden').val($tagArray);
        tagRemoveLink.remove();
        tagListItem.remove();

        e.preventDefault();
    })
});