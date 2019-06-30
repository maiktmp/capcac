@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/es.js"></script>
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
