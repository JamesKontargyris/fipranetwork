(function(){
    $(".is-sticky").stick_in_parent({'sticky_class': 'is-stuck'});

    $(".unstick").trigger("sticky_kit:detach");
})();