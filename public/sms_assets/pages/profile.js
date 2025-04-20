$(document).ready(function() {
    $('#SaveAuthDataBtn').on('click', function() {
        var userinput = document.getElementById('passVerifyInput').value;
        var userid = document.getElementById('userid').innerText;
        var URL = "Users/enable/"+ userid+"/twoAuth"
        // console.log(URL);


        if (userinput === "") {
            document.getElementById('passErr').innerHTML = "Password is required"
            document.getElementById('passErr').setAttribute('class', 'text text-danger')
            document.getElementById('passVerifyInput').setAttribute('focus', 'focus')
        } else {
            document.getElementById('passErr').innerHTML = ""

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            $.ajax({
                url: URL,
                type: 'POST',
                data: {
                    'userid': `{{ Auth::user()->id }}`,
                },
                success: function (data) {
                    console.log(data)
                }
            })
        }
    });


    var showcodebox = document.getElementById('showbox')
    var showstorecode =document.getElementById('codestore');
    var gencodebox=document.getElementById('generatebox')
    var showdivision    =document.getElementById('showdiv');
    $('#showcodes').on('click',function(){
        showstorecode.innerText ="Store these recovery codes in a secure password manager.\n" +
            "They can be used to recover access to your account if " +
            " your two factor authentication device is lost.\n";
        showcodebox.setAttribute('class','align-content-center rounded-lg')
        showcodebox.removeAttribute("hidden","hidden")
        gencodebox.removeAttribute("hidden","hidden")
        showdivision.setAttribute("hidden","hidden")

    })

    $('#disableauth').on('click',function(){
        alert("Disable Code Clicked")
    })
    $('#generatecodes').on('click',function(){
        var id = document.getElementById('userid');//`{{ Auth::user()->id }}`;
        var URL =  "Users/two-factor/generate";
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({

            url:URL,
            type:'POST',
            // method:'PUT',
            data:{
                'hello':`{{ Auth::user()->id }}`
            },
            success:function(data){
                console.log(data);
            }
        })
    })
});
