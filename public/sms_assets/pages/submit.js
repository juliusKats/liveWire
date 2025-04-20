$(document).ready(function(){
    var submit = document.getElementById('btnSumit')
    submit.addEventListener('click', function(event){
        event.preventDefault();
    })
    $('#btnSubmit').on('click',function(){

        alert('submit')
    })

});
