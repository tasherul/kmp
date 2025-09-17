@extends('front.master')
@section('title','Biography')


@section('content')
<section class="kmp_apa mb-30">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="kmp_apa_area">
						<div class="history_tittle">
							<h2 class="white_color">KMP Units</h2>
						</div>
						<div class="apa_list">
							<button class="accordions"><b>Commissioner's Office, KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Commissioner as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                      
                                    </table>
                                </div>
                                <button class="accordions"><b>Headquarter Division, KMP</b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Headquarter as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                </div>
                                <button class="accordions"><b>City Special Branch (CSB), KMP </b></button>
                                <div class="panel">
                                  <table>

                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                      @foreach($City as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                </div>
                                <button class="accordions"><b>North Division, KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($North as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/khalishpur">Khalispur PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/daulatpur">Doulatpur PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/khanjahan%20Ali">Khan Jahan Ali PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/aranghata">Arangghata PS, KMP</a></td>
                                      </tr>
                                    </table>
                                </div>
                                <button class="accordions"><b>South Division, KMP </b></button>
                                <div class="panel">
                                    <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($South as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/khulna%20Sadar">Khulna PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/khalishpur">Sonadanga PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/labanchora">Labanchara PS, KMP</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><a class="text_center" href="range-units/horintana">Horintana PS, KMP</a></td>
                                      </tr>
                                    </table>
                                </div>
                                <button class="accordions"><b>Detective Branch (DB), KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Detective as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                      
                                    </table>
                                </div>
                                <button class="accordions"><b>Riot COntrol Division (RCD), KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Riot as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                </div>
                                <button class="accordions"><b>Traffic Division, KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Traffic as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                </div>
                                <button class="accordions"><b>Prosecution Division, KMP </b></button>
                                <div class="panel">
                                  <table>
                                      <tr>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                      </tr>
                                       @foreach($Prosecution as $key)

                                      <tr>
                                        <td>{{$key->designation}}</td>
                                        <td>{{$key->mobile}}</td>
                                        <td>{{$key->telephone}}</td>
                                        <td>{{$key->email}}</td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                </div>
 						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



@endsection