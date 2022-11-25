$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content")
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            curInputs2 = curStep.find("textarea"),
            curInputs3 = curStep.find("select"),
            isValid = true;
        //console.log(curInputs)
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        for(var i=0; i<curInputs2.length; i++){
            if (!curInputs2[i].validity.valid){
                isValid = false;
                $(curInputs2[i]).closest(".form-group").addClass("has-error");
            }
        }


        for(var i=0; i<curInputs3.length; i++){
            if (!curInputs3[i].validity.valid){
                isValid = false;
                $(curInputs3[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
                curStepBtn.disabled = true;
    });
    
    $('div.setup-panel div a.btn-primary').trigger('click');
});
