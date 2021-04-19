var BootstrapDaterangepicker = {
    init: function() {
        ! function() {
            $("#session-range").daterangepicker({
                locale: {
                    format: "DD/MM/YYYY",
                    firstDay: 1
                },
                buttonClasses: "m-btn btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            });

        }();
    }
};
jQuery(document).ready(function() {
    BootstrapDaterangepicker.init()
});
