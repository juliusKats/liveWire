$(document).ready(function () {

    // function clearAndAppendOptions(selector, options, defaultOptionText) {
    //     $(selector).html(`<option value="0">${defaultOptionText}</option>`);
    //     $.each(options, function (key, value) {
    //         $(selector).append(`<option value="${value.id}">${value.name}</option>`);
    //     });
    // }

    // success: function(result) {
    //     console.log(result);
    //     clearAndAppendOptions('#term', result.terms, '-- Select Term --');
    // }

    var alertTxt = document.getElementById('alertText')
    var errorbx= document.getElementById ('errorbox')
    var btnsave = document.getElementById ('btnsave')

   $('#year').on('change',function(){
        var yearId = this.value;
        if (!yearId || yearId === "0") {
        errorbx.removeAttribute('hidden','hidden')
        alertTxt.innerText ="Please select a valid Year"
    }
    else{
        errorbx.setAttribute('hidden','hidden')
        alertTxt.innerText =""
    }
        $('#term').html('');

        var subURL='http://127.0.0.1:8000/api/fetch/year/term';
        $.ajax({
            url:subURL,
            type:"GET",
            data:{
                year_id:yearId,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                console.log(result)
                $('#term').html('<option value="0">-- Select Term --</option>');
                $.each(result.terms, function (key, value) {
                    $("#term").append('<option value="' + value
                        .term_id + '">' + value.term + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }

            }
        })


    })

    $('#term').on('change',function(){
        var termId = this.value;
        if (!termId || termId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid term"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
    });

    $('#level').on('change',function(){
        var levelId = this.value;
        if (!levelId || levelId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid level "
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        var URL ='http://127.0.0.1:8000/api/fetch/level/class'
        $('#class').html('');
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
                $('#class').html('<option value="">-- Select Class --</option>');
                $.each(result.classes, function (key, value) {
                    $("#class").append('<option value="' + value
                        .class_id + '">' + value.name + '</option>');
                });
                $('#stream').html('<option value="">-- Select Stream --</option>');

            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });
    })
    $('#class').on('change',function(){
        var classId = this.value;
        if (!classId || classId === "0") {

            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid class d"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        var URL ='http://127.0.0.1:8000/api/fetch/class/stream'
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

                $('#stream').html('<option value="">-- Select Stream --</option>');
                $.each(result.streams, function (key, value) {
                    $("#stream").append('<option value="' + value
                        .stream_id + '">' + value.name + '</option>');
                });
                $('#student').html('<option value="">-- Select Student --</option>');
            },
            error: function(xhr, status, error) {
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });
    })
    $('#stream').on('change',function(){
        var streamId = this.value;
        var classId = document.getElementById('class').value
        if (!streamId || streamId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid stream d"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }

         var URL ='http://127.0.0.1:8000/api/fetch/class/student'
        $('#student').html('')
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                class_id:classId,
                stream_id:streamId,
                _token:'{{csrf_token()}}',
            },
            dataType:'json',
            success: function(result){
                console.log(result)

                $('#student').html('<option value="0">-- Select Stream --</option>');
                $.each(result.students, function (key, value) {
                    $("#student").append('<option value="' + value
                        .student_id + '">' + value.name + '</option>');
                });
                $('#subject').html('<option value="">-- Select Student --</option>');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred while fetching data. Please try again.');
            }
        });
    })
    $('#student').on('change',function(){
        var studentId = this.value;
        var streamId = document.getElementById('stream').value
        var yearId = document.getElementById('year').value
        var levelId = document.getElementById('level').value
        var classId = document.getElementById('class').value

        if (!studentId || studentId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid student"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }

        var URL ='http://127.0.0.1:8000/api/fetch/student/subject'
        $('#subject').html('')

        $.ajax({
            url:URL,
            type:'GET',
            data:{
                _token:'{{csrf_token()}}',
                year_id:yearId,
                level_id:levelId,
                class_id:classId,
                stream_id:streamId,
                student_id:studentId,
            },
            dataType:'json',
            success: function(result){
                console.log(result)

                $('#subject').html('<option value="0">-- Select Subject--</option>');
                $.each(result.subjects, function (key, value) {
                    $("#subject").append('<option value="' + value
                        .subj + '">'+ value.code+ ' - ' +value.name + '</option>');
                });
                $('#paper').html('<option value="">-- Select Student --</option>');
            },
            error: function(xhr, status, error) {
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });

    })
    $('#subject').on('change',function(){
        var subjectId = this.value;
        if (!subjectId || subjectId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid subject"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        var URL ='http://127.0.0.1:8000/api/fetch/subject/paper'
        $('#paper').html('')
        console.log(subjectId);
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                _token:'{{csrf_token()}}',
                subject_id:subjectId,
            },
            dataType:'json',
            success: function(result){
                console.log(result)

                $('#paper').html('<option value="0">-- Select Papers--</option>');
                $.each(result.papers, function (key, value) {
                    $("#paper").append('<option value="' + value
                        .paper_id + '">' +value.name + '</option>');
                });
                $('#objective').html('<option value="">-- Select Objective --</option>');
            },
            error: function(xhr, status, error) {
              // alert('An error occurred while fetching data. Please try again.');
              if (error){
                errorbx.removeAttribute('hidden','hidden')
                alertTxt.innerText ='An error occurred while fetching data. Please try again.'
            }
            else{
                errorbx.setAttribute('hidden','hidden')
                alertTxt.innerText =""
            }
            }
        });
    })


    $('#paper').on('change',function(){
        var paperId = this.value;
        var streamId = document.getElementById('stream').value
        var yearId = document.getElementById('year').value
        var termId = document.getElementById('term').value
        var levelId = document.getElementById('level').value
        var classId = document.getElementById('class').value
        var subjectId = document.getElementById('subject').value;
        if (!paperId || paperId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid Paper"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        var URL ='http://127.0.0.1:8000/api/fetch/objectives'
        $('#objective').html('')

        console.log(yearId)
        console.log(termId)
        console.log(levelId)
        console.log(classId)
        console.log(streamId)
        console.log(subjectId)
        console.log(paperId)

        $.ajax({
            url:URL,
            type:'GET',
            data:{
                _token:'{{csrf_token()}}',
                subject_id:subjectId,
                paper_id:paperId,
                stream_id:streamId,
                year_id:yearId,
                term_id:termId,
                level_id:levelId,
                class_id:classId,
            },
            dataType:'json',
            success: function(result){
                console.log(result)

                $('#objective').html('<option value="0">-- Select Objective--</option>');
                $.each(result.objectives, function (key, value) {
                    $("#objective").append('<option value="' + value
                        .id + '">' +value.objective + '</option>');
                });

                // $('#objective').html('<option value="">-- Select Objective --</option>');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });

    })
    $('#objective').on('change',function(){
        var objId = this.value;
        if (!objId || objId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid objective"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
    })
    $('#examset').on('change',function(){
        var examId = this.value;
        var termId = document.getElementById('term').value
        var yearId = document.getElementById('year').value
        var scoremax =document.getElementById('maxscore')

        if (!examId || examId === "0") {
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Please select a valid Exam Set"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        var URL ='http://127.0.0.1:8000/api/fetch/max/score'

        scoremax.value === 0
        scoremax.innerText === 0
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                _token:'{{csrf_token()}}',
               term_id:termId,
                year_id:yearId,
                exam_id:examId
            },
            dataType:'json',
            success: function(result){
                console.log(result)
                console.log(result.scores)

                $.each(result.scores, function (key, value) {
                    console.log(value.max_score)
                    scoremax.value =value.max_score
                });

            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });


    })
    $('#score').on('keyup',function(){
        var scoremax = parseInt(document.getElementById('maxscore').value)
        var scoreId =parseInt(this.value);
        var URL ='http://127.0.0.1:8000/api/fetch/exist/student/score';

        var yearId = document.getElementById('year').value
        var termId = document.getElementById('term').value
        var levelId = document.getElementById('level').value
        var classId = document.getElementById('class').value
        var streamId = document.getElementById('stream').value
        var subjectId = document.getElementById('subject').value;
        var objectiveId = document.getElementById('objective').value;
        var paperId = document.getElementById('paper').value;
        var examId = document.getElementById('examset').value;
        var studentId = document.getElementById('student').value;

        console.log(scoreId);
        if(scoreId < 0 || scoreId > scoremax){
            errorbx.removeAttribute('hidden','hidden')
            alertTxt.innerText ="Invalid Score Value"
        }
        else{
            errorbx.setAttribute('hidden','hidden')
            alertTxt.innerText =""
        }
        $.ajax({
            url:URL,
            type:'GET',
            data:{
                _token:'{{csrf_token()}}',
                subject_id:subjectId,
                paper_id:paperId,
                year_id:yearId,
                term_id:termId,
                class_id:classId,
                level_id:levelId,
                stream_id:streamId,
                objective_id:objectiveId,
                exam_id:examId,
                student_id:studentId,
            },
            dataType:'json',
            success: function(result){
                if(result.stdscores.length > 0){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ="Student with the selected information exists."
                    btnsave.setAttribute('hidden','hidden')
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                    btnsave.removeAttribute('hidden','hidden')
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert('An error occurred while fetching data. Please try again.');
                if (error){
                    errorbx.removeAttribute('hidden','hidden')
                    alertTxt.innerText ='An error occurred while fetching data. Please try again.'
                }
                else{
                    errorbx.setAttribute('hidden','hidden')
                    alertTxt.innerText =""
                }
            }
        });

    })
    $('#grade').on('change',function(){
        var grade_id = this.value;
        console.log(grade_id);
    })
})
