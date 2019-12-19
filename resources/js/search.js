$(function(){ // this will be called when the DOM is ready
    //prevent post on enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
        $('#searchBar').keyup(function(e) {
        
        $value = $(this).val();

        $.ajax({
            beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
            type : 'post',                    
            url : '/search',
            data:{'search': $value},
            dataType: 'json',
            success:function(res){

                if($value == ""){
                    //if value is empty then remove all links and list items
                    $(".search-result_list-link").remove();
                    $(".search-result_list-item").remove();
                    $(".search-result_list-info").remove();
                    $(".search-results").hide();
                }else{
                    //else check the response message
                    if (res.status == "fail"){
                        //if message is fail, show dropdown with empty state
                        
                        $(".search-result_list-link").remove();
                        $(".search-result_list-item").remove();
                        $(".search-result_list-info").remove();
                        $(".search-results").show();

                        let listLink = $("<a />", {
                            class: "search-result_list-link",
                            text: res.message
                        });
                        let listItem = $("<li />", {
                            class: "search-result_list-item"
                        });

                        listLink.appendTo(listItem);
                        listItem.appendTo(".search-result_list");

                    }else if (res.status == "success"){
                        //if message is success, show the dropdown
                        
                        let companyResults = res.data.Companies;
                        let internshipResults = res.data.Internships;
                        let tagsResults = res.data.Tags;

                        // console.log(internshipResults);
                        //remove all previous made search results
                        $(".search-result_list-link").remove();
                        $(".search-result_list-item").remove();
                        $(".search-result_list-info").remove();
                        $(".search-results").show();

                        if(companyResults.length>0){
                            let listInfo = $("<p />", {
                                class: "search-result_list-info",
                                text: "Bedrijven:"
                            });
                            listInfo.appendTo(".search-result_list");
                            for (let i = 0; i< companyResults.length;i++){
                            
                                let listLink = $("<a />", {
                                    class: "search-result_list-link",
                                    text: companyResults[i].name,
                                    href : "companies/" + companyResults[i].id
                                });
                                let listItem = $("<li />", {
                                    class: "search-result_list-item"
                                });

                                listLink.appendTo(listItem);
                                listItem.appendTo(".search-result_list");
                            }
                        }
                        if(internshipResults.length>0){
                            let listInfo = $("<p />", {
                                class: "search-result_list-info",
                                text: "Stageplekken:"
                            });
                            listInfo.appendTo(".search-result_list");
                            for (let i = 0; i< internshipResults.length;i++){
                            
                                let listLink = $("<a />", {
                                    class: "search-result_list-link",
                                    text: internshipResults[i].internship_function + " bij " + internshipResults[i].company.name,
                                    href : "internships/" + internshipResults[i].id
                                });
                                let listItem = $("<li />", {
                                    class: "search-result_list-item"
                                });

                                listLink.appendTo(listItem);
                                listItem.appendTo(".search-result_list");
                            }
                        }
                        if(tagsResults.length>0){
                            let listInfo = $("<p />", {
                                class: "search-result_list-info",
                                text: "Tags:"
                            });
                            listInfo.appendTo(".search-result_list");
                            for (let i = 0; i< tagsResults.length;i++){
                            
                                let listLink = $("<a />", {
                                    class: "search-result_list-link",
                                    text: tagsResults[i].internship_function + " bij " + tagsResults[i].company.name,
                                    href : "internships/" + tagsResults[i].id
                                });
                                let listItem = $("<li />", {
                                    class: "search-result_list-item"
                                });

                                listLink.appendTo(listItem);
                                listItem.appendTo(".search-result_list");
                            }
                        }
                    }else{
                        $(".search-result_list-link").remove();
                        $(".search-result_list-item").remove();
                        $(".search-result_list-info").remove();
                        $(".search-results").hide();
                        
                    }
                }
            }
        })
    }); 
    // on focusout, remove the dropdown
    $('.search').focusout(function(){
        //setTimeout for clicking on dropdown link
        //otherwise it removes the dropdown on clicking the link
        setTimeout(function(){ 
            $("#searchBar").val("");
            $(".search-result_list-link").remove();
            $(".search-result_list-item").remove();
            $(".search-result_list-info").remove();
            $(".search-results").hide(); 
        }, 100);
    })
});