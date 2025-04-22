<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\SMS\Student\StudentController;
use App\Http\Controllers\SMS\Student\StudentScoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\Team\GroupController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\SMS\Setting\School\SchoolController;
use App\Http\Controllers\SMS\Setting\School\TermsAndConditionsController;
use App\Http\Controllers\Ajax\AjaxController;
use Laravel\Fortify\RoutePath;
use App\Http\Controllers\SMS\Setting\General\GeneralController;

use App\Livewire\StudentRegister;
// api controller

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AjaxController::class)->group(function () {
    Route::get('api/fetch-nationatinality', 'fetchnationality');
    Route::get('api/fetch-district', 'fetchstates');
    Route::get('api/fetch-cities', 'fetchcities');
    Route::get('api/fetch/level/class','fetchLevelClass');
    Route::get('api/fetch/class/stream','fetchClassStream');
     Route::get('api/fetch/year/term','fetchterms');
 Route::get('api/fetch/class/student','fetchClassStudent');
 Route::get('api/fetch/student/subject','fetchstudentsubjects');
 Route::get('api/fetch/subject/paper','fetchSubjectPaper');
 Route::get('api/fetch/objectives','fetchObjectives');
 Route::get('api/fetch/max/score','fetchmaxscore');

});





Route::get('/home',function(){
    return views('home');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/index', function () {
        return view('index');
    })->name('index');
});

Route::middleware(['auth:sanctum','verified',config('jetstream.auth_session'),])->group(function(){
    Route::get('Authentication/Users/dashboard', function(){
        return view('Users.Profile.dashboard');
    })->name('users.dashboard');
});

Route::prefix('Authentication')->group(function(){
  Route::controller(UserAuthController::class)->group(function (){
    Route::get('/user/login','loginUser')->name('user.login');
    Route::get('/user/register','registerUser')->name('user.register');
    Route::post('/user/validate','validateUser')->name('user.validate');
    Route::post('/user/save','saveRegister')->name('user.store.register');
    Route::post('/verify/email','VerifyEmail')->name('email.verification');
    Route::get('profile/user/{id}','userProfile')->name('profile.user');
    Route::post('/resend/verify/email','ResendVerify')->name('verification.resend');
    Route::post('/reset/user/password/link','PasswordResetLink')->name('password.resend.link');
    //  google route      ``
    // redirect to google auth page
    Route::get('/auth/google/redirect', 'redirect')->name('auth.google.redirect');
    Route::get('/auth/google/callback', 'callback')->name('auth.google.callback');
  });

});

Route::middleware(['auth:sanctum','verified'])->group(function(){

    Route::prefix('Users')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('/index','index')->name('users.index');
            Route::get('add/user','addUser')->name('add.users');
            Route::post('/save','storeUser')->name('save.user');
            Route::get('edit/user/{id}/user','editUser')->name('edit.user');
            Route::put('update/user/{id}/user','updateUser')->name('update.user');
            Route::delete('delete/user/{id}/user','deleteUser')->name('delete.user');
            Route::get('/user/list/pdf','genPDF')->name('users.pdf.list');

        });
    });
});

Route::middleware(['auth:sanctum','verified'])->group(function(){

    Route::prefix('Users')->group(function(){
        Route::controller(UserProfileController::class)->group(function(){
            Route::put('/user,newpassword','newPass')->name('update.newpassord');
            Route::post('two-factor/enable', 'enableAuth')->name('enable.two-factor');
            Route::delete('two-factor/disable', 'disableAuth')->name('disable.two-factor');
            Route::put('two-factor/generate', 'freshstore')->name('generate.two-factor');
            Route::post('two-factor/verify','ValidateCode')->name('verify.two-factor');
            Route::delete('delete/user','deleteAuthUser')->name('delete.self');

        });
    });

    Route::prefix('Roles')->group(function(){
        Route::controller(RolesController::class)->group(function(){
          Route::get('/index','index')->name('roles.index');
          Route::post('/store','store')->name('role.store');
          Route::get('/edit/{id}/role','edit')->name('role.edit');
          Route::put('/update/role/{id}','update')->name('role.update');
          Route::delete('/delete/{id}/role', 'delete')->name('role.delete');
          Route::get('/assign/permission/{id}/role', 'AddPermissionToRole')->name('role.permission');
          Route::put('/save/permission/{id}/role', 'storeRolePermission')->name('role.assign.permission');
        });
    });

    Route::prefix('Permissions')->group(function(){
        Route::controller(PermissionsController::class)->group(function(){
            Route::get('/index','index')->name('permissions.index');
            Route::post('/store','store')->name('permission.store');
            Route::get('/edit/{id}/permission','edit')->name('permission.edit');
            Route::put('/update/permission/{id}','update')->name('permission.update');
            Route::delete('/delete/{id}/permission', 'delete')->name('permission.delete');
        });
    });

    Route::prefix('Teams')->group(function(){
        Route::controller(TeamController::class)->group(function(){
            Route::get('/user/teams/{id}', 'create')->name('create.teams');
            Route::post('/user/team/save/{id}', 'store')->name('team.save');
            Route::get('/user/team/setting/{id}', 'teamSetting')->name('team.setting');
            Route::put('/user/team/edit/{id}','teamUpdate')->name('team.update');
            Route::post('/user/team/invite/{id}','inviteMember')->name('team.invite');
            Route::delete('/user/cancel/team/invite/{id}','cancelInvite')->name('cancel.invite');
            Route::post('/user/accept/team/invite/{id}','acceptInvite')->name('accept.invite');

            Route::delete('/user/exit/team/{id}','leaveTeam')->name('leave.team');
            Route::put('/user/team/switch/{id}','changeTeam')->name('switch.team');
            Route::delete('/user/delete/team/{id}','deleteTeam')->name('delete.team');

        });
    });

    Route::prefix('groups')->group(function(){
        Route::controller(GroupController::class)->group(function(){
            Route::get('/user/groups/{id}', 'create')->name('create.groups');
            Route::post('/user/group/save/{id}', 'store')->name('group.save');
            Route::get('/user/group/setting/{id}', 'groupSetting')->name('group.setting');
            Route::put('/user/group/edit/{id}','groupUpdate')->name('group.update');
            Route::post('/user/group/invite/{id}','inviteMember')->name('group.invite');
            Route::delete('/user/cancel/group/invite/{id}','cancelInvite')->name('cancel.group.invite');
            Route::delete('/user/exit/group/{id}','leaveGroup')->name('leave.group');
               Route::delete('/user/delete/group/{id}','deleteGroup')->name('delete.group');
            Route::post('/user/accept/group/invite/{id}','acceptInvite')->name('accept.group.invite');


            Route::put('/user/group/switch/{id}','changeGroup')->name('switch.group');


        });
    });

});




    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function ()
    {
        Route::prefix('School/Management/System')->group(function(){
        Route::get('SMS/index', function () {
            return view('SMS.Dashboard.index');
        })->name('school.index');
        Route::controller(TermsAndConditionsController::class)->group(function (){
            Route::get('terms/conditons/index','index')->name('terms.and.conditions.index');
            Route::get('terms/conditons/create','createConditions')->name('terms.and.conditions.create');
            Route::post('terms/conditons/save','saveConditions')->name('terms.and.conditions.save');
            Route::get('terms/{id}/conditons/view','viewConditions')->name('terms.and.conditions.view');
            Route::get('terms/{id}/conditons/edit','editConditions')->name('terms.and.conditions.edit');
            Route::put('terms/{id}/conditons/update','updateConditions')->name('terms.and.conditions.update');
        });

        Route::controller(SchoolController::class)->group(function (){
            Route::get('/year/index','index')->name('year.term.list');
            Route::get('/export/academic/index', 'exportAcademic')->name('export.excel.academicdetails');
              Route::post('/year/store','storeYear')->name('store.year');
              Route::get('/year/{id}/show','showYear')->name('show.year');
              Route::get('/year/{id}/edit','editYear')->name('edit.year');
              Route::put('/year/{id}/update','updateYear')->name('update.year');
              Route::delete('/year/{id}/update','destroyYear')->name('delete.year');
             });
        Route::controller(SchoolController ::class)->group(function (){
          Route::post('/term/store','storeTerm')->name('store.term');
          Route::get('/term/{id}/show','showTerm')->name('show.term');
          Route::get('/term/{id}/edit','editTerm')->name('edit.term');
          Route::put('/term/{id}/update','updateTerm')->name('update.term');
          Route::delete('/term/{id}/update','destroyTerm')->name('delete.term');
         });
        Route::controller(SchoolController ::class)->group(function (){
          Route::post('/year/term/store','storeYearTerm')->name('store.year.term');
          Route::get('/year/term/{id}/show','showYearTerm')->name('show.year.term');
          Route::get('/year/term/{id}/edit','editYearTerm')->name('edit.year.term');
          Route::put('/year/term/{id}/update','updateYearTerm')->name('update.year.term');
          Route::delete('/year/term/{id}/update','destroyYearTerm')->name('delete.year.term');
         });
        Route::controller(GeneralController ::class)->group(function (){
            Route::get('/settings/general/index','SubRegions')->name('general.settings.index');
            Route::post('/settings/general/save/region','saveRegion')->name('save.regions');
            Route::post('/settings/general/save/subregion','saveSubRegion')->name('save.subregion');
         });
    });
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function ()
{
    Route::prefix('SMS/Student/Management')->group(function() {

        Route::controller(StudentController::class)->group(function () {
            Route::get('Student/Registration','index')->name('student.index');
            Route::post('Student/Save/Registration','saveRegistration')->name('student.register.save');

            Route::get('Student/Bio-Data','StdBioData')->name('student.bio.data');
            Route::post('Student/Save/Bio-Data','store')->name('student.save.bio.data');
            // Route::get('Student/Home-Data',' StdHomeData')->name('student.home.data');
            // Route::post('Student/{id}/Home-Data','SaveStdHomeData')->name('student.save.home.data');
            // Route::get('Student/Emmergency-Contact','StdEmmergencyData')->name('student.emmergency.info');
            // Route::post('Student/{id}/Emmergency-Contact','SaveStdEmmergencyData')->name('student.save.emmergency.info');
            // Route::get('Student/Application-Class',' StdApplicationData')->name('student.application.data');
            // Route::post('Student/{id}/Application-Class','SaveStdApplicationData')->name('student.save.application.data');
            // Route::get('Student/Parents-Information',' StdParentsData')->name('student.parent.info');
            // Route::post('Student/{id}/Parents-Information','SaveStdParentData')->name('student.save.parent.info');
            // Route::get('Student/Medical-Information',' StdMedicalData')->name('student.medical.info');
            // Route::post('Student/{id}/Medical-Information','SaveStdMedicalData')->name('student.save.medical.info');
            // Route::get('Student/Terms-and-Conditions','StdTermsData')->name('student.terms.condition');
            // Route::post('Student/{id}/Terms-and-Conditions','SaveStdTermsData')->name('student.save.terms.condition');
            // Route::get('Student/Official-Comment',' StdOfficialData')->name('student.official.comment');
            // Route::post('Student/{id}/Official-Comment','SaveStdOfficialData')->name('student.save.official.comment');


            // ajax

        });

        Route::controller(StudentScoresController::class)->group(function () {
            Route::get('scores/list', 'index')->name('scores.list');
            Route::get('add/scores', 'create')->name('add.scores');
            Route::post('save/scores', 'store')->name('save.scores');
        });
    });

} );


