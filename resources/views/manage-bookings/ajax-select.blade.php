<option>--- Select Room ---</option>
@if(!empty($hotel_rooms))
  @foreach($hotel_rooms as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif