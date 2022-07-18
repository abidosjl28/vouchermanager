@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                            <label class="required" for="fullname">{{ trans('cruds.client.fields.fullname') }}</label>
                            <input class="form-control" type="text" name="fullname" id="fullname" value="{{ old('fullname', $client->fullname) }}" required>
                            @if($errors->has('fullname'))
                                <span class="help-block" role="alert">{{ $errors->first('fullname') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.fullname_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address_1') ? 'has-error' : '' }}">
                            <label for="address_1">{{ trans('cruds.client.fields.address_1') }}</label>
                            <input class="form-control" type="text" name="address_1" id="address_1" value="{{ old('address_1', $client->address_1) }}">
                            @if($errors->has('address_1'))
                                <span class="help-block" role="alert">{{ $errors->first('address_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.address_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address_2') ? 'has-error' : '' }}">
                            <label for="address_2">{{ trans('cruds.client.fields.address_2') }}</label>
                            <input class="form-control" type="text" name="address_2" id="address_2" value="{{ old('address_2', $client->address_2) }}">
                            @if($errors->has('address_2'))
                                <span class="help-block" role="alert">{{ $errors->first('address_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.address_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label class="required" for="city">{{ trans('cruds.client.fields.city') }}</label>
                            <input class="form-control" type="text" name="city" id="city" value="{{ old('city', $client->city) }}" required>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label for="phone_number">{{ trans('cruds.client.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $client->phone_number) }}">
                            @if($errors->has('phone_number'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email_address') ? 'has-error' : '' }}">
                            <label for="email_address">{{ trans('cruds.client.fields.email_address') }}</label>
                            <input class="form-control" type="text" name="email_address" id="email_address" value="{{ old('email_address', $client->email_address) }}">
                            @if($errors->has('email_address'))
                                <span class="help-block" role="alert">{{ $errors->first('email_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.email_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                            <label class="required" for="country">{{ trans('cruds.client.fields.country') }}</label>
                            <input class="form-control" type="text" name="country" id="country" value="{{ old('country', $client->country) }}" required>
                            @if($errors->has('country'))
                                <span class="help-block" role="alert">{{ $errors->first('country') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('passport') ? 'has-error' : '' }}">
                            <label for="passport">{{ trans('cruds.client.fields.passport') }}</label>
                            <input class="form-control" type="text" name="passport" id="passport" value="{{ old('passport', $client->passport) }}">
                            @if($errors->has('passport'))
                                <span class="help-block" role="alert">{{ $errors->first('passport') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.passport_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('attachment') ? 'has-error' : '' }}">
                            <label for="attachment">{{ trans('cruds.client.fields.attachment') }}</label>
                            <div class="needsclick dropzone" id="attachment-dropzone">
                            </div>
                            @if($errors->has('attachment'))
                                <span class="help-block" role="alert">{{ $errors->first('attachment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.attachment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentMap = {}
Dropzone.options.attachmentDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 50, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachment[]" value="' + response.name + '">')
      uploadedAttachmentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentMap[file.name]
      }
      $('form').find('input[name="attachment[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($client) && $client->attachment)
          var files =
            {!! json_encode($client->attachment) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachment[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection