<div class="form-group mb-2">
    <label for="title">Title</label>
    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
        placeholder="Title" id="title" value="{{ isset($course) ? $course->title : old('title', '') }}">
    @if ($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title') }}</p>
    @endif
</div>
<div class="form-group mb-2">
    <label for="description">Description</label>
    <input id="description" type="hidden" name="description" value="{!! isset($course) ? $course->description : old('description', '') !!}">
    {{-- <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
        placeholder="Description" id="description">
        {!! isset($course) ? $course->description : old('description', '') !!}
    </textarea> --}}
    <trix-editor input="description"></trix-editor>

    @if ($errors->has('description'))
        <p class="text-danger">{{ $errors->first('description') }}</p>
    @endif
</div>

<div class="form-group mb-2">
    <label for="price">Price (In Rs)</label>
    <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price"
        placeholder="Price" id="price" value="{{ isset($course) ? $course->price : old('price', '') }}">
    @if ($errors->has('price'))
        <p class="text-danger">{{ $errors->first('price') }}</p>
    @endif
</div>
<div class="form-group mb-2">
    <label for="instructor_id">Instructor</label>
    <select class="form-control {{ $errors->has('instructor_id') ? 'is-invalid' : '' }}" name="instructor_id"
        id="instructor_id">
        <option value="">Select An Instructor</option>
        @foreach ($instructors as $key => $value)
            <option value="{{ $key }}"
                {{ isset($course) ? ($course->instructor_id == $key ? 'selected' : '') : '' }}>
                {{ $value }} (ID#{{ $key }})</option>
        @endforeach
    </select>
    @if ($errors->has('instructor_id'))
        <p class="text-danger">{{ $errors->first('instructor_id') }}</p>
    @endif
</div>

<div class="form-group mb-2">
    <label for="image">Display Image</label>
    @if (isset($course) && count($course->getMedia()) > 0)
        <div class="display-image">
            <img src="{{ $course->getFirstMediaUrl() }}" alt="{{ $course->title }}" width="300" height="200">
            <input type="checkbox" name="remove_image"> Remove Image
        </div>
    @endif
    <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image">
    @if ($errors->has('image'))
        <p class="text-danger">{{ $errors->first('image') }}</p>
    @endif
</div>
