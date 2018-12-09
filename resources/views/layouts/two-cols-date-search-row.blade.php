<div class="row" id="golekane">
  @php
    $index = 0;
  @endphp
  @foreach ($items as $item)
    <div class="col-md-6">
      <div class="form-group">
          @php
            $stringFormat =  strtolower(str_replace(' ', '', $item));
          @endphp
        <label class="col-md-3 control-label">{{$item}}</label>
        <div class="col-md-7">
            <div class="input-group">
                <div class="input-group-append">
                </div>
                <input type="date" value="{{isset($oldVals) ? $oldVals[$index] : ''}}" name="<?=$stringFormat?>" class="form-control pull-right" id="<?=$stringFormat?>" placeholder="{{$item}}" required>
                </div>
        </div>
      </div>
    </div>
  @php
    $index++;
  @endphp
  @endforeach

</div>