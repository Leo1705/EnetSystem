@csrf
<div class="form-group">
  <label>Name</label>
  <input type="text" name="name"
         value="{{ old('name', $person->name ?? '') }}"
         class="form-input" required>
</div>

<div class="form-group">
  <label>Group Count</label>
  <input type="number" name="group_count"
         value="{{ old('group_count', $person->group_count ?? 1) }}"
         class="form-input" min="1" required>
</div>

<div class="form-group">
  <label>Role</label>
  <select name="role" class="form-input" required>
    @foreach(['Student','Parent','Personal'] as $r)
      <option value="{{ $r }}" @selected(old('role', $person->role ?? '') == $r)>
        {{ $r }}
      </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Courses</label>
  <select name="courses[]" multiple class="form-input">
    @foreach($courses as $course)
      <option value="{{ $course->id }}"
        @if(isset($person) && $person->courses->contains($course)) selected @endif>
        {{ $course->name }}
      </option>
    @endforeach
  </select>
</div>

<button type="submit" class="submit-btn">Save</button>
