<div class="form-group mb-2">
    <label for="name">Name</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="Name" id="name" value="{{ isset($instructor) ? $instructor->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>
<div class="form-group mb-2">
    <label for="email">Email</label>
    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
        placeholder="Email" id="email" value="{{ isset($instructor) ? $instructor->email : old('email', '') }}">
    @if ($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
</div>
