@include('vendor.ueditor.assets')
<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-{{$width['label']}} control-label">{{$label}}</label>

    <div class="col-md-10">

        @include('admin::form.error')
        <script id="container" name="content" type="text/plain"></script>
        @include('admin::form.help-block')

    </div>
</div>

{{--<script type="text/javascript">--}}
    {{--var ue = UE.getEditor('container');--}}
    {{--ue.ready(function() {--}}
        {{--ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');--}}
    {{--});--}}
{{--</script>--}}


