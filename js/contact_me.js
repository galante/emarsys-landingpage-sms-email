$(function() {

    // This function is used for the Contact form and modal
    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();

            // Set email to the value in the Conact Field and Modal. This assumes only one is set
            var email = $("input#email").val() + $("input#Modalemail").val();
            var phone = $("input#phone").val() + $("input#Modalphone").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "https://demo.emarsys.net/u/register.php",
                type: "GET",
                dataType: 'jsonp',
                data: {
                    CID: '210036400',
                    SID: '',
                    UID: '',
                    f: '100001915',
                    p: '2',
                    a: 'ccs',
                    el: '',
                    endlink : '',
                    llid : '',
                    c: '',
                    counted: '',
                    RID: '100000032',
                    mailnow: '',
                    inp_1: firstName,
                    inp_2: name,
                    inp_3: email,
                    inp_100002593: phone,
                    subject: "New Contact",
                    msg: message
                },
                cache: false,
                success: function() {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                    $('#myModal').modal('hide');
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                    $('#myModal').modal('hide');
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });


    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
