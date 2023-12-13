$(document).ready(function() {
    $(".puzzle-piece").draggable({
        revert: "invalid",
        cursor: "grabbing"
    });

    $(".droppable-area").droppable({
        accept: ".puzzle-piece",
        drop: function(event, ui) {
            $(ui.helper).detach().appendTo(this).removeAttr("style");
        }
    });
});
