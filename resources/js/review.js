// Get the modal
var modal = document.getElementById("myModal");

// Get the main container and the body
var body = document.getElementsByTagName("body");

// Get the open button
var btnOpen = document.querySelector(".myBtn");

// Get the close button
var btnClose = document.getElementById("closeModal");

// Open the modal
btnOpen.onclick = function() {
    modal.className = "Modal is-visuallyHidden";
    setTimeout(function() {
        body.className = "MainContainer is-blurred";
        modal.className = "Modal";
    }, 100);
    body.className = "ModalOpen";
};

// Close the modal
btnClose.onclick = function() {
    modal.className = "Modal is-hidden is-visuallyHidden";
    body.className = "";
    body.className = "MainContainer";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.className = "Modal is-hidden";
        body.className = "";
        body.className = "MainContainer";
    }
};
var $star_rating = $("#stars_review .star");

var SetRatingStar = function() {
    return $star_rating.each(function() {
        if (
            parseInt($star_rating.siblings("input.rating-value").val()) >=
            parseInt($(this).data("rating"))
        ) {
            return $(this)
                .removeClass("fa-star-o")
                .addClass("fa-star");
        } else {
            return $(this)
                .removeClass("fa-star")
                .addClass("fa-star-o");
        }
    });
};

$star_rating.on("click", function() {
    $star_rating.siblings("input.rating-value").val($(this).data("rating"));
    return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {});
