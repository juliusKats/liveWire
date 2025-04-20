
    function CHECK(){
        var both = document.getElementById('both').checked
        var father = document.getElementById('father').checked
        var mother= document.getElementById('mother').checked
        var other = document.getElementById('other').checked

        var DIVF = document.getElementById("bothF")
        var DIVM = document.getElementById("bothM")
        var DIVO = document.getElementById("bothG")
        if(both){
            console.log("living with both Parents");
            DIVF.removeAttribute('hidden', 'hidden');
            DIVM.removeAttribute('hidden', 'hidden');
            DIVO.setAttribute('hidden', 'hidden');

        }
        else if(father){
             console.log("living with Father");
            DIVF.removeAttribute('hidden', 'hidden');
            DIVM.setAttribute('hidden', 'hidden');
            DIVO.setAttribute('hidden', 'hidden');
        }
        else if(mother){
             console.log("living with mother");
             DIVM.removeAttribute('hidden', 'hidden');
            DIVF.setAttribute('hidden', 'hidden');
            DIVO.setAttribute('hidden', 'hidden');
        }
        else if(other){
             console.log("living with Guardian");
              DIVO.removeAttribute('hidden', 'hidden');
            DIVF.setAttribute('hidden', 'hidden');
            DIVM.setAttribute('hidden', 'hidden');
        }
    }
    function MEDICAL(){
        var NMedical = document.getElementById('no').checked
        var YMedical = document.getElementById('yes').checked
        var MedicalBox = document.getElementById('medical')

        if(YMedical){
            MedicalBox.removeAttribute('hidden', 'hidden');
        }
        else if(NMedical){
            MedicalBox.setAttribute('hidden', 'hidden');
        }

    }


function classt() {
    var cls = document.getElementById("classy");
    var PLE = document.getElementById("ple");
    var UCE = document.getElementById("uce");

    if (cls.value == 1) {
        PLE.removeAttribute('hidden', 'hidden');
        UCE.setAttribute('hidden', 'hidden');
    } else if (cls.value == 5) {
        UCE.removeAttribute('hidden', 'hidden');
        PLE.setAttribute('hidden', 'hidden');
    } else {
        PLE.setAttribute('hidden', 'hidden');
        UCE.setAttribute('hidden', 'hidden');

    }
}

function Admit() {
    // Genders()
    var Gender = document.getElementById("gender").value;
    var Agg = document.getElementById("totalagg");

    if (Gender == "Male" && (Agg.value > 10)) {
        Agg.setAttribute('class', 'form-control text-white bg-danger')

    } else if (Gender == "Male" && (Agg.value > 15)) {
        Agg.setAttribute('class', 'form-control text-white bg-danger')
    } else {
        Agg.setAttribute('class', 'form-control text-white bg-success')
    }

}

$('.agg').keyup(function() {
    var sum = 0;
    $('.agg').each(function() {
        sum += Number($(this).val());
        // console.log(sum);
    });
    $('#totalagg').val(sum);
    Admit();
})

$('.OAgg').keyup(function() {
    var sum = 0;
    $('.OAgg').each(function() {
        sum += Number($(this).val());
        console.log(sum);
    });
    $('#totOAgg').val(sum);
})



$('.txtsubj').on('click',function(){

    var PP = $(this).val(); //value of selceted chechck box
    var isChecked = document.getElementsByClassName("OAgg")
    var countChecked = document.querySelectorAll('input[name=selSubj]:checked').length //counting number of selected subjects
    var MaxSubj = 10
    var chkdBox = $(this).is(":checked") //checking of the check box is selected

    if(chkdBox ){
        if(MaxSubj == countChecked){
            document.getElementById('strongSubjects').innerHTML = "You Have Reached The Maximum number of Subjects allowed"
            for(var i=0; i<isChecked.length; i++){
                isChecked[i].setAttribute('readonly','readonly')
            }
        }
        else{
             document.getElementById('strongSubjects').innerHTML ="You Have Selected " +countChecked+ " Subjects Out of 10 Subjects"
             for(var i=0; i<isChecked.length; i++){
                isChecked[i].removeAttribute('readonly','readonly')
            }
        }
    }
    else{
        if(MaxSubj == countChecked){
            document.getElementById('strongSubjects').innerHTML = "You Have Reached The Maximum number of Subjects allowed"
            for(var i=0; i<isChecked.length; i++){
                isChecked[i].setAttribute('readonly','readonly')
            }
        }
        else{
             document.getElementById('strongSubjects').innerHTML ="You Have Selected " +countChecked+ " Subjects Out of 10 Subjects"
             for(var i=0; i<isChecked.length; i++){
                isChecked[i].removeAttribute('readonly','readonly')
            }

        }
    }
})

$('#classy').on('change', function(){
    var classid =document.getElementById('classy').value;
    var ASection=document.getElementById('AdvancedSection')
    if(classid>4){
        ASection.removeAttribute('hidden','hidden');
    }
    else{
        ASection.setAttribute('hidden','hidden');
    }
})



