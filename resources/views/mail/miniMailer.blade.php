<x-mail::message>
# Introduction

{!! html_entity_decode($mailLog->body) !!}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
