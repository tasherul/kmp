

	<ul class="service_area mb-30">
		
		<li {{(current_page("comunity-policing"))?'class=active':''}} >
			<a href="{{Route('comunityPolicing')}}">Community Policing</a>											
		</li>
		<li >
			<a href="http://pcc.police.gov.bd:8080/ords/f?p=500:1::::::">Online Police Clearance</a>
		</li>
		<li {{(current_page("police-activities"))?'class=active':''}}>
			<a href="{{Route('policeActivities')}}">Police Activities</a>
		</li>
		<li {{(current_page("money-escort"))?'class=active':''}}>
			<a href="{{Route('moneyEscort')}}">Money Escort</a>
		</li>
		<li {{(current_page("police-verification"))?'class=active':''}}>
			<a href="{{Route('policeVerification')}}">Police Verification</a>
		</li>
		<li {{(current_page("protection"))?'class=active':''}}>
			<a href="{{Route('protection')}}">Protection & Protocol</a>
		</li>
		<li {{(current_page("victim-support"))?'class=active':''}}>
			<a href="{{Route('victimSupport')}}">Victim Support</a>
		</li>
		<li {{(current_page("traffic"))?'class=active':''}} >
			<a href="{{Route('traffic')}}">Traffic Management</a>
		</li>
		<li {{(current_page("info-desk"))?'class=active':''}} >
			<a href="{{Route('infoDesk')}}">Info Desk</a>
		</li>					
	</ul>
