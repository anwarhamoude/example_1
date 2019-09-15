<p>Welcome to skejuhl.com</p>

<p>{{ auth()->user()->name }} has invited you to join their project organized on skejuhl.com</p>

<a href="{{ route('accept', $projectInvitation->token) }}">Click here</a> to activate!
