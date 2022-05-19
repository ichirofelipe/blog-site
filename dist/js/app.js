$(function() {

    //ON LOAD FUNCTIONS
    renderCaptcha();


    //HIDE ELEMENT ON CLICK OUTSIDE    
    $(document).on('click', function(){
        $(".dropdown").removeClass('active');
        $(".dropdown").parent().removeClass('active');
    });
    //DROPDOWN
    $(".dropdown").parent().on('click', function (e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        $(this).find('.dropdown').toggleClass('active');
    });

    $(document).on('click', ".modal__close", function(){
        removeModal()
    });
    //TOGGLE MODAL
    $(document).on('click', "[data-toggle]", function (){
        $to_toggle = $(this).data('toggle');

        if($to_toggle == 'modal'){
            if($('#modal').length)
                removeModal(false)

            $target = $(this).data('target');
            
            $.ajax({
                url: `../../views/components/modal/${$target}.php`,
                success: function(html){
                    $('body .content').append(html);
                    $('body,html').addClass('disable');
                    renderCaptcha();

                }
            })
        }
    });
    //REFRESH CAPTCHA
    $(document).on('click','.captcha__refresh', function (){
        renderCaptcha();
    });
    //DISABLE CATPCHA CLICK EVENTS
    $(document).on('mousedown', '.captcha__container', function(e) {
        e.preventDefault();
    })
    //TOGGLE MENU BURGER
    $(".menu-btn__burger").on('click', function (){
        let target = $(this).data('target');
        $(this).toggleClass('open');
        $(target).toggleClass('open');
    });









    function validateCaptcha(str){
        let captcha = removeSpaces($('#captcha').val());
        let input = removeSpaces($('#captcha-input').val());

        if(captcha == input)
            return true
        return false
    }
    //REMOVE MODAL
    function removeModal(remove = true){
        $('#modal').remove()
        if(remove)
            $('body,html').removeClass('disable');
    }
    //RENDER CAPTCHA
    function renderCaptcha(){
        $('.captcha').each(function (){
            let code = generateCaptcha();
            let num1 = generateNumber();
            let num2 = generateNumber();
            $(this).val(code).attr('style',`transform: skew(${num1}deg, ${num2}deg);`);
        });

    }
    //GENERATE RANDOM NUMBER
    function generateNumber(max = 10, hasNegative = true){
        var num = Math.floor((Math.random() * 10) + 1);
        if(hasNegative)
            num *= Math.random() < 0.5 ? -1 : 1;
        return num;
    }
    //GENERATE CODE FOR CAPTCHA
    function generateCaptcha(length = 5) {
        var alpha = 'abcdefghijklmnopqrstuvwxyz123456789'.split('');
        alpha.map((value) => {
            if(!isNumeric(value))
                alpha.push(value.toUpperCase());
        });
        var tmpCode = [];
        
        for (var i = 0; i < length; i++) {
           tmpCode[i] = alpha[Math.floor(Math.random() * alpha.length)];
        }
        var code = tmpCode.join('');
        return code;
    }

    //CHECK IF STRING IS NUMERIC
    function isNumeric(str) {
        if (typeof str != "string") return false
        return !isNaN(str) &&
               !isNaN(parseFloat(str))
    }
    //REMOVE SPACES
    function removeSpaces(string) {
        return string.split(' ').join('');
    }

});