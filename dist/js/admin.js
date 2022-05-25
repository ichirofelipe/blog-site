$(function() {

    /*=====================*\
            ONLOAD
    \*=====================*/

    animateAlert();

    /*=====================*\
        END OF ONLOAD
    \*=====================*/


    

    /*=====================*\
            DROPDOWN
    \*=====================*/

    //HIDE ELEMENT ON CLICK OUTSIDE    
    $(document).on('click', function(){
        $(".dropdown").removeClass('active');
        $(".dropdown").parent().removeClass('active');
    });
    //DROPDOWN
    $(".dropdown").parent().on('click', function (e) {
        $(this).siblings().find('.dropdown').removeClass('active');
        $(this).siblings().find('.dropdown').parent().removeClass('active');
        e.stopPropagation();
        $(this).toggleClass('active');
        $(this).find('.dropdown').toggleClass('active');
    });

    /*=====================*\
        END OF DROPDOWN
    \*=====================*/





    
    /*=====================*\
              MENU
    \*=====================*/

    //TOGGLE MENU BURGER
    $(".menu-btn__burger").on('click', function (){
        let target = $(this).data('target');
        $(this).toggleClass('open');
        $(target).toggleClass('open');
    });

    /*=====================*\
           END OF MENU
    \*=====================*/





    /*=====================*\
              FORMS
    \*=====================*/
    
    //TOGGLE PASSWORD HIDE/SHOW
    $(document).on('click', '.form__toggle-password', function (){
        let type = $(this).prev().attr('type');
        $(this).toggleClass('icon-eye icon-eye-off');
        if(type == 'password'){
            $(this).prev().prop("type", "text");
            return;
        }
        $(this).prev().prop("type", "password");
    });
    //ON SUBMIT FORM VALIDATION
    $(document).on('submit', '.form--validate', function (e){
        let errors = validateForm($(this));
        if(errors.length == 0)
            return;
        e.preventDefault();
        renderErrors($(this), errors);
    })
    
    
    //DISPLAY ERRORS
    function renderErrors(el, errors){
        el.find('.form__group--error').removeClass('form__group--error').next().remove();
        errors.map(function (error) {
            let parent = el.find(`[name=${error.name}]`).parent();
            if(!parent.hasClass('form__group--error')){
                parent.addClass('form__group--error');
                parent.after(`<small class="form__error">${error.message}</small>`);
            }
        })
    }
    //FORM VALIDATION
    function validateForm(form){
        var errors = [];
        
        //FIND ALL INPUT WITH ATTRIBUTE [data-rules]
        form.find('[data-rules]').each(function () {
            let el = $(this);
            let name = el.attr('name');
            let fieldname = el.data('fieldname');
            let rules = el.data('rules').split(',');
            rules.map(function (rule){
                switch(rule){
                    case 'required':
                        if(isEmpty(el.val()))
                            errors.push({name: name,message: `${fieldname} is required`})
                        if(el.val() == 'check' && !el.is(":checked"))
                            errors.push({name: name,message: `Please accept ${fieldname} to continue`})
                        break;
                    case 'confirm':
                        let pass = $(el.data('confirm'));
                        if(el.val() != pass.val())
                            errors.push({name: name,message: `${fieldname} does not match`})
                        break;
                    default:
                        if(rule.split(':').length != 2)
                            break;
                        let newrule = rule.split(':');
                        if(el.val().length > newrule[1] && newrule[0] == 'max')
                            errors.push({name: name,message: `${fieldname} must not be more than ${newrule[1]} characters`})
                        if(el.val().length < newrule[1] && newrule[0] == 'min')
                            errors.push({name: name,message: `${fieldname} must not be less than ${newrule[1]} characters`})
                        break;
                }
            });
        });

        return errors;
    }
    //CHECK IF INPUT IS EMPTY
    function isEmpty(str){
        return (!str || str.length === 0 );
    }

    /*=====================*\
          END OF FORMS
    \*=====================*/


    



    /*=====================*\
             ALERT
    \*=====================*/

    function animateAlert(){
        if($('.alert__notify').length){
            $('.alert__notify').addClass('active').delay(4000).queue(function(nxt) {
                $(this).addClass('done').delay(1000).queue(function(nxt2) {
                    $(this).remove();
                    nxt2();
                });
                nxt();
            });
        }
    }

    /*=====================*\
           END OF ALERT
    \*=====================*/

});