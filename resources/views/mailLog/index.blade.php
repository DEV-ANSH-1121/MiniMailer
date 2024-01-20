@extends('layout.master')
@section('title','Sent Mails')
@section('content')

<h1 class="mt-4">Sent Mails</h1>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Sent Mails
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Recipient</th>
                    <th>Subject</th>
                    <th>Sent At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mailHistories as $mail)
                    <tr>
                        <td>{{ $mail->recipient }}</td>
                        <td>{{ $mail->subject }}</td>
                        <td>{{ $mail->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No mails sent yet</td>
                    </tr>
                @endforelse
              
            </tbody>
          </table>
    </div>
</div>


<br>

@endsection