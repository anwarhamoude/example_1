<div class="mt-40">
<h4 class="grey">Invite Registered Users</h4>
<div class="mr-33">
<form method="post" action="{{ $project->path() . '/invitations' }}">
    @csrf
    <input id="email" type="email" class="card-inner w-full @error('email') is-invalid @enderror" name="email" placeholder="enter user email...">
    @error('email')
    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
    @enderror
    <button class="btn-update mt-11">send invitation</button>
</form>
</div>
</div>
