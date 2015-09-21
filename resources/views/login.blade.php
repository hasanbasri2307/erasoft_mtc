<html>
<head>
	<title>
		Login Page
	</title>
</head>
<body>
@if(Session::has('message'))
    <div class="alert alert-info">
      {{Session::get('message')}}
    </div>
@endif
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
	{!! Form::open(['route'=>'user.logins']) !!}
	<table border="1" width="50%">
		<tr>
			<td>Email</td>
			<td>:</td>
			<td>{!! Form::email('email') !!}</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td>{!! Form::password('password') !!}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>{!! Form::submit('submit') !!}</td>
		</tr>
	</table>
</body>