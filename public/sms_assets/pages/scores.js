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

   $('#year').on('change',function(){
        var yearId = this.value;
        if (!yearId || yearId === "0") {
            alert('Please select a valid Year.');
            return;
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
                alert('An error occurred while fetching data. Please try again.');
            }
        })


    })

    $('#level').on('change',function(){
        var levelId = this.value;
        if (!levelId || levelId === "0") {
            alert('Please select a valid level.');
            return;
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
                alert('An error occurred while fetching data. Please try again.');
            }
        });
    })
    $('#class').on('change',function(){
        var classId = this.value;
        if (!classId || classId === "0") {
            alert('Please select a valid Class.');
            return;
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
                console.error('Error:', error);
                alert('An error occurred while fetching data. Please try again.');
            }
        });
    })
    $('#stream').on('change',function(){
        var streamId = this.value;
        var classId = document.getElementById('class').value
        if (!streamId || streamId === "0") {
            alert('Please select a valid stream.');
            return;
        }
        if (!classId || classId === "0") {
            alert('Please select a valid Class.');
            return;
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

        if (!classId || classId === "0") {
            alert('Please select a valid Class.');
            return;
        }
        if (!levelId || levelId === "0") {
            alert('Please select a valid level.');
            return;
        }
        if (!yearId || yearId === "0") {
            alert('Please select a valid year.');
            return;
        }
        if (!streamId || streamId === "0") {
            alert('Please select a valid year.');
            return;
        }
        if (!studentId || studentId === "0") {
            alert('Please select a valid year.');
            return;
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
                console.error('Error:', error);
                alert('An error occurred while fetching data. Please try again.');
            }
        });

    })
    $('#subject').on('change',function(){
        var subjectId = this.value;
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
                console.error('Error:', error);
                alert('An error occurred while fetching data. Please try again.');
            }
        });
    })


    $('#paper').on('change',function(){
        var paperId = this.value;
        var streamId = document.getElementById('stream').value
        var yearId = document.getElementById('year').value
        var termId = document.getElementById('year').value
        var levelId = document.getElementById('level').value
        var classId = document.getElementById('class').value

        var subjectId = document.getElementById('subject').value;
        console.log(paperId);
        console.log(subjectId);
    })
    $('#objective').on('change',function(){
        var objective_id = this.value;
        console.log(objective_id);
    })
    $('#examset').on('change',function(){
        var examset_id = this.value;
        console.log(examset_id);
    })
    $('#score').on('change',function(){
        var score_id = this.value;
        console.log(score_id);
    })
    $('#grade').on('change',function(){
        var grade_id = this.value;
        console.log(grade_id);
    })
})
