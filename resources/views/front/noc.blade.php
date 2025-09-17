@extends('front.master')
@section('title','Home')


@section('content')

<section class="kmp_apa mb-30">
		<div class="container">
			<div class="row">
				

				<div class="col-lg-12">
					<div class="kmp_apa_area">
						<div class="history_tittle">
							<h2 class="white_color">NOC</h2>
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
							<table id="example" class="display" style="width:100%">
						        <thead>
						            <tr>
						                <th>SL</th>
						                <th>Name & Rank</th>
						                <th>Issuing Authority</th>
						                <th>Upload Date</th>
						                <th>File</th>
						                <th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
								@php $kes=0; @endphp
                            @foreach($dd as $key=>$ss)
                          @php  $kes=$kes+1; @endphp
						            <tr>
						                <td>{{ $kes }}</td>
						                <td>{{ $ss->name_rank }} </td>
						                <td>{{ $ss->issuing_authority }}</td>
						                <td>{{ $ss->date }}</td>
										
						                <td><button type="button" onclick="d_load({{$ss->id}});" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >View</button></td>
										<td><button type="button" class="btn btn-success"><a style="color: #fff;" href="{{asset('public/upload/').$ss->noc_file}}">Download</a></button></td>
						                
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
          url: "find_ajax_id/"+id,
          dataType: 'JSON',
          error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText
            alert(errorMessage);
          },
          success: function (data) {//public/upload/noc_file/fef591f63bb97f3844aaee69276627cb.jpg
		  //

		    document.getElementById("imageshow").innerHTML='<iframe src="https://docs.google.com/viewerng/viewer?url=https://kmp.police.gov.bd/public/upload/'+data[0].noc_file+'&embedded=true" frameborder="0" height="600px" width="100%"></iframe>';
			document.getElementById("myModalLabel").innerHTML=data[0].name_rank;
			document.getElementById("btndownload").innerHTML='<a target="_blank" style="color: #fff;" href="public/upload/'+data[0].noc_file+'">Download</a>';
		  }
			});


		}
		
    </script>

    @endsection
	