@extends('layout.master')
@section('title','Create Mail')
@section('content')

<h1 class="mt-4">Compose Mail</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Compose Mail</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-pencil me-1"></i>
        Create Mail
    </div>
    <div class="card-body">
        <form class="form-signin form-sendMail" action="{{ route('mailLog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @error('mailError')
            <div class="form-group mb-3">
                <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group mb-3">
                <label for="email">Recipient Email*:</label>
                <div class="input_fields_wrap">
                    <div class="row">
                        <div class="col-10 mb-1">
                            <input type="email" name="recipient[]" class="form-control" value="" placeholder="Enter recipient email" required>
                            @error('recipient.*')
                            <span class="text-danger">Please check all emails properly</span>
                            @enderror
                        </div>
                        <div class="col-2 mb-1">
                            <button class="add_field_button btn btn-sm btn-secondary">Add more recipient</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="subject">Email Subject*:</label>
                <input type="text" name="subject" class="form-control" id="subject" value="{{ old('subject') }}" placeholder="Enter mail subject" >
                @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="editor">Email Body*:</label>
                <textarea name="body" id="editor" placeholder="Compose your mail here"></textarea>
                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="attachments">Attachments:</label>
                <input type="file" class="form-control" name="attachments[]" id="attachments" multiple>
            </div>
            <button type="submit" class="btn btn-default btn-success">Submit</button>
          </form>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script src="{{ url('js/inputRepeater.js') }}"></script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ),{
        ckfinder: {
            uploadUrl: '{{route('mailLog.image.upload').'?_token='.csrf_token()}}',
        }
    }).catch( error => {
        console.error( error );
    });

    
</script>
@endsection