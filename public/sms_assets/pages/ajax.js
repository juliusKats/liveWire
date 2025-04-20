$(document).ready(function () {
    var mainURL ='http://127.0.0.1:8000/api/';
    $('#stdcountry').on('change',function(){
        var countryId =this.value;
        $('#stdnat').html('');
        var subURL='http://127.0.0.1:8000/api/fetch-nationatinality';
        $.ajax({
            url:subURL,//"{{ ('fetch.nationality) }}",//"{{route('fetch.nationality')}}",
            // type:"POST",
            data:{
                country_id:countryId,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                console.log(result);
                $('#stdnat').html('<option value="">-- Select Nationality --</option>');
                $.each(result.nations, function (key, value) {
                    $("#stdnat").append('<option value="' + value
                        .name + '">' + value.name + '</option>');
                });
                $('#stdDist').html('<option value="">-- Select District --</option>');

            },

        });
    });


    $('#stdnat').on('change',function(){
        var inputDistrict = document.getElementById('tbDistrict');
       var combDistrict = document.getElementById('combdistrict');
        var nationality =this.value;
        $('#stdDist').html('');

        var subURL='http://127.0.0.1:8000/api/fetch-district';
        $.ajax({
            url:subURL,
            type:"GET",
            data:{
                nationality:nationality,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                var p = result.states.length;
                console.log(result.states.length)
                if (p == 0){
                    inputDistrict.removeAttribute('hidden','hidden')
                    combDistrict.setAttribute('hidden','hidden');
                }
                else{

                combDistrict.removeAttribute('hidden','hidden')
                inputDistrict.setAttribute('hidden','hidden');

                $('#stdDist').html('<option value="">-- Select Nationality --</option>');
                $.each(result.states, function (key, value) {
                    $("#stdDist").append('<option value="' + value
                        .name + '">' + value.name + '</option>');
                });
                $('#stdCity').html('<option value="">-- Select District --</option>');

                 }
            },

        });
    });

    $('#stdDist').on('change',function(){
        var combcity = document.getElementById('combCity');
        var tbcity = document.getElementById('tbCity');
        var district = this.value;
        var subURL='http://127.0.0.1:8000/api/fetch-cities';
        $('#stdCity').html('');

        console.log(district);

    });

    $('#stdLevel').on('change', function(){
        var PLE = document.getElementById("ple");
        var UCE = document.getElementById("uce");
        var levelId = this.value;
        PLE.setAttribute('hidden', 'hidden');
        UCE.setAttribute('hidden', 'hidden');
        var URL ='http://127.0.0.1:8000/api/fetch/level/class'
        $('#stdclass').html('');
        // console.log(levelId );
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                level_id:levelId,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                console.log(result)
                $('#stdclass').html('<option value="">-- Select Class --</option>');
                $.each(result.classes, function (key, value) {
                    $("#stdclass").append('<option value="' + value
                        .class_id + '">' + value.name + '</option>');
                });
                $('#stdstream').html('<option value="">-- Select Stream --</option>');

            }
        });
    });

    $('#stdclass').on('change',function(){
        var classId = this.value;
        var PLE = document.getElementById("ple");
        var UCE = document.getElementById("uce");
        var URL ='http://127.0.0.1:8000/api/fetch/class/stream'
        if(classId ==1){
             PLE.removeAttribute('hidden', 'hidden');
             UCE.setAttribute('hidden', 'hidden');
             console.log('Senior One')
        }
        else if(classId ==5){
            UCE.removeAttribute('hidden', 'hidden');
            PLE.setAttribute('hidden', 'hidden');
            console.log('senior five')
        }
        else{
            PLE.setAttribute('hidden', 'hidden');
            UCE.setAttribute('hidden', 'hidden');
            console.log('Others')
        }
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                class_id:classId,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                console.log(result)

                $('#stdstream').html('<option value="">-- Select Stream --</option>');
                $.each(result.streams, function (key, value) {
                    $("#stdstream").append('<option value="' + value
                        .stream_id + '">' + value.name + '</option>');
                });
                if(classId>4){
                    $('#stdcomb').html('<option value="">-- Select Combination --</option>');

                }
                else{
                    $('#stdcomb').html('');

                }

            }
        });

    });
    $('#stdstream').on('change', function(){
        var combtype = this.value;
        console.log(combtype);
    });

 })
