@include('admin._includes.partials.admin_head')
@section('title')
    Test Pre A1
@endsection

 
<div class="container">
	

 <div class="row">
 	<div class="img-responsive" style="width: 30%;
    height: 100px;">
		 <img src="{{ asset('assets/images/logo.png') }}" style="width: 100%; height: 100%" alt="John Doe" />
	</div>
	<div style="margin-left: 12%; margin-top: 2%;">
		 <h1 class="title-5 m-b-35" style="font-size: 45px;">Test Pre A1</h1>
	</div>
 	<div class="col-sm-12">
 		<!-- MAIN CONTENT-->
                <div class="main-content" style="padding: 20px">
                    <div class="section__content section__content--p10">
                        <div class="container">
                            <div class="row">
                            
                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <form action="{{ route('submit.exam') }}" method="post" novalidate="novalidate">
                                        {{ csrf_field() }}
                                    <h3 class="title-5 m-b-35">part 0</h3>
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <tbody>
                                                @if($part0preA1Recording['paragraph'])
                                                    <tr class="tr-shadow">
                                                        <td>
                                                            {{ $part0preA1Recording['paragraph'] }}
                                                            <p style="margin-left: 6%;">
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                @endif
                                                @if($part0preA1Recording['sound'])
                                                    <tr class="tr-shadow">
                                                        <td>
                                                            <p style="margin-left: 6%;">
                                                            <audio controls id="myAudio" style="display: none;">
                                                              <source src="{{ asset('manage/sounds/'. $part0preA1Recording['sound']) }}" type="audio/ogg">
                                                              <source src="{{ asset('manage/sounds/'. $part0preA1Recording['sound'] ) }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                            </audio>
                                                            <a id="mybtn" onclick="playAudio()" class="btn btn-lg btn-info btn-block" style="color: #fff;">Play Audio</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                @endif
                                                @foreach($part0preA1Questions as $q)
                                                    <tr class="tr-shadow">
                                                        <td id="qid" value="{{ $q->id }}">
                                                        	{{ $q->question }} ?
                                                        	<p style="margin-left: 6%;">
                                                            @if($q->multicorrect == 0)
                                                                @foreach($q['answers'] as $ans)
                                                                    <div>
                                                                        <input class="correct" type="radio" name="answers-{{ $q->id }}" id="{{ $q->id }}" value="{{ $ans->id }}" style="margin-left: 7%; margin-top: 2%;" >{{ $ans->answer }}
                                                                    </div>
                                                                 
                                                                @endforeach
                                                            @endif
                                                            @if($q->multicorrect == 1)
                                                                @foreach($q['answers'] as $ans)

                                                                    <div>
                                                                        <input fclass="correct" type="checkbox" name="answers-{{ $q->id }}[]" id="{{ $q->id }}" value="{{ $ans->id }}" style="margin-left: 7%; margin-top: 2%;" onchange="myfun(id,value)">{{ $ans->answer }}
                                                                    </div>
                                                                 
                                                                @endforeach
                                                            @endif
                                                        	
                                                        	</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <tr class="spacer"></tr>
                                    <hr>
                                    <tr class="spacer"></tr>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Submit</span>
                                            <span id="payment-button-sending" style="display:none;">adding…</span>
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                
                            
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2018 MidRule.<a href="#">MidRule</a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
 	</div>
 </div>
</div>

<input type="hidden" value="{{ action('LevelController@getAnswerStatus')}}" id="baseUrl">
 <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
<script type="text/javascript">
   
    /*$(document).ready(function(){

         var total = 0;

         $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $( ".correct" ).change(function() {
            //alert( $(this).val() );
            var url = $('#baseUrl').val();
            var id = $(this).val();
            //alert(url);
            $.ajax({
                method: 'POST', // Type of response and matches what we said in the route
                url: url, // This is the url we gave in the route
                data: {'id' : id, _token: $('#_token').val()}, // a JSON object to send back
                success: function(response){ // What to do if we succeed

                    //alert(response);
                    //console.log(response); 
                    total += Number(response);
                    alert(total);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail

                    //alert(errorThrown);
                   // console.log(JSON.stringify(jqXHR));
                   // console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
                });
        });
    });*/

    
   /* var length = 4 ;
    var selected = 0;
    var myArray = [];
   
    function myfun(id,qid) {
        if (myArray.length > 0) {
        //      myArray.foreach((v,i)=>{
        //     if (v.id == qid)  {
        //         myArray.splice(i,1);
        //         myArray.push({count:count++});
        //     }
        // })
        for (var i = 0; i < myArray.length; i++) {

          if (myArray[i].qid == qid) {
            debugger
             const x = myArray[i].count ++;
           
           myArray.splice(i,1);
           myArray.push({count: x,qid:qid, ans_id:id })
       } else {
                      myArray.push({count:1,qid:qid, ans_id:id})

       }
        }
         } else {
            debugger;
            myArray.push({count:1,qid:qid, ans_id:id})
         }
       
        // if (document.getElementById(id).checked == true) 
        // {
        //     selected = selected +1;
        //     if (selected == length) 
        //     {

        //     }
        // } else {
        //     selected = selected -1; 
        //   }

        //   console.log(selected);
    }
    */

</script>

<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
  document.getElementById("mybtn").style.display = "none";
} 


</script>

<script type="text/javascript">
    $(document).ready(function(){
        var q = $('#qid');
    });
</script>