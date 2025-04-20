$(document).ready(function(){
    var initStep =document.getElementById('currentStep')
    var finalStep = document.getElementById('totalSteps')
    var nextStep= document.getElementById('nextStep')

    let ValInitStep =parseInt(initStep.innerText)
    let ValFinalStep = parseInt(finalStep.innerText)
    let ValNextStep= parseInt(nextStep.innerText)

    var Next=document.getElementById("btnNext");
    var Previous=document.getElementById("btnPrevious");
    var Submit=document.getElementById("btnSubmit");
    var stepDisplay=document.getElementById("step-count");

    var step1=document.getElementById("step1");
    var step2=document.getElementById("step2");
    var step3=document.getElementById("step3");
    var step4=document.getElementById("step4");
    var step5=document.getElementById("step5");
    var step6=document.getElementById("step6");
    var step7=document.getElementById("step7");
    var step8=document.getElementById("step8");

    $("#btnNext").on('click',function(){
        // nextStep.innerText =  ValNextStep++;

        if(ValNextStep < ValFinalStep){
            nextStep.innerText =  ValNextStep++;
        }
        if(nextStep.innerText ==2){
            step1.setAttribute('hidden','hidden');
            step2.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText ==3){
            step1.setAttribute('hidden','hidden');
            step2.setAttribute('hidden','hidden');
            step3.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText ==4){
            step1.setAttribute('hidden','hidden')
            step2.setAttribute('hidden','hidden');
            step3.setAttribute('hidden','hidden');
            step4.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText ==5){
            step1.setAttribute('hidden','hidden')
            step2.setAttribute('hidden','hidden');
            step3.setAttribute('hidden','hidden');
            step4.setAttribute('hidden','hidden');
            step5.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText ==6){
            step1.setAttribute('hidden','hidden')
            step2.setAttribute('hidden','hidden');
            step3.setAttribute('hidden','hidden');
            step4.setAttribute('hidden','hidden');
            step5.setAttribute('hidden','hidden');
            step6.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText ==7){
            step1.setAttribute('hidden','hidden')
            step2.setAttribute('hidden','hidden');
            step3.setAttribute('hidden','hidden');
            step4.setAttribute('hidden','hidden');
            step5.setAttribute('hidden','hidden');
            step6.setAttribute('hidden','hidden');
            step7.removeAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }
        if(nextStep.innerText == 8){
            step1.setAttribute('hidden','hidden')
            step2.setAttribute('hidden','hidden');
            step3.setAttribute('hidden','hidden');
            step4.setAttribute('hidden','hidden');
            step5.setAttribute('hidden','hidden');
            step6.setAttribute('hidden','hidden');
            step7.setAttribute('hidden','hidden');
            step8.removeAttribute('hidden','hidden');
            Next.setAttribute('hidden','hidden');
            Previous.removeAttribute('hidden','hidden');
            Submit.removeAttribute('hidden','hidden')
            stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        }

    });
    $("#btnPrevious").on('click',function() {
        var Prev =parseInt(nextStep.innerText);
        if (Prev>1) {
            Prev--
            nextStep.innerText = Prev--;
        }
        console.log(Prev--);
        // if(ValNextStep < ValFinalStep){
        //     nextStep.innerText =  ValNextStep--;
        //     stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        // }
        // if (ValNextStep > 1) {
        //     $newSub = ValNextStep --;
        //     if($newSub !=0){
        //     stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        //     Submit.setAttribute('hidden','hidden');
        //     Next.removeAttribute('hidden','hidden');
        //     }
        // }
        // stepDisplay.innerText = "Step "+nextStep.innerText+ " Out of 8";
        //
    });
});
