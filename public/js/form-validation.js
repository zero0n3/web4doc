// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='addcheckup']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            altezza: "required",
            peso: "required",
            tricipite_R: "required",
            tricipite_L: "required",
            petto_R: "required",
            petto_L: "required",
            ascella_R: "required",
            ascella_L: "required",
            iliaca_R: "required",
            iliaca_L: "required",
            addominale_R: "required",
            addominale_L: "required",
            coscia_R: "required",
            coscia_L: "required",
            braccio_R: "required",
            braccio_L: "required",
            gamba_R: "required",
            gamba_L: "required",
            spalle: "required",
            petto: "required",
            anche: "required",
            spirometria: "required",
            frq_riposo: "required",
            frq_stress: "required",
            frq_1min: "required",
            step1: "required",
            step2: "required",
            step3: "required",

        },
        // Specify validation error messages
        messages: {
            altezza: "Campo obbligatorio",
            peso: "Campo obbligatorio",
            tricipite_R: "Campo obbligatorio",
            tricipite_L: "Campo obbligatorio",
            petto_R: "Campo obbligatorio",
            petto_L: "Campo obbligatorio",
            ascella_R: "Campo obbligatorio",
            ascella_L: "Campo obbligatorio",
            iliaca_R: "Campo obbligatorio",
            iliaca_L: "Campo obbligatorio",
            addominale_R: "Campo obbligatorio",
            addominale_L: "Campo obbligatorio",
            coscia_R: "Campo obbligatorio",
            coscia_L: "Campo obbligatorio",
            braccio_R: "Campo obbligatorio",
            braccio_L: "Campo obbligatorio",
            gamba_R: "Campo obbligatorio",
            gamba_L: "Campo obbligatorio",
            spalle: "Campo obbligatorio",
            petto: "Campo obbligatorio",
            anche: "Campo obbligatorio",
            spirometria: "Campo obbligatorio",
            frq_riposo: "Campo obbligatorio",
            frq_stress: "Campo obbligatorio",
            frq_1min: "Campo obbligatorio",
            step1: "Campo obbligatorio",
            step2: "Campo obbligatorio",
            step3: "Campo obbligatorio",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
