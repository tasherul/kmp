
	

@extends('front.master')
@section('title','Home')


@section('content')

<section class="kmp_apa mb-30">
		<div class="container">
			<div class="row">
				

				<div class="col-lg-12">
					<div class="kmp_apa_area">
						<div class="history_tittle">
							<h2 class="white_color">RIGHT TO INFORMATION</h2>
						</div>
						<div class="apa_list" style="margin-top: 50px;">
							<!-- Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							      	<h4 class="modal-title" id="myModalLabel"></h4>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;"><span aria-hidden="true">&times;</span></button>
							        
							      </div>
							      <div class="modal-body">
							        
									<div id="imageshow"></div>
							      </div>
							      <div class="modal-footer">
							      	<button type="button" class="btn btn-primary" id="btndownload"></button>
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							        
							      </div>
							    </div>
							  </div>
							</div>
							<!-- Data Table -->
							<table id="example" class="display table-responsive" style="width:100%;display:inline-table;">
						        <thead>
						            <tr>
						                <th>SL</th>
						                <th>Tittle</th>
						              <th>Link</th>
						                <th>File</th>
						                <th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
								@php $kes=0; @endphp
                            @foreach($view_info as $key=>$ss)
                          @php  $kes=$kes+1; @endphp
						            <tr>
						                <td>{{ $kes }}</td>
						                <td>{{ $ss->titel }} </td>
						                
										@php if($ss->link!=false) { @endphp
										<td> <a href="{{$ss->link}}"> <button type="button" class="btn btn-secondary btn-lg">Link</button> </a></td>
										@php } else{ @endphp
											<td></td>
											@php } @endphp
											@php if($ss->in_file!=false) { @endphp
										<td><button type="button" onclick="d_load({{$ss->id}});" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >View</button></td>
										@php } else{ @endphp
											<td></td>
											@php } @endphp
										@php if($ss->in_file!=false) { @endphp
										<td><button type="button" class="btn btn-success"><a style="color: #fff;" href="{{asset('public/upload/').$ss->in_file}}" target="_blank">Download</a></button></td>
										@php } else{ @endphp
											<td></td>
											@php } @endphp
						            </tr>
						          @endforeach  
						        </tbody>
						    </table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<script>
		function d_load(id)
		{
			$.ajax({
          type: "GET",
          url: "find_right_id/"+id,
          dataType: 'JSON',
          error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText
            alert(errorMessage);
          },
          success: function (data) {//public/upload/noc_file/fef591f63bb97f3844aaee69276627cb.jpg
		  //
			document.getElementById("imageshow").innerHTML='<embed src="https://docs.google.com/viewerng/viewer?embedded=true&url=https://kmp.police.gov.bd/public/upload/'+data[0].in_file+'" width="100%" height="600" />';
			document.getElementById("myModalLabel").innerHTML=data[0].titel;
			document.getElementById("btndownload").innerHTML='<a target="_blank" style="color: #fff;" href="public/upload/'+data[0].in_file+'">Download</a>';
		  }
			});


		}
		
    </script>

    @endsection
	