<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img class="img-circle elevation-2" 

      @if(Auth::user()->userimage){
        src="/profile/images/{{Auth::user()->userimage}}"   
      }
      @else{
          src="/default/defaultuser.jpg" 
      }
      @endif
       alt="{{Auth::user()->name}}"/>
  </div>
  <div class="info">
    <a href="#" class="d-block">{{Auth::user()->name}}</a>
  </div>
</div>
