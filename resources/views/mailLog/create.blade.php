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
        <form class="form-signin" action="{{ route('mailLog.store') }}" method="post">
            @csrf
            @error('mailError')
            <div class="form-group mb-3">
                <span class="text-danger">{{ $message }}</span>
            </div>
            @enderror
            <div class="form-group mb-3">
                <label for="email">Recipient Email:</label>
                <input type="email" name="recipient" class="form-control" id="email" value="{{ old('recipient') }}" required>
                @error('recipient')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="subject">Email Subject:</label>
                <input type="text" name="subject" class="form-control" id="subject" value="{{ old('subject') }}" >
                @error('subject')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="editor">Email Subject:</label>
                <textarea name="body" id="editor"></textarea>
            </div>
            <button type="submit" class="btn btn-default btn-success">Submit</button>
          </form>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script src="{{ url('js/ckeditor.js') }}"></script>
@endsection