@push('scripts')
    <script src="{{asset('CDN/moment.js')}}"></script>
    <script src="{{asset('CDN/moment.js_locale_es.js')}}"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
@endpush
<form id="form-create-water-source"
      action="{{route('water_sources_update_post',['waterSourceId' => $waterSource->id])}}">
    <div class="row m-0">
        @include('water_source._form')
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-raised btn-primary">ACTUALIZAR</button>
        </div>
    </div>
</form>
