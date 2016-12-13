;(function($) {

    var A2Zpm_Scripts = {

        init: function() {
            $('body').on( 'click', '#a2zpm-add-new-prject' , this.project.addNewProject );
            $('body').on( 'submit', 'form#a2zpm-new-projects-form' , this.project.saveProject );
        },

        project: {

            addNewProject: function(e) {
                e.preventDefault();

                var newPorjectTemplate = wp.template( 'a2zpm-new-project' );

                $.magnificPopup.open({
                    fixedContentPos: true,
                    items: {
                        src: newPorjectTemplate().trim(),
                        type: 'inline'
                    },
                });
            },

            saveProject: function(e) {
                e.preventDefault();

                var data = {
                    action: 'a2zpm-project-create',
                    _wpnonce : a2zpm._wpnonce,
                    form_data: $(this).serialize()
                };

                $.post( a2zpm.ajaxurl, data, function(resp) {
                    if ( resp.success ) {
                        window.location.reload();
                    }
                });
            }
        }
    }

    $(document).ready( function() {
        A2Zpm_Scripts.init();
    });

})(jQuery);