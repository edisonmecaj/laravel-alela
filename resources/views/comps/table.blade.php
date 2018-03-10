@isset($data)
	<table class="table {{$class or ''}}">
		<thead>
			<tr>
				@isset($headers)
					@foreach ($headers as $th)
						<th>{{$th}}</th>
					@endforeach
				@else 
					@if (sizeof($data) > 0)
						@foreach ($data[0] as $th => $v)
							<th>{{$th}}</th>						
						@endforeach					
					@endif
				@endisset
				@isset($actions)
					<th>Actions</th>
				@endisset
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $tr)
				<tr>
					@foreach ($tr as $td)
						<td>{{$td}}</td>
					@endforeach
					@isset($actions)
						@foreach ($action as $td)
							<td>{{$td}}</td>						
						@endforeach
					@endisset
				</tr>
			@endforeach
		</tbody>
	</table>
@endisset